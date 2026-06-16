# Melon API Integration

How this Laravel project fetches real-estate objects (apartments) from the
[Melon](https://melon.market) API. Use this as a reference to replicate the
setup in another project.

## Overview

The integration is intentionally simple. There is **no package, no model, and no
database**. Objects are pulled from the Melon REST API as JSON, cached to local
disk as a flat file, and read back as a Laravel collection.

```
Melon API ──► FetchData (download) ──► storage/app/public/apartements.json
                                              │
OfferController ──► GetData (read + 60min cache) ──► Collection ──► Blade view
```

## 1. Configuration

### `.env`

```env
MELON_API_URL="https://scalazuerich.api.melon.market/api/v2/objects/?format=json"
```

Each Melon client/project gets its own subdomain. The `?format=json` query
parameter is required to get JSON back. Swap the subdomain for the new project.

> Note: older projects use the `melon.rent` domain (see the commented-out URL in
> `FetchData.php`); current is `melon.market`. Confirm the correct host/subdomain
> with Melon for the new project.

### `config/melon.php`

```php
<?php

return [
  'api_url' => env('MELON_API_URL', '')
];
```

A tiny config file so the URL is read via `config('melon.api_url')` (cache-safe)
rather than `env()` directly.

## 2. Fetching — `app/Actions/FetchData.php`

Downloads the JSON and stores it verbatim on the `public` disk.

```php
<?php
namespace App\Actions;
use Illuminate\Support\Facades\Storage;

class FetchData
{
  public function execute()
  {
    $api_uri = config('melon.api_url');
    $data = file_get_contents($api_uri);
    Storage::disk('public')->put('apartements.json', $data);
  }
}
```

- Uses `file_get_contents()` (no HTTP client / Guzzle dependency). The Melon
  endpoint is a public, unauthenticated GET — **no API key or token**.
- Saves to `storage/app/public/apartements.json`.

## 3. Reading with cache — `app/Actions/GetData.php`

Reads the cached file, re-fetching only when it is missing or older than
60 minutes. Returns a sorted collection.

```php
<?php
namespace App\Actions;
use App\Actions\FetchData;
use Illuminate\Support\Facades\Storage;

class GetData
{
  public function execute()
  {
    if (
      !Storage::disk('public')->exists('apartements.json') ||
      Storage::disk('public')->lastModified('apartements.json') < now()->subMinutes(60)->timestamp
    )
    {
      (new FetchData)->execute();
    }

    $data = Storage::disk('public')->get('apartements.json');
    return collect(json_decode($data, true))->sortBy('title');
  }
}
```

- The 60-minute window is the entire caching strategy — it's lazy/on-demand,
  triggered by the first page request after the file goes stale. There is **no
  scheduled/cron job** (`app/Console/Kernel.php` schedule is empty).
- Returns a `Collection` of associative arrays, sorted by `title`.

## 4. Consuming it — controller + route

`app/Http/Controllers/OfferController.php`:

```php
<?php
namespace App\Http\Controllers;
use App\Actions\GetData;

class OfferController extends Controller
{
  public function index()
  {
    $data = (new GetData())->execute();
    return view('pages.offer', compact('data'));
  }
}
```

`routes/web.php`:

```php
Route::get('/angebot', [OfferController::class, 'index'])->name('page.offer');
```

The view iterates over `$data` and reads array keys directly, e.g.
`$item['title']`.

## 5. Object data shape

Each object in the JSON array is an associative array. Keys used by this project:

| Key             | Meaning                                         |
|-----------------|-------------------------------------------------|
| `title`         | Object title (used for sorting and display)     |
| `object_state`  | Status, e.g. available / rented / reserved      |
| `floor`         | Floor                                           |
| `rooms`         | Number of rooms                                 |
| `area`          | Living area                                     |
| `balcony_area`  | Balcony area                                    |
| `rentalgross`   | Gross rent                                       |
| `incidentals`   | Incidental costs (Nebenkosten / NK)             |

(Melon returns many more fields; these are the ones consumed here. Inspect the
live JSON URL to see the full structure for your project.)

## Replicating in a new project — checklist

1. Add `MELON_API_URL` to `.env` with the new project's Melon subdomain.
2. Create `config/melon.php` returning `['api_url' => env('MELON_API_URL', '')]`.
3. Copy `app/Actions/FetchData.php` and `app/Actions/GetData.php`.
4. Ensure the `public` storage disk exists and `php artisan storage:link` is run
   if you need the JSON web-accessible.
5. Call `(new GetData())->execute()` from a controller; pass the collection to a
   view.
6. Optionally tune the 60-minute cache window, or replace the lazy refresh with a
   scheduled command in `app/Console/Kernel.php`.

## Notes / caveats

- `file_get_contents()` on a remote URL requires `allow_url_fopen=On` in PHP.
  For more robustness consider Laravel's HTTP client (`Http::get()`), which also
  gives timeouts and error handling — the current code has none.
- The filename is spelled `apartements.json` (note the spelling) throughout.
- No authentication is used; the endpoint is treated as a public feed.

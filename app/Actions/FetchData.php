<?php
namespace App\Actions;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class FetchData
{
  public function execute(): void
  {
    $url = config('melon.api_url');

    if (empty($url)) {
      Storage::disk('public')->put('apartements.json', '[]');
      return;
    }

    // The Melon v2 endpoint returns a flat JSON array of objects.
    $response = Http::get($url);

    Storage::disk('public')->put(
      'apartements.json',
      $response->successful() ? $response->body() : '[]'
    );
  }
}

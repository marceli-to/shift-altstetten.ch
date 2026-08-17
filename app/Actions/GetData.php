<?php
namespace App\Actions;

use App\Actions\FetchData;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

/**
 * Wohnungen aus der Melon-Objektschnittstelle. Der Feed enthält ausschliesslich
 * die Wohnungen; die Gewerbeobjekte werden lokal gepflegt
 * (App\Models\CommercialObject).
 */
class GetData
{
  public function execute(): Collection
  {
    return collect($this->source())->map(fn ($object) => $this->normalize($object))->values();
  }

  /**
   * Raw object array, either from the committed mock fixture (while the live
   * Melon endpoint is unavailable) or from the cached API response.
   */
  private function source(): array
  {
    if (config('melon.mock')) {
      $path = database_path('data/apartments-mock.json');

      return is_file($path) ? (json_decode(file_get_contents($path), true) ?: []) : [];
    }

    // Re-fetch when the cached file is missing or older than 60 minutes.
    if (
      !Storage::disk('public')->exists('apartements.json') ||
      Storage::disk('public')->lastModified('apartements.json') < now()->subMinutes(60)->timestamp
    ) {
      (new FetchData)->execute();
    }

    return json_decode(Storage::disk('public')->get('apartements.json'), true) ?: [];
  }

  /**
   * Map the Melon v2 `object_state` onto the project's internal states
   * (free / reserved / taken) and expose it as `state`.
   */
  private function normalize(array $object): array
  {
    $object['state'] = match ($object['object_state'] ?? null) {
      'reserved' => 'reserved',
      'rented', 'taken' => 'taken',
      default => 'free',
    };

    // Melon liefert für nicht hinterlegte Dateien "#" statt null.
    foreach (['layout_plan', 'application_form'] as $link) {
      if (($object[$link] ?? null) === '#') {
        $object[$link] = null;
      }
    }

    return $object;
  }
}

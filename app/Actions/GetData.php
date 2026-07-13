<?php
namespace App\Actions;

use App\Actions\FetchData;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class GetData
{
  public function execute(): Collection
  {
    $order = $this->isometryOrder();

    return collect($this->source())
      ->map(fn ($object) => $this->normalize($object))
      // Order the rows to match the counter-clockwise, per-floor arrangement of
      // the isometry (the single source of truth for object sequencing), not the
      // alphabetical object number. Objects absent from the isometry sort to the
      // end, keeping their original relative order.
      ->sortBy(fn ($object) => $order[strtolower($object['title'] ?? '')] ?? PHP_INT_MAX)
      ->values();
  }

  /**
   * Map of lowercase object title => drawing position in the isometry.
   *
   * iso.blade.php is authored in the project's counter-clockwise, per-floor
   * reading order, so its `data-iso` sequence doubles as the canonical sort
   * order for the object tables. Reading it here keeps the two in sync.
   */
  private function isometryOrder(): array
  {
    $path = resource_path('views/components/objects/iso.blade.php');

    if (!is_file($path)) {
      return [];
    }

    preg_match_all('/data-iso="([^"]+)"/', file_get_contents($path), $matches);

    $order = [];
    foreach ($matches[1] as $key) {
      // First occurrence wins; some ids are drawn twice where floors overlap.
      $order[$key] ??= count($order);
    }

    return $order;
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

    return $object;
  }
}

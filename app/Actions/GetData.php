<?php
namespace App\Actions;

use App\Actions\FetchData;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class GetData
{
  public function execute(): Collection
  {
    // Re-fetch when the cached file is missing or older than 60 minutes.
    if (
      !Storage::disk('public')->exists('apartements.json') ||
      Storage::disk('public')->lastModified('apartements.json') < now()->subMinutes(60)->timestamp
    ) {
      (new FetchData)->execute();
    }

    $data = collect(json_decode(Storage::disk('public')->get('apartements.json'), true) ?: []);

    return $data
      ->map(fn ($object) => $this->normalize($object))
      ->sortBy('title')
      ->values();
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

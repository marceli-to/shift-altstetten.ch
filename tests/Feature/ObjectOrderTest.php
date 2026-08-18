<?php

use App\Http\Controllers\ApartmentController;
use Illuminate\Support\Collection;

/** Alle data-iso-Formen der Isometrie. */
function isometryShapes(): array
{
  $svg = file_get_contents(resource_path('views/components/objects/iso.blade.php'));
  preg_match_all('/data-iso="([^"]+)"/', $svg, $matches);

  return array_values(array_unique($matches[1]));
}

function sortObjects(array $objects): Collection
{
  $sort = new ReflectionMethod(ApartmentController::class, 'sortByIsometry');
  $sort->setAccessible(true);

  return $sort->invoke(new ApartmentController, collect($objects));
}

/** Titel je Geschoss in der Reihenfolge, in der sie ausgegeben werden. */
function floorBlocks(Collection $sorted): array
{
  $blocks = [];
  foreach ($sorted as $object) {
    $floor = $object['floor'];
    if (! $blocks || array_key_last($blocks) !== null && end($blocks)['floor'] !== $floor) {
      $blocks[] = ['floor' => $floor, 'titles' => []];
    }
    $blocks[array_key_last($blocks)]['titles'][] = $object['title'];
  }

  return $blocks;
}

it('has an order entry for every shape in the isometry, and no orphans', function () {
  $shapes = isometryShapes();
  $order = config('estate.order');

  expect(array_diff($shapes, $order))->toBe([], 'Isometrie-Formen ohne Eintrag in estate.order');
  expect(array_diff($order, $shapes))->toBe([], 'Eintraege in estate.order ohne Form in der Isometrie');
});

it('lists no object twice in the order', function () {
  $order = config('estate.order');

  expect(array_unique($order))->toHaveCount(count($order));
});

it('keeps each floor as one contiguous block even if the order list is wrong', function () {
  // Bewusst kaputte Liste: die Attika-Wohnung steht mitten im 5. OG. Genau so
  // sah der Fehler aus, der die Geschosse in der Tabelle zerrissen hat.
  config(['estate.order' => ['w501a', 'w601a', 'w502a']]);

  $sorted = sortObjects([
    ['title' => 'W502a', 'floor' => '5.OG', 'floor_num' => 5],
    ['title' => 'W601a', 'floor' => 'Attika', 'floor_num' => 6],
    ['title' => 'W501a', 'floor' => '5.OG', 'floor_num' => 5],
  ]);

  $blocks = floorBlocks($sorted);

  expect($blocks)->toHaveCount(2);
  expect($blocks[0])->toBe(['floor' => '5.OG', 'titles' => ['W501a', 'W502a']]);
  expect($blocks[1])->toBe(['floor' => 'Attika', 'titles' => ['W601a']]);
});

it('orders objects within a floor as configured, not alphabetically', function () {
  config(['estate.order' => ['w003b', 'w001a', 'w002a']]);

  $sorted = sortObjects([
    ['title' => 'W001a', 'floor' => 'EG', 'floor_num' => 0],
    ['title' => 'W002a', 'floor' => 'EG', 'floor_num' => 0],
    ['title' => 'W003b', 'floor' => 'EG', 'floor_num' => 0],
  ]);

  expect($sorted->pluck('title')->all())->toBe(['W003b', 'W001a', 'W002a']);
});

it('sorts objects without an order entry to the end of their own floor', function () {
  config(['estate.order' => ['w002a']]);

  $sorted = sortObjects([
    ['title' => 'W999z', 'floor' => 'EG', 'floor_num' => 0],
    ['title' => 'W101a', 'floor' => '1.OG', 'floor_num' => 1],
    ['title' => 'W002a', 'floor' => 'EG', 'floor_num' => 0],
  ]);

  expect($sorted->pluck('title')->all())->toBe(['W002a', 'W999z', 'W101a']);
});

it('starts every floor of the real order at its "…1a" apartment', function () {
  $order = config('estate.order');
  $flats = array_values(array_filter($order, fn ($t) => str_starts_with($t, 'w')));

  $seen = [];
  foreach ($flats as $title) {
    $floor = substr($title, 1, 1);          // w001a -> "0", w601a -> "6"
    if (! isset($seen[$floor])) {
      $seen[$floor] = $title;
    }
  }

  foreach ($seen as $floor => $first) {
    expect($first)->toEndWith('1a', "Geschoss {$floor} startet nicht vorne links");
  }
});

<?php
namespace App\Http\Controllers;

use App\Actions\GetData;
use Illuminate\Support\Collection;

class ApartmentController extends Controller
{
  // Residential object types render on "Wohnen"; everything else on "Arbeiten".
  private const RESIDENTIAL = ['apartment', 'attica_apartment', 'maisonette', 'studio', 'penthouse', 'loft'];

  public function living()
  {
    return $this->render('living', fn ($o) => in_array($o['object_type']['key'] ?? '', self::RESIDENTIAL, true));
  }

  public function working()
  {
    return $this->render('working', fn ($o) => !in_array($o['object_type']['key'] ?? '', self::RESIDENTIAL, true));
  }

  private function render(string $view, callable $filter)
  {
    $apartments = (new GetData)->execute()->filter($filter)->values();
    $buildings = $apartments->groupBy(fn ($o) => $o['building']['building_title'] ?? '–')->sortKeys();

    return view("pages.$view", [
      'apartments' => $apartments,
      'buildings' => $buildings,
      'filterOptions' => $this->filterOptions($apartments),
      'labels' => [],
    ]);
  }

  /**
   * Build filter dropdown options directly from the data so the option
   * values always match the rows' data-object-* attributes.
   */
  private function filterOptions(Collection $apartments): array
  {
    $rooms = $apartments->pluck('rooms')->filter()->unique()->sort()->values();

    $floors = $apartments->pluck('floor')->filter()->unique()
      ->sortBy(fn ($f) => (int) preg_replace('/\D/', '', (string) $f))->values();

    return [
      'availability' => ['NULL' => 'Alle', 'free' => 'frei', 'reserved' => 'reserviert', 'taken' => 'vermietet'],
      'rooms' => collect(['NULL' => 'Alle'])
        ->merge($rooms->mapWithKeys(fn ($r) => [(string) $r => $this->roomLabel($r)])),
      'floors' => collect(['NULL' => 'Alle'])
        ->merge($floors->mapWithKeys(fn ($f) => [$f => $f])),
    ];
  }

  private function roomLabel(float $rooms): string
  {
    return rtrim(rtrim(number_format($rooms, 1, '.', ''), '0'), '.');
  }
}

<?php
namespace App\Http\Controllers;

use App\Actions\GetData;
use App\Models\CommercialObject;
use Illuminate\Support\Collection;

class ApartmentController extends Controller
{
  // Residential object types render on "Wohnen".
  private const RESIDENTIAL = ['apartment', 'attica_apartment', 'maisonette', 'studio', 'penthouse', 'loft'];

  /**
   * Wohnen: Objekte aus der Melon-Objektschnittstelle.
   */
  public function living()
  {
    $apartments = (new GetData)->execute()
      ->filter(fn ($o) => in_array($o['object_type']['key'] ?? '', self::RESIDENTIAL, true))
      ->values();

    return $this->render('living', $apartments);
  }

  /**
   * Arbeiten: Gewerbeobjekte aus der lokalen Verwaltung (/admin) – sie sind in
   * Melon nicht abgebildet.
   */
  public function working()
  {
    $apartments = CommercialObject::all()
      ->map(fn (CommercialObject $object) => $object->toObjectArray());

    return $this->render('working', $apartments);
  }

  private function render(string $view, Collection $apartments)
  {
    $apartments = $this->sortByIsometry($apartments);

    return view("pages.$view", [
      'apartments' => $apartments,
      'filterOptions' => $this->filterOptions($apartments),
    ]);
  }

  /**
   * Order the rows to run counter-clockwise around each floor as arranged in
   * the isometry (config/estate.php), not by the alphabetical object number.
   * Objects missing from the order sort to the end, keeping their relative order.
   */
  private function sortByIsometry(Collection $apartments): Collection
  {
    $order = array_flip(config('estate.order', []));

    return $apartments
      ->sortBy(fn ($object) => $order[strtolower($object['title'] ?? '')] ?? PHP_INT_MAX)
      ->values();
  }

  /**
   * Build filter dropdown options directly from the data so the option
   * values always match the rows' data-object-* attributes.
   */
  private function filterOptions(Collection $apartments): array
  {
    $rooms = $apartments->pluck('rooms')->filter()->unique()->sort()->values();

    // Nach `floor_num` sortieren statt nach den Ziffern im Label – sonst landet
    // "Attika" (floor_num 6) neben "EG".
    $floors = $apartments->filter(fn ($o) => filled($o['floor'] ?? null))
      ->sortBy(fn ($o) => $o['floor_num'] ?? PHP_INT_MAX)
      ->pluck('floor')->unique()->values();

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

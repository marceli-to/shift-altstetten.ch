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
   * Erst nach Geschoss, dann innerhalb des Geschosses in der Reihenfolge der
   * Isometrie: Start vorne links, dann gegen den Uhrzeigersinn (config/estate.php).
   *
   * Das Geschoss kommt bewusst aus `floor_num` und nicht aus der Position in
   * der Liste – so koennen sich die Geschosse auch dann nicht ineinander
   * schieben, wenn die Liste einmal falsch gepflegt wird. Objekte ohne Eintrag
   * landen am Ende ihres Geschosses und behalten ihre relative Reihenfolge.
   */
  private function sortByIsometry(Collection $apartments): Collection
  {
    $order = array_flip(config('estate.order', []));

    return $apartments
      ->sortBy(fn ($object) => [
        $object['floor_num'] ?? PHP_INT_MAX,
        $order[strtolower($object['title'] ?? '')] ?? PHP_INT_MAX,
      ])
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

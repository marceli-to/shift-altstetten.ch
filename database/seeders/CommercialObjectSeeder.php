<?php
namespace Database\Seeders;

use App\Models\CommercialObject;
use Illuminate\Database\Seeder;

/**
 * Die zwölf Kleinbüros.
 *
 * Quelle: "260811_Mietzinseinschätzung_Gewerbe.xlsx" des Kunden (Geschoss,
 * Nutzfläche, Nettomietzins, Nebenkosten). Die Flächen decken sich mit den
 * Factsheets unter storage/app/private/Shift/Gewerbe/Factsheet_einzeln/.
 *
 * Der Seeder ist idempotent: Objekte werden nur angelegt, wenn sie fehlen, und
 * Mietzinse nur dort eingetragen, wo noch nichts erfasst ist. Im Admin
 * gepflegte Werte überschreibt ein erneuter Lauf damit nie.
 */
class CommercialObjectSeeder extends Seeder
{
  public function run(): void
  {
    $offices = [
      ['title' => 'B01', 'floor' => 'EG', 'floor_num' => 0, 'area' => 32, 'rentalgross_net' => 1310, 'incidentals' => 80],
      ['title' => 'B02', 'floor' => 'EG', 'floor_num' => 0, 'area' => 32, 'rentalgross_net' => 1310, 'incidentals' => 80],
      ['title' => 'B03', 'floor' => '1.OG', 'floor_num' => 1, 'area' => 28, 'rentalgross_net' => 1080, 'incidentals' => 70],
      ['title' => 'B04', 'floor' => '1.OG', 'floor_num' => 1, 'area' => 19, 'rentalgross_net' => 940, 'incidentals' => 50],
      ['title' => 'B05', 'floor' => '2.OG', 'floor_num' => 2, 'area' => 28, 'rentalgross_net' => 1110, 'incidentals' => 70],
      ['title' => 'B06', 'floor' => '2.OG', 'floor_num' => 2, 'area' => 20, 'rentalgross_net' => 970, 'incidentals' => 50],
      ['title' => 'B07', 'floor' => '3.OG', 'floor_num' => 3, 'area' => 28, 'rentalgross_net' => 1150, 'incidentals' => 70],
      ['title' => 'B08', 'floor' => '3.OG', 'floor_num' => 3, 'area' => 20, 'rentalgross_net' => 1000, 'incidentals' => 50],
      ['title' => 'B09', 'floor' => '4.OG', 'floor_num' => 4, 'area' => 28, 'rentalgross_net' => 1150, 'incidentals' => 70],
      ['title' => 'B10', 'floor' => '4.OG', 'floor_num' => 4, 'area' => 20, 'rentalgross_net' => 1000, 'incidentals' => 50],
      ['title' => 'B11', 'floor' => '5.OG', 'floor_num' => 5, 'area' => 28, 'rentalgross_net' => 1180, 'incidentals' => 70],
      ['title' => 'B12', 'floor' => '5.OG', 'floor_num' => 5, 'area' => 20, 'rentalgross_net' => 1030, 'incidentals' => 50],
    ];

    foreach ($offices as $office) {
      $number = substr($office['title'], 1);

      $object = CommercialObject::firstOrCreate(
        ['title' => $office['title']],
        $office + [
          'reference_number' => 'SHIFT-' . $office['title'],
          'state' => 'free',
          'layout_plan' => "/downloads/grundrisse/buero-{$number}.pdf",
        ]
      );

      // Bestehende Objekte: nur ergänzen, was noch leer ist.
      foreach (['rentalgross_net', 'incidentals'] as $field) {
        if ($object->{$field} === null) {
          $object->{$field} = $office[$field];
        }
      }

      if ($object->isDirty()) {
        $object->save();
      }
    }
  }
}

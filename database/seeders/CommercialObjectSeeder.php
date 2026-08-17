<?php
namespace Database\Seeders;

use App\Models\CommercialObject;
use Illuminate\Database\Seeder;

/**
 * Die zwölf Kleinbüros. Geschoss und Nutzfläche stammen aus den Factsheets des
 * Kunden (storage/app/private/Shift/Gewerbe/Factsheet_einzeln/BueroNN.pdf).
 *
 * Die Mietzinse fehlen noch (Excel-Liste vom Kunden ausstehend) und bleiben
 * deshalb leer – sie lassen sich unter /admin nachtragen, ohne dass hier etwas
 * geändert werden muss. Der Seeder legt nur an, was noch nicht existiert, und
 * überschreibt damit keine im Admin gepflegten Werte.
 */
class CommercialObjectSeeder extends Seeder
{
  public function run(): void
  {
    $offices = [
      ['title' => 'B01', 'floor' => 'EG', 'floor_num' => 0, 'area' => 32],
      ['title' => 'B02', 'floor' => 'EG', 'floor_num' => 0, 'area' => 32],
      ['title' => 'B03', 'floor' => '1.OG', 'floor_num' => 1, 'area' => 28],
      ['title' => 'B04', 'floor' => '1.OG', 'floor_num' => 1, 'area' => 19],
      ['title' => 'B05', 'floor' => '2.OG', 'floor_num' => 2, 'area' => 28],
      ['title' => 'B06', 'floor' => '2.OG', 'floor_num' => 2, 'area' => 20],
      ['title' => 'B07', 'floor' => '3.OG', 'floor_num' => 3, 'area' => 28],
      ['title' => 'B08', 'floor' => '3.OG', 'floor_num' => 3, 'area' => 20],
      ['title' => 'B09', 'floor' => '4.OG', 'floor_num' => 4, 'area' => 28],
      ['title' => 'B10', 'floor' => '4.OG', 'floor_num' => 4, 'area' => 20],
      ['title' => 'B11', 'floor' => '5.OG', 'floor_num' => 5, 'area' => 28],
      ['title' => 'B12', 'floor' => '5.OG', 'floor_num' => 5, 'area' => 20],
    ];

    foreach ($offices as $office) {
      $number = substr($office['title'], 1);

      CommercialObject::firstOrCreate(
        ['title' => $office['title']],
        $office + [
          'reference_number' => 'SHIFT-' . $office['title'],
          'rentalgross_net' => null,
          'incidentals' => null,
          'state' => 'free',
          'layout_plan' => "/downloads/grundrisse/buero-{$number}.pdf",
        ]
      );
    }
  }
}

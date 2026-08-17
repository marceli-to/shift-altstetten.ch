<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommercialObject extends Model
{
  /** Zustände analog zur Melon-Objektschnittstelle (siehe App\Actions\GetData). */
  public const STATES = [
    'free' => 'verfügbar',
    'reserved' => 'reserviert',
    'taken' => 'vermietet',
  ];

  protected $fillable = [
    'title',
    'reference_number',
    'floor',
    'floor_num',
    'area',
    'rentalgross_net',
    'incidentals',
    'state',
    'layout_plan',
    'updated_by',
  ];

  protected $casts = [
    'floor_num' => 'integer',
    'area' => 'float',
    'rentalgross_net' => 'integer',
    'incidentals' => 'integer',
  ];

  public function stateLabel(): string
  {
    return self::STATES[$this->state] ?? $this->state;
  }

  /**
   * In die Struktur der Melon-Objektschnittstelle übersetzen, damit Gewerbe und
   * Wohnen dieselbe Tabellen-Komponente (x-objects.table) verwenden können.
   */
  public function toObjectArray(): array
  {
    return [
      'title' => $this->title,
      'reference_number' => $this->reference_number,
      'object_type' => ['key' => 'commercial', 'label' => 'Gewerbe'],
      'floor' => $this->floor,
      'floor_num' => $this->floor_num,
      // Gewerbeflächen sind Einzelräume ohne Zimmerzahl; die Tabelle blendet die
      // Zimmer-Spalte für "sky" ohnehin aus.
      'rooms' => null,
      'area' => $this->area,
      'balcony_area' => null,
      'loggia_area' => null,
      'terrace_area' => null,
      'rentalgross_net' => $this->rentalgross_net,
      'incidentals' => $this->incidentals,
      'object_state' => $this->state,
      'state' => $this->state,
      'layout_plan' => $this->layout_plan,
      // Gewerbe läuft nicht über den emonitor-Anmeldeprozess, sondern über das
      // Kontaktformular – die Tabelle setzt den Link selbst.
      'application_form' => null,
    ];
  }
}

<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CommercialObject;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

/**
 * Bewirtschaftung der Gewerbeobjekte. Die Objekte selbst sind durch das Gebäude
 * und die Isometrie (config/estate.php) vorgegeben und werden bewusst nicht
 * hier angelegt oder gelöscht – bearbeitet werden Status, Mietzins und
 * Nebenkosten.
 */
class CommercialObjectController extends Controller
{
  public function index()
  {
    return view('admin.objects.index', [
      'objects' => CommercialObject::orderBy('title')->get(),
      'states' => CommercialObject::STATES,
    ]);
  }

  public function update(Request $request)
  {
    $validated = $request->validate([
      'objects' => ['required', 'array'],
      'objects.*.state' => ['required', Rule::in(array_keys(CommercialObject::STATES))],
      'objects.*.rentalgross_net' => ['nullable', 'integer', 'min:0', 'max:100000'],
      'objects.*.incidentals' => ['nullable', 'integer', 'min:0', 'max:100000'],
    ], [
      'objects.*.state.required' => 'Bitte einen Status wählen.',
      'objects.*.state.in' => 'Unbekannter Status.',
      'objects.*.rentalgross_net.integer' => 'Der Mietzins muss eine Zahl sein.',
      'objects.*.incidentals.integer' => 'Die Nebenkosten müssen eine Zahl sein.',
    ]);

    $objects = CommercialObject::whereIn('id', array_keys($validated['objects']))->get()->keyBy('id');
    $changed = 0;

    foreach ($validated['objects'] as $id => $values) {
      $object = $objects->get($id);

      if (! $object) {
        continue;
      }

      $object->fill($values);

      if ($object->isDirty()) {
        $object->updated_by = $request->user()->name;
        $object->save();
        $changed++;
      }
    }

    return redirect()
      ->route('admin.objects.index')
      ->with('status', $changed === 0
        ? 'Keine Änderungen vorgenommen.'
        : ($changed === 1 ? '1 Objekt aktualisiert.' : "{$changed} Objekte aktualisiert."));
  }
}

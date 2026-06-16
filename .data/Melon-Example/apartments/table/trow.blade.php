@props([
  'filterable' => true, 
  'number' => null, 
  'state' => null, 
  'floor' => null, 
  'rooms' => null
])
<tr 
  @if ($filterable)
    data-object
    data-object-number="{{ $number }}"
    data-object-state="{{ $state }}"
    data-object-floor="{{ $floor }}"
    data-object-rooms="{{ $rooms }}"
  @endif
  class="border-b border-b-mist bg-transparent hover:bg-mist !text-sm">
  {{ $slot }}
</tr>
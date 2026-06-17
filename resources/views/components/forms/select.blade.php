@props([
  'id', 
  'label' => null, 
  'name' => null, 
  'options' => [], 
  'accent' => 'blush'
])

<div class="relative w-full">

  <select
    id="{{ $id }}"
    name="{{ $name ?? $id }}"
    aria-label="{{ $label ?? '' }}"
    class="block w-full cursor-pointer appearance-none bg-cocoa h-50 lg:h-46 px-10 font-bold outline-none transition {{ $accent === 'sky' ? 'text-sky' : 'text-blush' }}">
    @foreach($options as $value => $text)
      <option value="{{ $value }}">{{ $text }}</option>
    @endforeach
  </select>

  <x-icons.chevron-down class="pointer-events-none absolute right-10 top-1/2 w-16 h-auto shrink-0 -translate-y-1/2 {{ $accent === 'sky' ? 'text-sky' : 'text-blush' }}" />

</div>

@props(['id', 'label' => null, 'name' => null, 'options' => [], 'accent' => 'blush'])

@php
  $accentText = $accent === 'sky' ? 'text-sky' : 'text-blush';
@endphp

<div class="relative w-full">

  <select
    id="{{ $id }}"
    name="{{ $name ?? $id }}"
    @if($label) aria-label="{{ $label }}" @endif
    {{ $attributes->merge(['class' => 'block w-full cursor-pointer appearance-none bg-cocoa py-14 pl-20 pr-44 text-md md:text-lg font-bold uppercase outline-none transition ' . $accentText]) }}>
    @foreach($options as $value => $text)
      <option value="{{ $value }}" class="bg-white normal-case text-cocoa">{{ $text }}</option>
    @endforeach
  </select>

  <x-icons.chevron-down class="pointer-events-none absolute right-14 top-1/2 w-24 h-24 shrink-0 -translate-y-1/2 {{ $accentText }}" />

</div>

@props([
  'href' => '',
  'tag' => 'a',
  'class' => '',
  'target' => '_self',
  'rel' => '',
  'title' => '',
  'type' => 'button',
  'iconPosition' => 'after',
  'icon' => true,
])

@php
  $padding = !$icon ? 'px-18' : ($iconPosition === 'before' ? 'pl-12 pr-18' : 'pl-18 pr-12');
@endphp

@if($tag === 'button')
<button
  type="{{ $type }}"
  class="border border-yellow-500 hover:bg-yellow-500 transition-colors rounded-full leading-none text-md md:text-xl uppercase inline-flex items-center gap-10 py-12 {{ $padding }} group {{ $class }}"
  @if($title) aria-label="{{ $title }}" @endif>
  {{ $slot }}
</button>
@else
<a
  href="{{ $href }}"
  class="border border-yellow-500 hover:bg-yellow-500 transition-colors rounded-full leading-none text-md md:text-xl uppercase inline-flex items-center gap-10 py-12 {{ $padding }} group {{ $class }}"
  target="{{ $target }}"
  rel="{{ $rel }}"
  @if($title) aria-label="{{ $title }}" @endif>
  {{ $slot }}
</a>
@endif

@props([
  'barColor' => 'bg-blush',
])

@php
  $sectionClass = trim('bg-cocoa py-40 ' . $attributes->get('class', ''));
@endphp

<x-layout.section :class="$sectionClass">
  <x-layout.inner class="relative">
    {{ $slot }}
    <x-bars class="absolute z-30 top-0 right-20 h-[calc(100%_+_80px)] gap-x-10 md:hidden" :count="3" width="w-5" :color="$barColor" />
  </x-layout.inner>
</x-layout.section>

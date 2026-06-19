@props([
  'barColor' => 'bg-blush',
])

<x-layout.section {{ $attributes->merge(['class' => 'bg-cocoa py-40 relative']) }}>
  <x-layout.inner class="relative" data-reveal>
    {{ $slot }}
  </x-layout.inner>
  <x-bars class="absolute z-30 top-0 right-20 h-full gap-x-10 md:hidden" :count="3" width="w-5" :color="$barColor" />
</x-layout.section>

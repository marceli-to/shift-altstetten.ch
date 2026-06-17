<x-layout.section :class="$attributes->get('class')">
  <x-layout.split>
    {{ $slot }}

    <x-downloads />

    <x-slot:aside>{{ $aside }}</x-slot:aside>
  </x-layout.split>
</x-layout.section>

<x-layout.section {{ $attributes->merge(['class' => '']) }}>
  <x-layout.split>
    <div>{{ $slot }}</div>
    <x-slot:aside>{{ $aside }}</x-slot:aside>
  </x-layout.split>
</x-layout.section>

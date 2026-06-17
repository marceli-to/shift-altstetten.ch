@props([
  'href' => '',
  'target' => '_self',
])

<x-links.styled
  :href="$href"
  :target="$target"
  textClass="underline group-hover:no-underline!"
  {{ $attributes->class('flex gap-x-8 items-center') }}>
  @isset($icon)
    <x-slot:icon>{{ $icon }}</x-slot:icon>
  @endisset
  {{ $slot }}
</x-links.styled>

@props([
  'href',
  'active' => false,
  'title' => null,
])
<li>
  <a 
    href="{{ $href }}"
    aria-label="{{ $title }}"
    class="text-yellow-500! text-5xl uppercase leading-none hover:text-white transition-colors {{ $active ? 'text-white' : '' }}">
    {{ $title }}
  </a>
</li>
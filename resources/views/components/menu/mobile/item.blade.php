@props([
  'href',
  'active' => false,
  'title' => null,
])
<li>
  <a 
    href="{{ $href }}"
    aria-label="{{ $title }}"
    class="text-blush text-[40px] leading-none hover:underline underline-offset-4 decoration-1 {{ $active ? 'underline' : '' }}">
    {{ $title }}
  </a>
</li>
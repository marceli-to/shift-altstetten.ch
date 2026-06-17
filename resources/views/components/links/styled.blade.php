@props([
  'href' => '',
  'target' => '_self',
  'label' => null,
  'textClass' => '',
])

<a
  href="{{ $href }}"
  target="{{ $target }}"
  @if($label) aria-label="{{ $label }}" @endif
  {{ $attributes->merge(['class' => 'group']) }}>
  @isset($icon)
    <span class="shrink-0">
      {{ $icon }}
    </span>
  @endisset

  <span class="{{ $textClass }} group-hover:underline underline-offset-4 decoration-1">
    {{ $slot }}
  </span>
</a>
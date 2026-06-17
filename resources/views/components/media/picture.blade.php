@props([
  'src' => '',
  'alt' => '',
  'width' => null,
  'height' => null,
])
<picture {{ $attributes->class('block') }}>
  <source srcset="{{ $src }}.avif" type="image/avif">
  <source srcset="{{ $src }}.webp" type="image/webp">
  <img
    src="{{ $src }}.jpg"
    @isset($width) width="{{ $width }}" @endisset
    @isset($height) height="{{ $height }}" @endisset
    alt="{{ $alt }}"
    class="w-full h-full object-cover" />
</picture>

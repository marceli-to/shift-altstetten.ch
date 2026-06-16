@props([
  'image' => '',
  'alt' => '',
  'class' => '',
])
<figure class="h-[100dvh] md:h-[calc(100dvh_-_80px)] w-full relative">
  
  <picture class="block md:hidden w-full h-full">
    <source srcset="/img/{{ $image }}-portrait.avif" type="image/avif">
    <source srcset="/img/{{ $image }}-portrait.webp" type="image/webp">
    <img
      src="/img/{{ $image }}-portrait.jpg"
      alt="{{ $alt }}"
      title="{{ $alt }}"
      height="1600"
      width="900"
      class="w-full h-full object-cover {{ $class }}">
  </picture>

  <picture class="hidden md:block w-full h-full">
    <source srcset="/img/{{ $image }}-landscape.avif" type="image/avif">
    <source srcset="/img/{{ $image }}-landscape.webp" type="image/webp">
    <img
      src="/img/{{ $image }}-landscape.jpg"
      alt="{{ $alt }}"
      title="{{ $alt }}"
      height="1600"
      width="900"
      class="w-full h-full object-cover {{ $class }}">
  </picture>

    <div class="w-196 h-196 lg:w-260 lg:h-260 absolute top-24 lg:top-36 left-1/2 -translate-x-1/2 flex items-center justify-center" data-reveal>
      <x-icons.logo class="w-192 lg:w-240 h-auto" />
    </div>

</figure>

@props([
  'class' => '',
  'arrowClass' => ''
])

<button type="button" aria-label="Vorheriges" class="swiper-button-prev absolute top-1/2 left-20 -translate-y-1/2 z-10 cursor-pointer w-36 h-36 flex items-center justify-center border border-cocoa rounded-full bg-white/60 transition-colors {{ $class }}">
  <x-icons.arrow-right class="w-16 h-auto rotate-180 {{ $arrowClass ?? '' }}" />
</button>

@props([
  'class' => '',
  'arrowClass' => ''
])

<button type="button" aria-label="Nächstes" class="swiper-button-next absolute top-1/2 right-20 -translate-y-1/2 z-10 cursor-pointer w-40 h-40 flex items-center justify-center border border-cocoa rounded-full bg-white/60 transition-colors before:content-[''] before:absolute before:-inset-10 md:before:content-none {{ $class }}">
  <x-icons.arrow-right class="w-22 h-auto {{ $arrowClass ?? '' }}" />
</button>

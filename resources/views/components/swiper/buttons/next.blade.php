@props([
  'class' => '',
  'arrowClass' => ''
])

<button class="swiper-button-next absolute top-1/2 right-30 -translate-y-1/2 z-10 cursor-pointer w-36 h-36 flex items-center justify-center border border-yellow-500 rounded-full bg-yellow-500/20 transition-colors {{ $class }}">
  <x-icons.arrow-right class="w-16 h-auto {{ $arrowClass ?? '' }}" />
</button>

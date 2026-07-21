@props([
  'name' => 'gallery',
  'images' => [],
  'class' => '',
  'lightbox' => true,
])

@php
  // Für die Lightbox wird – sofern vorhanden – eine hochauflösende Variante
  // mit dem Suffix "-2400" verwendet (z.B. /img/foo-2400.jpg).
  $lightboxItems = collect($images)->map(fn ($image) => [
    'src' => $image,
    'large' => file_exists(public_path($image . '-2400.jpg')) ? $image . '-2400' : null,
  ])->all();
@endphp

<div
  class="relative aspect-[4/3] lg:aspect-auto lg:h-full {{ $class }}"
  @if($lightbox) data-lightbox-gallery="{{ json_encode($lightboxItems) }}" @endif>
  <x-swiper.wrapper class="{{ $name }}-swiper">
    @foreach($images as $image)
      <x-swiper.slide>
        @if($lightbox)
          <button
            type="button"
            data-lightbox-item
            data-lightbox-index="{{ $loop->index }}"
            aria-label="Bild vergrössern"
            class="block w-full h-full cursor-zoom-in">
        @endif
        <picture class="block w-full h-full">
          <source srcset="{{ $image }}.avif" type="image/avif">
          <source srcset="{{ $image }}.webp" type="image/webp">
          <img src="{{ $image }}.jpg" width="960" height="656" alt="" class="w-full h-full object-cover" />
        </picture>
        @if($lightbox)
          </button>
        @endif
      </x-swiper.slide>
    @endforeach
  </x-swiper.wrapper>
  <x-swiper.buttons.prev class="{{ $name }}-swiper-prev" />
  <x-swiper.buttons.next class="{{ $name }}-swiper-next" />
  <div class="{{ $name }}-swiper-pagination swiper-pagination absolute bottom-12 left-0 right-0 z-10"></div>
</div>

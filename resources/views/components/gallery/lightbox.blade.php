{{--
  Globale Lightbox – wird einmal pro Seite gerendert (siehe layout/body).
  Die Slides werden von resources/js/modules/lightbox.js beim Öffnen erzeugt,
  aus den Bilddaten des jeweiligen Carousels (data-lightbox-gallery).
--}}
<div
  data-lightbox
  hidden
  role="dialog"
  aria-modal="true"
  aria-label="Bildergalerie"
  class="fixed inset-0 z-100 bg-cocoa/95">

  <button
    type="button"
    data-lightbox-close
    aria-label="Schliessen"
    class="absolute top-20 right-20 z-20 cursor-pointer w-40 h-40 flex items-center justify-center border border-white rounded-full text-white bg-white/10 transition-colors hover:bg-white/25 before:content-[''] before:absolute before:-inset-10 md:before:content-none">
    <x-icons.close class="w-20 h-auto" />
  </button>

  <div class="absolute inset-0 flex items-center justify-center px-20 py-70 md:px-80">
    <div data-lightbox-swiper class="swiper w-full h-full">
      <div class="swiper-wrapper"></div>
    </div>
    <x-swiper.buttons.prev class="lightbox-prev" />
    <x-swiper.buttons.next class="lightbox-next" />
  </div>

  <div
    data-lightbox-counter
    aria-live="polite"
    class="absolute bottom-24 left-0 right-0 text-center text-white text-[16px] tabular-nums"></div>
</div>

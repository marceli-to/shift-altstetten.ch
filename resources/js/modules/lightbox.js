import Swiper from 'swiper';
import { Navigation, Keyboard } from 'swiper/modules';
import 'swiper/css';

// Breiten der Bildvarianten. Die Basisbilder liegen mit 1440px vor, die
// optionale "-2400"-Variante wird in gallery/carousel.blade.php erkannt.
const BASE_WIDTH = 1440;
const LARGE_WIDTH = 2400;

const root = document.querySelector('[data-lightbox]');

if (root) {
  const swiperEl = root.querySelector('[data-lightbox-swiper]');
  const wrapper = swiperEl.querySelector('.swiper-wrapper');
  const counter = root.querySelector('[data-lightbox-counter]');
  const closeButton = root.querySelector('[data-lightbox-close]');

  let swiper = null;
  let previouslyFocused = null;

  const srcset = (item, ext) =>
    item.large
      ? `${item.src}.${ext} ${BASE_WIDTH}w, ${item.large}.${ext} ${LARGE_WIDTH}w`
      : `${item.src}.${ext}`;

  const slideHtml = (item) => `
    <div class="swiper-slide flex items-center justify-center">
      <picture class="block w-full h-full">
        <source srcset="${srcset(item, 'avif')}" sizes="100vw" type="image/avif">
        <source srcset="${srcset(item, 'webp')}" sizes="100vw" type="image/webp">
        <img src="${item.src}.jpg" alt="" class="w-full h-full object-contain" />
      </picture>
    </div>`;

  const updateCounter = () => {
    if (!swiper) return;
    counter.textContent = `${swiper.realIndex + 1} / ${swiper.slides.length}`;
  };

  const open = (items, index) => {
    if (!items.length) return;

    previouslyFocused = document.activeElement;
    wrapper.innerHTML = items.map(slideHtml).join('');
    root.hidden = false;
    document.documentElement.classList.add('lightbox-open');

    swiper = new Swiper(swiperEl, {
      modules: [Navigation, Keyboard],
      initialSlide: index,
      loop: items.length > 1,
      keyboard: { enabled: true },
      navigation: {
        prevEl: root.querySelector('.lightbox-prev'),
        nextEl: root.querySelector('.lightbox-next'),
      },
      on: { slideChange: updateCounter },
    });

    updateCounter();
    closeButton.focus();
  };

  const close = () => {
    if (root.hidden) return;

    swiper?.destroy(true, true);
    swiper = null;
    wrapper.innerHTML = '';
    root.hidden = true;
    document.documentElement.classList.remove('lightbox-open');
    previouslyFocused?.focus();
  };

  // Öffnen: Bilddaten liegen als JSON am Carousel, der Index am Slide.
  // So bleibt die Zuordnung unabhängig davon, wie Swiper die Slides im
  // Loop-Modus umsortiert.
  document.addEventListener('click', (event) => {
    const item = event.target.closest('[data-lightbox-item]');
    if (!item) return;

    const gallery = item.closest('[data-lightbox-gallery]');
    if (!gallery) return;

    open(JSON.parse(gallery.dataset.lightboxGallery), Number(item.dataset.lightboxIndex));
  });

  closeButton.addEventListener('click', close);

  // Klick neben das Bild schliesst ebenfalls.
  root.addEventListener('click', (event) => {
    if (!event.target.closest('img, button')) close();
  });

  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') close();
  });
}

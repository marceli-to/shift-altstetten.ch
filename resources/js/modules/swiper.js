import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay } from 'swiper/modules';
import 'swiper/css';

document.querySelectorAll('.swiper').forEach((el) => {
  const root = el.parentElement;

  new Swiper(el, {
    modules: [Navigation, Pagination, Autoplay],
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    navigation: {
      prevEl: root.querySelector('.swiper-button-prev'),
      nextEl: root.querySelector('.swiper-button-next'),
    },
    pagination: {
      el: root.querySelector('.swiper-pagination'),
      clickable: true,
    },
  });
});

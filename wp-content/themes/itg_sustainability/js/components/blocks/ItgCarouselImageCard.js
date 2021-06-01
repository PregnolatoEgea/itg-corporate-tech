import Swiper from 'swiper';

export const ItgCarouselImageCard = function () {
  let ItgCarouselImageCardContainers = document.getElementsByClassName('itgBlock__ItgCarouselImageCard');

  for (const carousel of ItgCarouselImageCardContainers) {
    let mySwiper = new Swiper(carousel, {
      slidesPerView: 1,
      spaceBetween: 40,
      simulateTouch: false,
      watchOverflow: true,
      pagination: {
        el: carousel.getElementsByClassName('itgBlock__ItgCarouselImageCard--pagination')[0],
        type: 'bullets',
      },
      breakpoints: {
        1024: {
          slidesPerView: 3,
          spaceBetween: 40,
          simulateTouch: false,
        },
      },
    });
  }
};

ItgCarouselImageCard();

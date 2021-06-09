import Swiper from 'swiper';

export const ItgCarouselNumbers = function () {
  let ItgCarouselNumbersContainers = document.getElementsByClassName('itgBlock__ItgCarouselNumbers');

  for (const carousel of ItgCarouselNumbersContainers) {
    let mySwiper = new Swiper(carousel, {
      slidesPerView: 'auto',
      simulateTouch: false,
      watchOverflow: true,
      pagination: {
        el: carousel.getElementsByClassName('itgBlock__ItgCarouselNumbers--pagination')[0],
        type: 'bullets',
      },
    });
  }
};

ItgCarouselNumbers();

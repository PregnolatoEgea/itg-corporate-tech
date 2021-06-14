import Swiper from 'swiper';

export const ItgCarouselLaunches = function () {
  let ItgCarouselLaunchesContainers = document.querySelectorAll('.itgBlock__ItgCarouselLaunches .swiper-container');

  for (const carousel of ItgCarouselLaunchesContainers) {
    let mySwiper = new Swiper(carousel, {
      slidesPerView: 1,
      simulateTouch: false,
      spaceBetween: 20,
      watchOverflow: true,
      pagination: false,
      navigation: {
        prevEl: carousel.querySelectorAll('.itgBlock__ItgCarouselLaunches--button-prev'),
        nextEl: carousel.querySelectorAll('.itgBlock__ItgCarouselLaunches--button-next'),
      },
    });
  }
};

ItgCarouselLaunches();

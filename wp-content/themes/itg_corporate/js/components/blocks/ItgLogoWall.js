import Swiper from 'swiper';

export const LogoWall = function () {
  let LogoWallContainers = document.getElementsByClassName('itgBlock__logoWall');

  for (const carousel of LogoWallContainers) {
    if (window.innerWidth <= 769) {
      let mySwiper = new Swiper(carousel, {
        slidesPerView: 1.15,
        spaceBetween: 16,
        simulateTouch: false,
        watchOverflow: true,
        breakpoints: {
          586: {
            slidesPerView: 2,
            spaceBetween: 16,
            simulateTouch: false,
            watchOverflow: true,
          },
        },
      });
    } 
  }
};

LogoWall();

import Swiper from 'swiper';

export const ItgFocusBox = function () {
  let BlocksContainers = document.getElementsByClassName('itgBlock__ItgFocusBox__block--list');
  
  for (const carousel of BlocksContainers) {
    var slides = carousel.getElementsByClassName('swiper-slide');
    if(slides.length < 2){
      continue;
    }
    if (window.innerWidth <= 1024) {
      let mySwiper = new Swiper(carousel, {
        slidesPerView: 1,
        simulateTouch: false,
        watchOverflow: true,
        pagination: {
          el: carousel.getElementsByClassName('itgBlock__ItgFocusBox--sliderPagination')[0],
          type: 'bullets',
          clickable: true
        }
      });
    } 
  }
};

ItgFocusBox();

import Swiper from 'swiper';

export const ItgAccordionCarousel = function () {
  let ItgContentCarouselContainers = document.getElementsByClassName('itgBlock__ItgAccordionCarousel--sliderContainer');

  for (const carousel of ItgContentCarouselContainers) {
    let mySwiper = new Swiper(carousel, {
      slidesPerView: 1,
      spaceBetween: 24,
      slidesPerGroup: 1,

      pagination: {
        el: '.swiper-pagination-accordion',
        type: 'fraction',
        clickable: true
      },

      breakpoints: {
        1024: {
          slidesPerView: 3,
          spaceBetween: 40,
          slidesPerGroup: 3,
          pagination: {
            el: '.swiper-pagination-accordion',
            type: 'bullets',
            clickable: true
          },
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 40,
          slidesPerGroup: 2,
          pagination: {
            el: '.swiper-pagination-accordion',
            type: 'bullets',
            clickable: true
          },
        },
      },
    });
  }
};

export const ItgCirclePercentage = function () {
  let ItgCirclePercentage = document.querySelectorAll('.progress-pie-chart');
  
  ItgCirclePercentage.forEach(function(circle) {
    let percentage = circle.dataset.percent;
    let deg = 360*percentage/100;
    if( percentage == 100) {
      circle.classList.add('gt-100');
    }
    if (percentage > 50) {
      circle.classList.add('gt-50');
    }
    let fill = circle.querySelector('.ppc-progress-fill');
    fill.style.transform = 'rotate('+ deg +'deg)';
  })
}

ItgAccordionCarousel();
ItgCirclePercentage();
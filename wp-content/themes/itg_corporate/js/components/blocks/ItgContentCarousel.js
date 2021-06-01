import Swiper from 'swiper';

export const ItgContentCarousel = function () {
  let ItgContentCarousel = document.querySelectorAll('.itgBlock__ItgContentCarousel');


  for (const carouselContainer of ItgContentCarousel) {
    let carousel = carouselContainer.querySelector('.itgBlock__ItgContentCarousel--sliderContainer');
    let pagination = carouselContainer.querySelector('.itgBlock__ItgContentCarousel--sliderPagination');

    let mySwiper = new Swiper(carousel, {
      slidesPerView: 1,
      spaceBetween: 24,
      slidesPerGroup: 1,

      pagination: {
        el: pagination,
        type: 'fraction',
        clickable: true
      },

      breakpoints: {
        768: {
          slidesPerView: 2,
          spaceBetween: 40,
          slidesPerGroup: 2,
          pagination: {
            el: pagination,
            type: 'bullets',
            clickable: true
          },
        },
        1024: {
          slidesPerView: 2,
          spaceBetween: 15,
          slidesPerGroup: 2,
          pagination: {
            el: pagination,
            type: 'bullets',
            clickable: true
          },
        },
        1216: {
          slidesPerView: 2,
          spaceBetween: 40,
          slidesPerGroup: 2,
          pagination: {
            el: pagination,
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

ItgContentCarousel();
ItgCirclePercentage();
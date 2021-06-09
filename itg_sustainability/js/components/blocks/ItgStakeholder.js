import Swiper from 'swiper';

export const ItgStakeholder = function () {
  let ItgStakeholder = document.querySelectorAll('.itgBlock__ItgStakeholder');

  for (const [index, stakeholder] of ItgStakeholder.entries()) {
    let ItgStakeholderIcon = stakeholder.getElementsByClassName('itgBlock__ItgStakeholder--iconSlider')[0];
    let ItgStakeholderTitle = stakeholder.getElementsByClassName('itgBlock__ItgStakeholder--titleSlider')[0];     
    let ItgStakeholderCTAs = stakeholder.getElementsByClassName('itgAtom__ItgCTA');
    let popup = stakeholder.querySelectorAll('.itgBlock__ItgStakeholder--popup')[0]
    let popupTitle = stakeholder.querySelectorAll('.itgBlock__ItgStakeholder--popup-title')[0]
    let popupContent = stakeholder.querySelectorAll('.itgBlock__ItgStakeholder--popup-content')[0]
    let popupClose = stakeholder.querySelectorAll('.itgBlock__ItgStakeholder--popup-close')[0]     


    let SliderIcon = new Swiper(ItgStakeholderIcon, {
        slidesPerView: 3,
        spaceBetween: 40,
        simulateTouch: false,
        watchOverflow: true,
        centeredSlides: true,
        on:{
            slideChange: function(){
                SliderTitle.slideTo(this.activeIndex, 400, false)
            }
        },
        breakpoints: {
        1024: {
            slidesPerView: 8,
            simulateTouch: false,
        },
        },
    });    
    let SliderTitle = new Swiper(ItgStakeholderTitle, {
      slidesPerView: 1,
      spaceBetween: 40,
      simulateTouch: false,
      watchOverflow: true,
      centeredSlides: true,
      navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
      },      
        on:{
            slideChange: function(){
                SliderIcon.slideTo(this.activeIndex, 400, false)
            }
        },          
      breakpoints: {
        1024: {
          slidesPerView: 1,
          simulateTouch: false,
        },
      },
    });    

    let SliderIconSlides = SliderIcon.slides

    for (const key in SliderIconSlides) {
        const slide = SliderIconSlides[key];
        if(typeof(slide) === "object"){
            slide.addEventListener('click', function () {
                SliderTitle.slideTo(key);
            })
        }
    }
    
    for (const ItgStakeholderCTA of ItgStakeholderCTAs) {
        ItgStakeholderCTA.addEventListener('click', function () {
            popupContent.innerHTML = this.getAttribute('data-copy')
            popupTitle.innerHTML = this.getAttribute('data-title')
            popup.classList.add('is-active') 
        })
    }

    popupClose.addEventListener('click', function () {
        popup.classList.remove('is-active')
    })

  }

};

ItgStakeholder();

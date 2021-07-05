import Swiper from 'swiper';

export const ItgHeroImageSwiper = function ()
{
    let ItgHeroImageContainers = document.querySelector('.itgBlock-hero-image-slider');

    let mySwiper = new Swiper(ItgHeroImageContainers, {
        direction: 'horizontal',
        loop: true,
        //navigation: false,
        pagination: {
            clickable: true,
            el: ".swiper-pagination",
            renderBullet: function (index, className)
            {
<<<<<<< HEAD:itg_corporate/js/components/blocks/ItgHeroImageSlider.js
               return '<span class="' + className + '">' + "</span>";
=======
                return '<span class="' + className + '">' + "</span>";
>>>>>>> 70f39e7a32b975b4099337765747233fd9e61d00:itg_corporate/js/components/blocks/ItgHeroImageSwiper.js
            },
        },
    });
};

ItgHeroImageSwiper();
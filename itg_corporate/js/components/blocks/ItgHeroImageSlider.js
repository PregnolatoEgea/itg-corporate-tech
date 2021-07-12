import Swiper from 'swiper';

export const ItgHeroImageSwiper = function ()
{
    let ItgHeroImageContainers = document.querySelector('.itgBlock-hero-image-slider');

    let mySwiper = new Swiper(ItgHeroImageContainers, {
        direction: 'horizontal',
        loop: false,
        pagination: {
            clickable: true,
            el: ".swiper-pagination",
            renderBullet: function (index, className)
            {
                return '<span class="' + className + '">' + "</span>";
            },
        },
    });
};

ItgHeroImageSwiper();
import Swiper from 'swiper';

export const ItgHeroImageSwiper = function ()
{
    let ItgHeroImageContainers = document.querySelectorAll('.itgBlock-hero-image .swiper-container');

    for (const carousel of ItgHeroImageContainers)
    {
        let mySwiper = new Swiper(carousel, {
            direction: 'horizontal',
            loop: true,
            pagination: {
                clickable: true,
                el: ".swiper-pagination",
                renderBullet: function (index, className)
                {
                    return '<span class="' + className + '">' + "</span>";
                },
            },
        });
    }
};

ItgHeroImageSwiper();
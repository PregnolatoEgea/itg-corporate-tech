import Swiper from 'swiper';

export const ItgHeroImageSwiper = function ()
{
    let ItgCarouselHeroImageContainers = document.querySelectorAll('.itgBlock-hero-image .swiper-container');

    for (const carousel of ItgCarouselHeroImageContainers)
    {
        let mySwiper = new Swiper(carousel, {
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
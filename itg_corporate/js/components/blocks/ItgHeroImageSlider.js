import Swiper from 'swiper';

export const ItgHeroImageSwiper = function ()
{
    let ItgHeroImageContainers = document.querySelector('.itgBlock-hero-image-slider');

    let mySwiper = new Swiper(ItgHeroImageContainers, {
        direction: 'horizontal',
        loop: true,
        //navigation: false,
        autoplay: {
            delay: 4000,
            disableOnInteraction: true,
        },
        pagination: {
            dynamicBullets: true,
            dynamicMainBullets: 1,
            clickable: true,
            el: ".swiper-pagination",
            renderBullet: function (index, className)
            {
                return '<span class="' + className + '">' + "</span>";
            },
        },
        breakpoints: {
            800: {
                pagination: {
                    dynamicBullets: false,
                    clickable: true,
                    el: ".swiper-pagination",
                    renderBullet: function (index, className)
                    {
                        return '<span class="' + className + '">' + "</span>";
                    },
                }
            },
        }
    });
};

ItgHeroImageSwiper();
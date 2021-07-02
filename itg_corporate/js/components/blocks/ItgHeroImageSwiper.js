import Swiper from 'swiper';

export const ItgHeroImageSwiper = function ()
{
    console.log("Swiper Hero");
    let ItgHeroImageContainers = document.querySelector('.itgBlock-hero-image-slider');
    console.log(ItgHeroImageContainers);

    let mySwiper = new Swiper(ItgHeroImageContainers, {
        direction: 'horizontal',
        loop: true,
        navigation: false,
        pagination: {
            clickable: true,
            el: ".swiper-pagination",
            renderBullet: function (index, className)
            {
                console.log("Render bullet");
                return '<span class="' + className + '">' + "</span>";
            },
        },
    });
};

ItgHeroImageSwiper();
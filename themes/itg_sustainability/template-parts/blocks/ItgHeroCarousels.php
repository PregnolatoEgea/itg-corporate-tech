<?php //Follow bem syntax for css class naming http://getbem.com/naming/ ?>
<div id="itg__block_<?php echo $block_id ?>" class="itgBlock__ItgHeroCarousels <?php echo $environment; ?>">
    <div class="container">
        <div class="columns is-desktop">
            <div class="swiper-container">
                <div class="swiper-wrapper itgBlock__ItgHeroCarousel--sliderWrapper itg-mt-0 itg-mx-0 itg-mb-0">
                    <?php
                        if (have_rows('carousels')):
                        $slider = true;

                        while (have_rows('carousels')): the_row();
                    ?>
                    <div class="swiper-slide itgBlock__ItgHeroCarousels--single is-paddingless">
                        <?php
                            require 'ItgSingleHeroCarousel.php'
                        ?>
                    </div>
                    <?php
                        endwhile;
                        endif;

                        // Set null to common variables for 'ItgSingleHeroCarousel component
                        $slider = null;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

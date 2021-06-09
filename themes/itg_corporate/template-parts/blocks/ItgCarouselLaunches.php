<?php //Follow bem syntax for css class naming http://getbem.com/naming/ ?>
<div id="itg_block_<?php echo $block_id; ?>" class="itgBlock__ItgCarouselLaunches <?php echo $enviroment; ?>">
  <div class="container">
    <div class="columns is-desktop">
      <div class="swiper-container">
        <div class="swiper-wrapper itgBlock__ItgCarouselLaunches--sliderWrapper itg-mt-0 itg-mx-0 itg-mb-0">
          <?php

            $allineamentoSliderImg = get_sub_field("allineamento_immagini_a_destra");

            if( have_rows('launches') ):

              $slider = true;

              while( have_rows('launches') ) : the_row();

              ?>
                <div class="swiper-slide itgBlock__ItgCarouselLaunches--single is-paddingless">
                  <?php
                    require 'ItgSingleLaunch.php';
                  ?>
                </div>
              <?php

              endwhile;

            endif;

            // set null tu common variables for `ItgSingleLaunch` component
            $slider = null;
            $allineamentoSliderImg = null;
          ?>
        </div>

      </div>
    </div>
  </div>
</div>
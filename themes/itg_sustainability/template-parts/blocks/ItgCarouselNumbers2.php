<?php //Follow bem syntax for css class naming http://getbem.com/naming/ ?>
<div id="itg_block_<?php echo $block_id; ?>" class="swiper-container itgBlock__ItgCarouselNumbers2 itg-mb-80 container <?php echo $enviroment; ?>">
  <div class="swiper-wrapper itgBlock__ItgCarouselNumbers--sliderWrapper columns itg-mt-0 itg-mx-0 itg-mb-56">
    <?php
      $columnWidth = (counItgCarouselNumbers.phpt(get_sub_field('numbers')) == 4) ? 'is-3' : 'is-4' ;
      $text_color = get_sub_field('text_color');

      if( have_rows('numbers') ):

        while( have_rows('numbers') ) : the_row();
        ?>
          <div class="swiper-slide itgBlock__ItgCarouselNumbers--single column is-12-mobile <?php echo $columnWidth; ?> is-paddingless">
            <?php
              require 'atoms/ItgNumber.php';
            ?>
          </div>
        <?php

        endwhile;

      endif;
    ?>
  </div>
  <div class="swiper-pagination itgBlock__ItgCarouselNumbers--pagination"></div>
</div>
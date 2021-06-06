<?php //Follow bem syntax for css class naming http://getbem.com/naming/ ?>
<div id="itg_block_<?php echo $block_id; ?>" class="swiper-container itgBlock__ItgCarouselImageCard itg-mb-80 itg-pt-24 container <?php echo $enviroment; ?>">
  <div class="swiper-wrapper itgBlock__ItgCarouselImageCard--sliderWrapper columns itg-mt-0 itg-mx-0 itg-mb-56">
    <?php
      if( have_rows('cards') ):

        while( have_rows('cards') ) : the_row();

            $card_title = get_sub_field('title');
            $card_copy = get_sub_field('copy');
            $card_background_color = get_sub_field('background_color');
            $card_back_background_color = get_sub_field('back_background_color_background_color');
            $card_paragraph_style = get_sub_field('paragraph_style');
            $card_title_style = get_sub_field('title_style');
            $card_image = get_sub_field('image');

        ?>
          <div class="flip-card swiper-slide itgBlock__ItgCarouselImageCard--single column is-4 is-1-mobile is-paddingless">
            <div class="flip-card-inner">
              <div class="flip-card-front <?php if($card_background_color){ echo 'itg--background-color-' . $card_background_color; } ?>">
                <div class="itgBlock__ItgCarouselImageCard--single-image">
                  <?php if($card_image){
                    ?>
                      <img src="<?php echo $card_image['url']; ?>" alt="<?php echo $card_image['alt']; ?>">
                    <?php
                  } ?>
                </div>
                <?php
                if($card_title){ ?>
                    <div class="itgBlock__ItgCarouselImageCard--single-title itg-mt-16 itg-mb-8 <?php echo $card_title_style; ?>">
                      <?php echo $card_title; ?>
                    </div>
                  <?php
                }
                ?>
              </div>
              <div class="flip-card-back <?php if($card_back_background_color){ echo 'itg--background-color-' . $card_back_background_color; } ?>">
                <?php
                if($card_copy){ ?>
                    <div class="itgBlock__ItgCarouselImageCard--single-copy itg-px-32 <?php echo $card_paragraph_style; ?>">
                      <?php echo $card_copy; ?>
                    </div>
                  <?php
                }
                ?>
              </div>
            </div>
          </div>
        <?php

        endwhile;

      endif;
    ?>
  </div>
  <div class="swiper-pagination itgBlock__ItgCarouselImageCard--pagination"></div>
  <?php
    if(get_sub_field('cta_link')){
      $is_offset = 'is-offset-6-desktop';
      $is_centered = 'is-centered';
      require 'atoms/ItgAtomCta.php';
    }
  ?>
</div>
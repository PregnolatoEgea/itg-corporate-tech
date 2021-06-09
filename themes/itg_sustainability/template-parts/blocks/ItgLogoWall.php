<?php
$cta_link = get_sub_field('cta_link');
$cta_font_and_border_color = get_sub_field('cta_font_and_border_color');
$cta_icon_style = get_sub_field('cta_icon_style');
$is_centered = true;
$is_offset = '';
$copy_style = get_sub_field('copy_style_paragraph_style');
$copy = get_sub_field('copy');
?>
<div id="itg_block_<?php echo $block_id; ?>" class="swiper-container container itgBlock__logoWall <?php echo $enviroment; ?>">
  <?php
    if( have_rows('brands') ):

      ?>

        <div class="itgBlock__logoWall--container swiper-wrapper columns is-flex is-flex-wrap-wrap">

          <?php

          while( have_rows('brands') ) : the_row();

              $brand_image = get_sub_field('brand');
              $brand_link = get_sub_field('brand');

              ?>

                <div class="column is-3 swiper-slide">
                  <a class="itgBlock__logoWall--single" href="<?php echo $brand_link['url']; ?>">
                    <img src="<?php echo $brand_image['url']; ?>" alt="<?php echo $brand_image['alt']; ?>">
                  </a>
                </div>

              <?php

          ?>

          <?php

          endwhile;

      ?>

        </div>

      <?php

    endif;
    if($copy){
      ?>
      <div class="columns itg-mt-24 itg-mb-32">
        <div class="itgBlock___logoWall--copy column is-8 is-offset-2 has-text-align-center <?php if($copy_style){echo $copy_style;} ?>">
          <?php echo $copy; ?>
        </div>
      </div>
      <?php
    }
  ?>
  <?php
    if (get_sub_field('cta_link')) {
      require 'atoms/ItgAtomCta.php';
    }
?>
</div>

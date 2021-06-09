<?php //Follow bem syntax for css class naming http://getbem.com/naming/ ?>
<div id="itg_block_<?php echo $block_id; ?>" class="itgBlock-ItgStories container <?php echo $enviroment; ?>">
  <?php
    if( have_rows('stories') ):

      while( have_rows('stories') ) : the_row();

          $story_title = get_sub_field('title');
          $story_title_color = get_sub_field('title_settings_text_color');
          $story_copy = get_sub_field('copy');
          $story_copy_color = get_sub_field('copy_settings_text_color');
          $story_image = get_sub_field('image');
          $story_layout = get_sub_field('layout');

          // check order
          $column_order = ($story_layout == 'text_sx_image_dx') ? ' itgBlock-ItgStories__single--reverse' : '' ;
          $offset_image_col = ($story_layout == 'text_sx_image_dx') ? ' is-offset-1-desktop' : '' ;
          $offset_text_col = ($story_layout == 'image_sx_text_dx') ? ' is-offset-1-dektop' : '' ;
      ?>
      <div class="itgBlock-ItgStories__single columns itg-mx-0<?php echo $column_order; ?>">
        <div class="itgBlock-ItgStories__image column is-6-desktop is-10-touch <?php echo $offset_image_col; ?>">
          <img src="<?php echo $story_image['url']; ?>" alt="<?php echo $story_image['alt']; ?>">
        </div>
        <div class="itgBlock-ItgStories__text column is-5-desktop is-10-touch <?php echo $offset_text_col; ?>">
          <div class="itgBlock-ItgStories__text-title <?php echo ($story_title_color) ? " itg--color-{$story_title_color}" : '' ; ?>"><?php echo $story_title; ?></div>
          <div class="itgBlock-ItgStories__text-copy<?php echo ($story_copy_color) ? " itg--color-{$story_copy_color}" : '' ; ?>"><?php echo $story_copy; ?></div>
          <?php
            if(get_sub_field('cta_link')){
              $is_offset = '';
              require 'atoms/ItgAtomCta.php';
            }
          ?>
        </div>
      </div>
    <?php

    endwhile;

  endif;
?>
</div>
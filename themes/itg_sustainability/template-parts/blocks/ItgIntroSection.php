<?php
  $textimage_align = get_sub_field('textimage_align');
  $background_color = get_sub_field('background_color');
  $title = get_sub_field('title');
  $paragraph = get_sub_field('paragraph');
  $image = get_sub_field('image');
  $image_columns = get_sub_field('image_columns');
  $heading_columns = get_sub_field('heading_columns');
  $heading_style = get_sub_field('heading_style');
  $paragraph_style = get_sub_field('paragraph_style');
  $image_after_title_on_mobile = get_sub_field('image_after_title_on_mobile');
  $swap_mobile_class = $image_after_title_on_mobile ? 'swap-mobile' : '';
?>
<div id="itg_block_<?php echo $block_id; ?>" class="container itgBlock-intro-section itg--background-color-<?php echo $background_color; ?> <?php echo $enviroment; ?>">
  <div class="columns is-variable is-6 is-multiline <?php echo $swap_mobile_class ?>">
    <?php if ($textimage_align === 'text-dx-image-sx') {?>
      <div class="itgBlock-intro-section__img column <?php echo $image_columns ?> is-6-mobile is-offset-3-mobile has-text-centered">
        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
      </div>
      <div class="itgBlock-intro-section__title column <?php echo $heading_columns ?> <?php echo $heading_style ?> has-text-centered-touch">
        <<?php echo $heading_style; ?>>
          <?php echo $title ?>
        </<?php echo $heading_style; ?>>
      </div>
    <?php } else { ?>
      <div class="itgBlock-intro-section__title column <?php echo $heading_columns ?> <?php echo $heading_style ?> has-text-centered-touch">
        <<?php echo $heading_style; ?>>
          <?php echo $title ?>
        </<?php echo $heading_style; ?>>
      </div>
      <div class="itgBlock-intro-section__img column <?php echo $image_columns ?> is-6-mobile is-offset-3-mobile has-text-centered itg-my-50">
        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
      </div>
    <?php }?>
  </div>
  <div class="columns is-variable is-6 is-multiline">
    <div class="itgBlock-intro-section__description-container column is-6-desktop is-offset-3-desktop has-text-centered is-10-touch">
      <div class="itgBlock-intro-section__description <?php echo $paragraph_style ?>">
        <?php echo $paragraph ?>
      </div>
    </div>
  </div>
</div>

<?php
  $align = get_sub_field('align');
  $title = get_sub_field('title');
  $paragraph = get_sub_field('paragraph');
  $heading_style = get_sub_field('heading_style');
  $paragraph_style = get_sub_field('paragraph_style');
  $image = get_sub_field('image');
  $image_fixed_height = get_sub_field('image_fixed_height');
  if ($image_fixed_height) {
    $imageMaxHeight = "158px";
  } else {
    $imageMaxHeight = "100%";
  }
  $swapMobile = 'no-swap-mobile';
  if ($align === 'img-dx-text-sx') {
    $swapMobile = 'swap-mobile';
  }
?>
<div id="itg_block_<?php echo $block_id; ?>" class="container itgBlock-icon-text-type23 <?php echo $enviroment; ?>">
  <div class="columns is-variable is-6 is-multiline is-centered <?php echo $swapMobile; ?>">
    <?php if ($align === 'img-sx-text-dx') { ?>
      <div class="column is-2 is-4-touch has-text-centered-mobile has-text-centered-tablet-only">
        <img
          src="<?php echo $image['url']; ?>"
          alt="<?php echo $image['alt']; ?>"
          style="max-height: <?php echo $imageMaxHeight; ?>"
        >
      </div>
      <div class="column is-8 is-10-touch">
        <div class="columns is-variable is-6 is-multiline">
          <div class="itgBlock-icon-text-type23__title column is-12 has-text-centered-mobile has-text-centered-tablet-only">
            <div class="<?php echo $heading_style ?>">
              <<?php echo $heading_style ?>>
                <?php echo $title ?>
              </<?php echo $heading_style ?>>  
            </div>
          </div>
          <div class="itgBlock-icon-text-type23__content column is-12 has-text-centered-mobile has-text-centered-tablet-only">
            <div class="<?php echo $paragraph_style ?>">
              <?php echo $paragraph ?>
            </div>
          </div>
        </div>
      </div>
    <?php
      } else {
    ?>
      <div class="column is-8 is-10-touch">
        <div class="columns is-variable is-6 is-multiline">
          <div class="itgBlock-icon-text-type23__title column is-12 has-text-centered-mobile has-text-centered-tablet-only">
            <div class="<?php echo $heading_style ?>">
              <?php echo $title ?>
            </div>
          </div>
          <div class="itgBlock-icon-text-type23__content column is-12 has-text-centered-mobile has-text-centered-tablet-only">
            <div class="<?php echo $paragraph_style ?>">
              <?php echo $paragraph ?>
            </div>
          </div>
        </div>
      </div>
      <div class="column is-2 is-4-touch has-text-centered-mobile has-text-centered-tablet-only">
        <img
          src="<?php echo $image['url']; ?>"
          alt="<?php echo $image['alt']; ?>"
          style="max-height: <?php echo $imageMaxHeight; ?>"
        >
      </div>
    <?php
      }
    ?>
  </div>
</div>

<?php
  $title = get_sub_field('title');
  $paragraph = get_sub_field('paragraph');
  $heading_style = get_sub_field('heading_style');
  $paragraph_style = get_sub_field('paragraph_style');
  $image = get_sub_field('image');
?>
<div id="itg_block_<?php echo $block_id; ?>" class="container itgBlock-lancio-rating-esg <?php echo $enviroment; ?>">
  <div class="itgBlock-lancio-rating-esg__container columns is-multiline">
    <div class="column is-5 is-10-touch is-offset-1-desktop">
      <div class="itgBlock-lancio-rating-esg__image-card ">
        <img
          src="<?php echo $image['url']; ?>"
          alt="<?php echo $image['alt']; ?>"
        >
      </div>
    </div>
    <div class="column is-6 is-8-touch itg-px-20">
      <div class="columns is-multiline">
        <div class="itgBlock-lancio-rating-esg__title column is-10-desktop is-offset-2-desktop">
          <div class="<?php echo $heading_style ?>">
            <<?php echo $heading_style ?>>
              <?php echo $title ?>
            </<?php echo $heading_style ?>>  
          </div>
        </div>
      </div>
      <div class="columns is-multiline">
        <div class="itgBlock-lancio-rating-esg__paragraph column is-12">
          <div class="<?php echo $paragraph_style ?>">
            <?php echo $paragraph ?>
          </div>
        </div>
      </div>
      <div class="columns is-multiline">
        <div class="itgBlock-lancio-rating-esg__cta column is-6-desktop is-offset-6-desktop">
          <?php
            if (get_sub_field('cta_link')) {
              $is_centered = 'is-touch is-centered';
              require 'atoms/ItgAtomCta.php';
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>

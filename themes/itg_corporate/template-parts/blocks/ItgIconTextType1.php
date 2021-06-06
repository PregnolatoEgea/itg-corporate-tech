<?php
  $title = get_sub_field('title');
  $subtitle = get_sub_field('subtitle');
  $paragraph = get_sub_field('paragraph');
  $image = get_sub_field('image');
  $image_columns = get_sub_field('image_columns');
  $heading_style = get_sub_field('heading_style');
  $subtitle_style_paragraph_style = get_sub_field('subtitle_style_paragraph_style');
  $paragraph_style = get_sub_field('paragraph_style');
?>
<div id="itg_block_<?php echo $block_id; ?>" class="container itgBlock-icon-text-type1 <?php echo $enviroment; ?>">
  <?php
    if($image){
      ?>
        <div class="itgBlock-icon-text-type1__image columns is-variable is-6 is-centered">
          <div class="column <?php echo $image_columns ?> is-6-mobile is-offset-3-mobile has-text-centered">
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
          </div>
        </div>
      <?php
    }
  ?>
  <?php
    if($title){
      ?>
        <div class="itgBlock-icon-text-type1__title columns is-variable is-6 is-centered">
          <div class="itgBlock-icon-text-type1__title-inner column is-8 <?php echo $heading_style ?> is-12-mobile has-text-centered">
            <<?php echo $heading_style ?>>
              <?php echo $title ?>
            </<?php echo $heading_style ?>>  
          </div>
        </div>
      <?php
    }
  ?>
  <?php
  if($subtitle){
    ?>
      <div class="itgBlock-icon-text-type1__subtitle columns is-variable is-6 is-centered">
        <div class="column is-8 is-12-mobile has-text-centered">
          <div class="<?php echo $subtitle_style_paragraph_style ?>">
            <?php echo $subtitle ?>
          </div>
        </div>
      </div>
    <?php
  }
  ?>
  <?php
  if($paragraph){
    ?>
      <div class="itgBlock-icon-text-type1__description columns is-variable is-6 is-centered">
        <div class="column is-8 is-12-mobile has-text-centered">
          <div class="<?php echo $paragraph_style ?>">
            <?php echo $paragraph ?>
          </div>
        </div>
      </div>
    <?php
  }
  ?>
  <div class="itgBlock-icon-text-type1__cta columns is-variable is-6 is-centered">
    <div class="itgBlock-icon-text-type1__cta-inner column is-12 has-text-centered itg-mt-48">
      <?php
        if (get_sub_field('cta_link')) {
          $is_centered = 'is-centered';
          require 'atoms/ItgAtomCta.php';
        }
      ?>
    </div>
  </div>
</div>

<?php
$image = get_sub_field('image');
$columnWidth = ($image) ? 'is-10-widescreen is-12-desktop' : 'is-8-widescreen is-10-desktop' ;
$quote = get_sub_field('quote');
$author_name = get_sub_field('author_name');
$author_role = get_sub_field('author_role');
$background_color = get_sub_field('background_color');
$text_color = get_sub_field('text_color');
?>
<div id="itg_block_<?php echo $block_id; ?>" class="itgBlock-quote <?php echo $enviroment; ?><?php echo ($background_color) ? " itg--background-color-$background_color" : '' ; ?>">
  <div class="container">
    <div class="columns is-multiline is-centered is-flex-direction-column-only-touch">
      <?php if ($image) : ?>
      <div class="column is-2-widescreen itg-pt-16 itg-pb-48 is-flex-touch is-justify-content-center">
        <div class="itgBlock-quote__image">
          <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
        </div>
      </div>
      <?php endif; ?>
      <div class="column itgBlock-quote__container is-8-desktop is-12-mobile">
        <div class="itgBlock-quote__text">
          <h4 class="itgBlock-quote__quotes<?php echo ($text_color) ? " itg--color-$text_color" : '' ; ?>"><?php echo $quote; ?></h4>
        </div>
      </div>
      <div class="column itgBlock-quote__container <?php echo $columnWidth; ?>">
        <div class="itgBlock-quote__author">
          <p class="<?php echo ($text_color) ? "itg--color-$text_color" : '' ; ?>">
            <strong class="<?php echo ($text_color) ? "itg--color-$text_color" : '' ; ?>"><?php echo $author_name; ?></strong><br>
            <?php echo $author_role; ?>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
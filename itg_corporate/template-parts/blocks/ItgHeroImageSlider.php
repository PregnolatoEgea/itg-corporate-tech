<?php
$background_color = '#d3f4ff';
$color = '#003478';
$background = 'none';
$opacity = '1';
?>
<section class="section is-paddingless">

  <div id="itg_block_<?php echo $block_id; ?>" class="itgBlock-hero-image-slider swiper-container is-marginless <?php if (get_sub_field('has_reduced_height')) {
                                                                                                                  echo 'has_reduced_height';
                                                                                                                } ?>" style="background: <?php echo $background; ?>; opacity: <?php echo $opacity; ?>;color: <?php echo $color; ?>; background-color: <?php echo $background_color; ?>; background-image: url(<?php echo $background_image; ?>)">

    <div class="swiper-wrapper itgBlock__ItgHeroImageSlider--sliderWrapper columns is-variable is-12-desktop is-10-touch is-multiline is-marginless">
      <div class="swiper-slide column itgBlock-hero-image-slider-container is-paddingless">
        <div class="columns is-12-desktop is-multiline px-3">
          <?php
          if (get_field("stampare_breadcrumbs") && $block_id === 0) {
            $breadcrumbs_color = get_field("colore_breadcrumbs") == "nero" ? "#000" : "#fff";

            if (function_exists('yoast_breadcrumb')) {
              yoast_breadcrumb('<p id="breadcrumbs" style="color: ' . $breadcrumbs_color . '">', '</p>');
            }
          }
          ?>
          <h1>
            <?php echo $title ?>
          </h1>
        </div>
        <?php
        if ($paragraph) {
        ?>
          <div class="itgBlock-hero-image-slider__subtitle column is-10-desktop px-0">
            <div class="<?php echo $paragraph_style ?> itgBlock-hero-image__subtitle--mobile-style">
              <?php echo $paragraph ?>
            </div>
          </div>
        <?php } ?>
        <?php
        if (have_rows('image_slider')) {
        ?>
          <div class="itgBlock-hero-image-slider__cta-list column is-5">
            <div class="itgBlock-hero-image-slider__cta-list-inner columns">
              <?php
              while (have_rows('image_sldier')) : the_row();
                var_dump('$fields');
              endwhile;
              ?>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
    <div class="swiper-pagination itgBlock__ItgHeroImageSlider--pagination"></div>
  </div>
</section>
<?php
$title_alignment = get_sub_field('title_alignment');
$paragraph_alignment = get_sub_field('paragraph_alignment');
$title = get_sub_field('title');
$heading_style = get_sub_field('heading_style');
$paragraph = get_sub_field('paragraph');
$paragraph_style = get_sub_field('paragraph_style');
$background_image = get_sub_field('background_image');
$arrow_down_centered = get_sub_field('arrow_down_centered');
if ($title_alignment === 'is-centered') {
  $title_align = 'has-text-centered';
} else {
  $title_align = 'has-text-left';
}
if ($paragraph_alignment === 'is-centered') {
  $paragraph_align = 'has-text-centered';
} else {
  $paragraph_align = 'has-text-left';
}

$background_color = '#d3f4ff';
$color = '#003478';
$background = 'none';
$opacity = '1';

if ($background_image) {
  $background_color = 'transparent';
  $color = 'white';
  $opacity = '0.8';
  $background = 'linear-gradient(297.44deg, rgba(2, 28, 61, 0.5) 0%, #021c3d 100%)';
}
?>
<section class="section is-paddingless">
    <pre> <?php var_dump($fields); ?></pre>
  <div id="itg_block_<?php echo $block_id; ?>" class="itgBlock-hero-image-slider swiper-container is-marginless <?php if (get_sub_field('has_reduced_height')) {
                                                                                                            echo 'has_reduced_height';
                                                                                                          } ?>" style="background: <?php echo $background; ?>; opacity: <?php echo $opacity; ?>;color: <?php echo $color; ?>; background-color: <?php echo $background_color; ?>; background-image: url(<?php echo $background_image; ?>)">

    <div class="swiper-wrapper itgBlock__ItgHeroImage--sliderWrapper columns is-variable is-12-desktop is-10-touch is-multiline is-marginless">
      <div class="swiper-slide column itgBlock-hero-image-container is-paddingless">
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
          <div class="itgBlock-hero-image__subtitle column is-10-desktop px-0">
            <div class="<?php echo $paragraph_style ?> itgBlock-hero-image__subtitle--mobile-style">
              <?php echo $paragraph ?>
            </div>
          </div>
        <?php } ?>
        <?php
        if (have_rows('cta_list')) {
        ?>
          <div class="itgBlock-hero-image__cta-list column is-5">
            <div class="itgBlock-hero-image__cta-list-inner columns">
              <?php
              while (have_rows('cta_list')) : the_row();
                $is_offset = 'is-offset-0';
                require 'atoms/ItgAtomCta.php';
              endwhile;
              ?>
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="swiper-slide">Slide2</div>
      <div class="swiper-slide">Slide3</div>
    </div>
    <div class="swiper-pagination itgBlock__ItgHeroImage--pagination"></div>
  </div>
</section>
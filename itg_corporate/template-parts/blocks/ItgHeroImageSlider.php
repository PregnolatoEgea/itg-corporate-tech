<?php
$background_color = '#d3f4ff';
$color = '#003478';
$background = 'none';
$opacity = '1';
$bg_imge = get_sub_field('slide_background_image');

if ($bg_imge) {
    $background_color = 'transparent';
    $color = 'white';
    $opacity = '0.8';
    $background = 'linear-gradient(297.44deg, rgba(2, 28, 61, 0.5) 0%, #021c3d 100%)';
}
?>
<section class="section is-paddingless">
    <div id="itg_block_<?php echo $block_id; ?>" class="itgBlock-hero-image-slider swiper-container is-marginless <?php if (get_sub_field('has_reduced_height')) {
                                                                                                                        echo 'has_reduced_height';
                                                                                                                    } ?>" style="background: <?php echo $background; ?>; opacity: <?php echo $opacity; ?>;color: <?php echo $color; ?>; background-color: <?php echo $background_color; ?>; background-image: url(<?php echo $bg_imge; ?>)">

        <div class="swiper-wrapper itgBlock__ItgHeroImageSlider--sliderWrapper columns is-variable is-12-desktop is-10-touch is-multiline is-marginless">
            <?php if (have_rows('hero_image_slider')) {

                // Loop through rows.
                while (have_rows('hero_image_slider')) : the_row();
                    $hero_slider_paragraph = get_sub_field('slide_paragraph');
                    $hero_slider_title = get_sub_field('slide_title');

            ?>
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
                                <?php echo $hero_slider_title; ?>
                            </h1>
                        </div>
                        <div class="itgBlock-hero-image-slider__subtitle column is-10-desktop px-0">
                            <div class="<?php echo $paragraph_style ?> itgBlock-hero-image__subtitle--mobile-style">
                                <?php echo $hero_slider_paragraph ?>
                            </div>
                        </div>
                        <div class="itgBlock-hero-image-slider__cta-list column is-5">
                            <div class="itgBlock-hero-image-slider__cta-list-inner columns">
                                <?php
                                while (have_rows('cta_list')) : the_row();
                                    $is_offset = 'is-offset-0';
                                    require 'atoms/ItgAtomCta.php';
                                endwhile;
                                ?>
                            </div>
                        </div>
                    <?php
                endwhile;
                    ?>
                    </div>

                <?php } ?>
        </div>
        <div class="swiper-pagination itgBlock__ItgHeroImageSlider--pagination"></div>
    </div>
</section>
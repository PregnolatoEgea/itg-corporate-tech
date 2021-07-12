<section class="section is-paddingless">
	<div id="itg_block_<?php echo $block_id; ?>" class="itgBlock-hero-image-slider swiper-container is-paddingless <?php if (get_sub_field('has_reduced_height')) {
																														echo 'has_reduced_height';
																													} ?>">

		<div class="swiper-wrapper itgBlock__ItgHeroImageSlider--sliderWrapper is-12-desktop">
			<?php if (have_rows('hero_image_slider')) {

				$background_color = '#d3f4ff';
				$color = '#003478';
				$background = 'none';
				$opacity = '1';

				// Loop through rows.
				while (have_rows('hero_image_slider')) : the_row();
					$hero_slider_cta_link = get_sub_field('link_cta');
					$hero_slider_paragraph = get_sub_field('slide_paragraph');
					$hero_slider_title = get_sub_field('slide_title');
					$hero_cta = get_sub_field('cta_link');
					$bg_image = get_sub_field('slide_image');
					if ($bg_imge) {
						$background_color = 'transparent';
						$color = 'white';
						$opacity = '0.8';
						$background = 'linear-gradient(297.44deg, rgba(2, 28, 61, 0.5) 0%, #021c3d 100%)';
					}
			?>
					<div class="swiper-slide" style="background-image: url(<?php echo $bg_image; ?>); color: <?php echo $color; ?>; opacity: <?php echo $opacity; ?>; background: <?php echo $background; ?>; background-color: <?php echo $background_color; ?>;">
						<div class="columns is-12-desktop is-multiline px-3 ">
							<?php
							if (get_field("stampare_breadcrumbs") && $block_id === 0) {
								$breadcrumbs_color = get_field("colore_breadcrumbs") == "nero" ? "#000" : "#fff";

								if (function_exists('yoast_breadcrumb')) {
									yoast_breadcrumb('<p id="breadcrumbs" style="color: ' . $breadcrumbs_color . '">', '</p>');
								}
							}
							?>
							<h3>
								<?php echo $hero_slider_title; ?>
							</h3>
						</div>
						<div class="itgBlock-hero-image-slider__subtitle column is-10-desktop px-0">
							<div class="<?php echo $paragraph_style ?> itgBlock-hero-image__subtitle--mobile-style">
								<?php echo $hero_slider_paragraph ?>
							</div>
						</div>
						<div class="itgBlock-hero-image-slider__cta-list column is-5">
							<div class="itgBlock-hero-image-slider__cta-list-inner columns">
								<?php require 'atoms/ItgAtomCta.php'; ?>
							</div>
						</div>
					</div>
				<?php
				endwhile;
				?>
		</div>
		<div class="swiper-pagination itgBlock__ItgHeroImageSlider--pagination"></div>
	<?php } ?>
	</div>
</section>
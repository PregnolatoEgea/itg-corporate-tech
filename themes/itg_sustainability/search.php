<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Itg_Sustainability
 */

get_header();
?>

	<main id="primary" class="site-main" style="margin-top: 7rem">

	<div class="itgBlock-textBox itg-mb-40">
		<div class="container">
			<div class="columns is-centered">
			<div class="column is-8">
				<div class="p2 itg--color-blue-1"><?php echo $wp_query->post_count . __(' Risultati', 'itg_sustainability') . __(' per ', 'itg_sustainability') . '<strong>' . $_GET['s'] . '</strong>'; ?></div>
			</div>
			</div>
		</div>
	</div>		

		<?php if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				?>

					<div class="itgBlock-textBox itg-mb-24">
						<div class="container">
							<div class="columns is-centered">
							<a href="<?php echo get_the_permalink(); ?>" class="column is-8">
								<?php
								$image = get_the_post_thumbnail_url(get_the_ID(), 'search_cut');
								if(get_field('layout_builder', get_the_ID(  ))[0]['layout'][0]["acf_fc_layout"] === 'hero_image'){
									$title = get_field('layout_builder', get_the_ID(  ))[0]['layout'][0]['title'];
									$paragraph = get_field('layout_builder', get_the_ID(  ))[0]['layout'][0]['paragraph'];

									?>
										<div style="display: flex; justify-items: center; align-items:center">
											<?php if($image){
												?>
													<img src="<?php echo $image; ?>" style="max-width: 200px; padding: 25px">
												<?php
											} ?>
											<div>
												<div class="h6 itg--color-blue-1"><?php echo strip_tags($title); ?></div>
												<div class="p2 itg--color-black"><?php echo strip_tags($paragraph); ?></div>
											</div>
										</div>
									<?php									
								}else{
									?>
									<div style="display: flex; justify-items: center; align-items:center">
										<?php if($image){
											?>
												<img src="<?php echo $image; ?>" style="max-width: 200px; padding: 25px">
											<?php
										} ?>
										<div>
											<div class="h6 itg--color-blue-1"><?php echo get_the_title( get_the_ID() ); ?></div>
											<div class="p2 itg--color-black"><?php echo get_the_content( get_the_ID() ); ?></div>
										</div>
									</div>
									<?php									
								}						
								?>
							</a>
							</div>
						</div>
					</div>				

				<?php

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */

			endwhile;

			//the_posts_navigation();

		else :

			//get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();

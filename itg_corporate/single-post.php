<?php
/**
 *
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Itg_Sustainability
 * Template Name: Single Post
 * Template Post Type: post

 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

            require 'template-parts/layout-single.php';
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();

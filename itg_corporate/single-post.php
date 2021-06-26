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
$terms = get_the_terms( $post->ID , 'category');
if($terms) {
    foreach( $terms as $term ) {
        $cat_obj = get_term($term->term_id, 'category');
        $cat_slug = $cat_obj->slug;
    }
}
?>

	<main id="primary" class="site-main category-<?php echo $cat_slug; ?>">

		<?php
		while ( have_posts() ) :
			the_post();

            require 'template-parts/layout-single.php';
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();

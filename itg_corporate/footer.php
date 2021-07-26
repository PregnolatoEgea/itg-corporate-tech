<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Itg_Sustainability
 */


$footer_logo = get_field('footer_logo', 'option');
$sub_footer_left_copy = get_field('sub_footer_left_copy', 'option');
$sub_footer_right_copy = get_field('sub_footer_right_copy', 'option');
$footer_menu = wp_get_nav_menu_items('footer-menu');
$i = 0;
$wrap_count_first_level = 4;
?>

<?php
	if ( !is_home() && ! is_front_page() && !is_single()) :
	/* last udpate */
	$u_time = get_the_time('U');
	$u_modified_time = get_the_modified_time('U');
	if ($u_modified_time >= $u_time + 86400) {


?>
<div id="itg_block_<?php echo $block_id; ?>" class="itgBlock-lastUpdate <?php echo $enviroment; ?>">
    <div class="columns is-mobile is-multiline is-centered is-gapless itgBlock-lastUpdate__container  is-vcentered">
        <div class="column is-narrow">
            <span class="itgBlock-lastUpdate__label itg--color-<?php echo $last_update_color; ?>">
               <?php echo _e('Ultimo aggiornamento'); ?>:&nbsp;
            </span>
        </div>
        <div class="column is-narrow">
            <span class="itgBlock-lastUpdate__date itg--color-<?php echo $last_update_color; ?>">
               <time class="modified-date" datetime="<?php echo the_modified_time('j F, Y'); ?>" itemprop="dateModified">&nbsp;<?php echo the_modified_time('j F, Y'); ?>&nbsp;- <?php echo the_modified_time(); ?></time>
            </span>
        </div>
  </div>
<?php } ?>
<?php endif; ?>




	        <?php if ( ICL_LANGUAGE_CODE=='it' ) : ?>
 <footer id="colophon" class="site-footer">
    <div class="section is-paddingless">
        <div class="itgFooter itg-py-56">
            <!-- Tablet and up version -->
            <div class="itgFooter__left-container column is-10 is-4-tablet is-hidden-mobile">
                <div class="itgFooter__menu is-7-desktop is-offset-1-desktop columns is-centered">
                    <?php $navArgs = array('footer-menu' => new footer_menu_walker());
                    wp_nav_menu($navArgs);
                    ?>
                </div>
                <a class="ItgFooter__toggleBtn menu-item-has-children" href="#">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/src/images/icons/rapid_link.svg" />
                </a>
            </div>

            <!-- Mobile version -->
            <div class="itgFooter__left-container is-12 is-hidden-tablet itgFooter__mobile-flavour">
                <div class="itgFooter__menu is-12 text-left">
                    <?php $navArgs = array('footer-menu' => new footer_menu_walker());
                    wp_nav_menu($navArgs);
                    ?>
                </div>
            </div>

        </div>
        <div class="container is-hidden-mobile">

										<div class="columns is-justify-content-left is-vcentered">
						        <div class="column is-6">
							        <div class="columns">
				            <?php
				            if ($footer_logo) {
				                ?>
				                <div class="itgFooter__logo column">
				                    <img src="<?php echo $footer_logo['url']; ?>" alt="<?php echo $footer_logo['alt']; ?>" width="143" height="49">
				                </div>
				                <?php
				            }
				            ?>

				            <?php

				            if (have_rows('footer_badge', 'option')) :
				                ?>
				                    <?php

				                    while (have_rows('footer_badge', 'option')) : the_row();
					?>
					<div class="itgFooter__logo_badge column is-justify-content-left">
				<img src="<?php echo get_sub_field('upload_footer_image'); ?>" width="" height="" />
					</div>

				                    <?php

				                    endwhile;
				                    ?>
				            <?php
				            endif;
				            ?>
							        </div>
					        </div>
					        </div>
				        </div>
				        <div class="itgSubFooter container itg-py-56">

				            <?php
				            if ($sub_footer_left_copy) {
				                ?>
				                <div class="itgSubFooter__leftSide"><?php echo $sub_footer_left_copy; ?></div>
				                <?php
				            }
				            if (have_rows('sub_footer_menu', 'option')) :
				                ?>
				                <div class="itgSubFooter__centerSide">
				                    <?php

				                    while (have_rows('sub_footer_menu', 'option')) : the_row();

				                        $sub_footer_menu_label = get_sub_field('label');
				                        $sub_footer_menu_link = get_sub_field('link');

				                        ?>

				                        <a href="<?php echo $sub_footer_menu_link['url']; ?>"><?php echo $sub_footer_menu_label; ?></a>

				                    <?php

				                    endwhile;
				                    ?>
				                </div>
				            <?php
				            endif;
				            if ($sub_footer_right_copy) {
				                ?>
				                <div class="itgSubFooter__rightSide"><?php echo $sub_footer_right_copy; ?></div>
				                <?php
				            }
				            ?>
				        </div>
				    </div>

										<?php endif; ?>

										<?php if ( ICL_LANGUAGE_CODE=='en' ) : ?>
										<footer id="colophon" class="site-footer">
    <div class="section is-paddingless">
        <div class="itgFooter itg-py-56 columns is-centered">
            <!-- Tablet and up version -->
            <div class="itgFooter__left-container column is-10 is-4-tablet is-hidden-mobile">
                <div class="itgFooter__menu is-7-desktop is-offset-1-desktop columns is-centered">
                    <?php $navArgs = array('footer-menu-en' => new footer_menu_walker());
                    wp_nav_menu($navArgs);
                    ?>
                </div>
                <a class="ItgFooter__toggleBtn menu-item-has-children" href="#">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/src/images/icons/rapid_link.svg" />
                </a>
            </div>

            <!-- Mobile version -->
            <div class="itgFooter__left-container is-12 is-hidden-tablet itgFooter__mobile-flavour">
                <div class="itgFooter__menu is-12 text-left">
                    <?php $navArgs = array('footer-menu-en' => new footer_menu_walker());
                    wp_nav_menu($navArgs);
                    ?>
                </div>
            </div>

        </div>
        <div class="container">

										 <div class="columns is-justify-content-left is-vcentered">
		        <div class="column is-6">
			        <div class="columns">
            <?php
            if ($footer_logo) {
                ?>
                <div class="itgFooter__logo column">
                    <img src="<?php echo $footer_logo['url']; ?>" alt="<?php echo $footer_logo['alt']; ?>" width="143" height="49">
                </div>
                <?php
            }
            ?>

            <?php

            if (have_rows('footer_badge', 'option')) :
                ?>
                    <?php

                    while (have_rows('footer_badge', 'option')) : the_row();
	?>
								<div class="itgFooter__logo_badge column is-justify-content-left">
							<img src="<?php echo get_sub_field('upload_footer_image'); ?>" width="" height="" />
								</div>

							                    <?php

							                    endwhile;
							                    ?>
							            <?php
							            endif;
							            ?>
										        </div>
								        </div>
								        </div>
							        </div>
							        <div class="itgSubFooter container itg-py-56">

							            <?php
							            if ($sub_footer_left_copy) {
							                ?>
							                <div class="itgSubFooter__leftSide"><?php echo $sub_footer_left_copy; ?></div>
							                <?php
							            }
							            if (have_rows('sub_footer_menu', 'option')) :
							                ?>
							                <div class="itgSubFooter__centerSide">
							                    <?php

							                    while (have_rows('sub_footer_menu', 'option')) : the_row();

							                        $sub_footer_menu_label = get_sub_field('label');
							                        $sub_footer_menu_link = get_sub_field('link');

							                        ?>

							                        <a href="<?php echo $sub_footer_menu_link['url']; ?>"><?php echo $sub_footer_menu_label; ?></a>

							                    <?php

							                    endwhile;
							                    ?>
							                </div>
							            <?php
							            endif;
							            if ($sub_footer_right_copy) {
							                ?>
							                <div class="itgSubFooter__rightSide"><?php echo $sub_footer_right_copy; ?></div>
							                <?php
							            }
							            ?>
							        </div>
							    </div>


										<?php endif; ?>

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>

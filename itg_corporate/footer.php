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

<footer id="colophon" class="site-footer">
    <div class="section is-paddingless">
        <div class="itgFooter container itg-py-56">
            <!-- Tablet and up version -->
            <div class="itgFooter__left-container is-5-desktop is-4-tablet is-hidden-mobile">

                <div class="itgFooter__menu is-7-desktop is-offset-1-desktop">
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
        <div class="container itg-py-56">
            <?php
            if ($footer_logo) {
                ?>
                <div class="itgFooter__logo is-5-desktop">
                    <img src="<?php echo $footer_logo['url']; ?>" alt="<?php echo $footer_logo['alt']; ?>" width="143" height="49">
                </div>
                <?php
            }
            ?>
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
<a class="ItgFooter__toggleBtn menu-item-has-children" href="#"><img src="<?php echo get_template_directory_uri(); ?>/dist/src/images/icons/rapid_link.svg" /></a>
            </div>
            
        </div>
        <div class="container itg-py-56">
	            <?php
                if ($footer_logo) {
                ?>
                    <div class="itgFooter__logo is-5-desktop">
                        <img src="<?php echo $footer_logo['url']; ?>" alt="<?php echo $footer_logo['alt']; ?>" width="143" height="49">
                    </div>
                <?php
                }
                ?>
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
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>

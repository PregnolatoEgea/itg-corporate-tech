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
?>

<footer id="colophon" class="site-footer">
  <div class="section is-paddingless">
    <div class="itgFooter container itg-py-56">
      <div class="itgFooter__left-container is-5-desktop is-4-tablet">
        <?php
        if ($footer_logo) {
        ?>
          <div class="itgFooter__logo column is-5-desktop">
            <img src="<?php echo $footer_logo['url']; ?>" alt="<?php echo $footer_logo['alt']; ?>">
          </div>
        <?php
        }
        ?>
        <div class="itgFooter__menu is-7-desktop columns is-offset-1-desktop">
          <?php
          foreach ($footer_menu as $key => $footer_menu_item) {
            $footer_menu_item_title = $footer_menu_item->title;
            $footer_menu_item_url = $footer_menu_item->url;
            $footer_menu_item_target = $footer_menu_item->target;
          ?>
            <div class="column">
              <?php
              if ($footer_menu_item->menu_item_parent == 0) {
              ?>
                <a target="<?php echo $footer_menu_item_target; ?>" href="<?php echo $footer_menu_item_url; ?>" class="itgFooter--singleItem itg-mr-16"><?php echo $footer_menu_item_title; ?></a>
              <?php
              } else {
              ?>
                <!-- altrimenti 
                  foreach contenuto
                    <a>content</a>
                -->

                <!-- Qui va il for -->
                <a target="<?php echo $footer_menu_item_target; ?>" href="<?php echo $footer_menu_item_url; ?>" class="itgSubFooter--singleItem itg-mr-16"><?php echo $footer_menu_item_title; ?></a>
            </div>
        <?php }
            } ?>
        </div>
      </div>
      <?php
      if (have_rows('footer_social', 'option')) :
      ?>
        <div class="itgFooter__social column is-7-desktop is-4-tablet is-offset-1-desktop">
          <?php

          while (have_rows('footer_social', 'option')) : the_row();

            $footer_social_title = get_sub_field('title');
            $footer_social_copy = get_sub_field('copy');

          ?>

            <div class="itgFooter__social--title itg-mb-8"><?php echo $footer_social_title; ?></div>
            <div class="itgFooter__social--copy itg-mb-8"><?php echo $footer_social_copy; ?></div>
            <div class="itgFooter__social--icons">
              <?php
              if (have_rows('social_icons', 'option')) :
              ?>
                <div class="itgFooter__social--icon">
                  <?php
                  while (have_rows('social_icons', 'option')) : the_row();
                    $social_icon_link = get_sub_field('link');
                    $social_icon_icon = get_sub_field('icon');
                  ?>
                    <a class="itg-mr-8" href="<?php echo $social_icon_link['url']; ?>"><img src="<?php echo $social_icon_icon['url']; ?>" alt="<?php echo $social_icon_icon['alt']; ?>"></a>
                <?php
                  endwhile;
                endif;
                ?>
                </div>
            <?php

          endwhile;

        endif;
            ?>
            </div>
        </div>
    </div>
    <div class="itgSubFooter itg-px-56">
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
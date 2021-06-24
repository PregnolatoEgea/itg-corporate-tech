<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Itg_Sustainability
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <script></script>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <div id="page" class="site">
    <header id="masthead" class="site-header">
      <div class="itgPreHeader__bottomSide">
        <div class="columns">
          <?php
          $arr = [[1, 2, 3], [4, 5, 6], [7, 8, 9]];
          foreach ($arr as $a) {
            foreach ($a as $i) {
          ?>
              <div class="column">
                <span>Titolo</span>
                <p>{{ $i }}</p>
              </div>
            <?php } ?>
          <?php } ?>
        </div>
      </div>
      <div class="itgPreHeader itg-px-56">
        <div class="itgPreHeader__leftSide">
          <?php
          $left_menu = wp_get_nav_menu_items('pre-header-left-side');
          if ($left_menu) : echo '<span class="itg_preheader-left_label">In evidenza&nbsp;</span>';
          endif;
          foreach ($left_menu as $key => $left_menu_item) {
            $left_menu_item_title = $left_menu_item->title;
            $left_menu_item_url = $left_menu_item->url;
            $left_menu_item_target = $left_menu_item->target;

          ?>
            <a id="itg_a_button_<?php echo $key; ?>" onclick="openPreHeaderBottomSide($key)" target="<?php echo $left_menu_item_target; ?>" href="<?php echo $left_menu_item_url; ?>" class="itgPreHeader--singleItem itg-mr-16"><?php echo $left_menu_item_title; ?></a>
          <?php
          }
          ?>
        </div>
        <div class="itgPreHeader__rightSide">
          <?php
          $right_menu = wp_get_nav_menu_items('pre-header-right-side');

          foreach ($right_menu as $key => $right_menu_item) {
            $right_menu_item_ID = $right_menu_item->ID;
            $right_menu_item_title = $right_menu_item->post_title;
            $right_menu_item_url = $right_menu_item->url;
            $right_menu_item_target = $right_menu_item->target;

          ?>
            <?php
            if (get_field('image', $right_menu_item_ID)) {
            ?>
              <a target="<?php echo $right_menu_item_target; ?>" href="<?php echo $right_menu_item_url; ?>" class="itgPreHeader--singleItem">
                <img class="itg-mr-16" src="<?php echo get_field('image', $right_menu_item_ID)['url']; ?>" alt="<?php echo $right_menu_item_title; ?>">
              </a>
            <?php
            } else {
            ?>
              <p class="itgPreHeader--singleItem itg-mr-24"><?php echo $right_menu_item_title; ?></p>
            <?php
            }
            ?>
          <?php
          }
          ?>
        </div>
      </div>
      <div class="itgHeader itg-px-56 itg-py-32">
        <div class="itgHeader__leftSide">
          <?php
          if (is_search()) {
          ?>
            <img class="itgHeader--logo is-hidden-mobile" src="<?php echo get_template_directory_uri(); ?>/dist/src/images/ITG_logo_positivo.png" alt="Logo Italgas">
            <img class="itgHeader--logo is-hidden-tablet" src="<?php echo get_template_directory_uri(); ?>/dist/src/images/ITG_logo_positivo.png" alt="Logo Italgas">
          <?php
          } else {
          ?>
            <img class="itgHeader--logo is-hidden-mobile" src="<?php echo get_template_directory_uri(); ?>/dist/src/images/Italgas_logo_negativo.png" alt="Logo Italgas">
            <img class="itgHeader--logo is-hidden-tablet" src="<?php echo get_template_directory_uri(); ?>/dist/src/images/ITG_logo_positivo.png" alt="Logo Italgas">
          <?php
          }
          ?>
        </div>
        <div class="itgHeader__rightSide">
          <div class="itgMainMenu__highlightedItems is-hidden-touch is-flex">
            <?php
            $main_menu = wp_get_nav_menu_items('main-menu');

            foreach ($main_menu as $key => $main_menu_item) {
              $main_menu_item_ID = $main_menu_item->ID;
              $main_menu_item_title = $main_menu_item->title;
              $main_menu_item_url = $main_menu_item->url;
              $main_menu_item_target = $main_menu_item->target;

              if (get_field('is_highlighted', $main_menu_item_ID)) {
            ?>
                <a class="itgMainMenu__highlightedItems--single p1 itg--color-blue-1 itg-py-16 itg-px-16" target="<?php echo $main_menu_item_target; ?>" href="<?php echo $main_menu_item_url; ?>"><?php echo $main_menu_item_title; ?></a>
            <?php
              }
            }
            ?>
          </div>
          <div id="itgMainMenu__searchBox" class="itgMainMenu__searchBox itg-px-8">
            <img class="itgMainMenu__searchBox--icon" id="main_search" src="<?php echo get_template_directory_uri() . '/src/images/icons/search.svg'; ?>" alt="Icona ricerca">
            <div class="itgMainMenu__searchBox--searchInput">
              <span id="itgMainMenu__searchBox--close" class="itgMainMenu__searchBox--close">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/src/images/icons/close.svg" alt="Close">
              </span>
              <?php echo do_shortcode('[wd_asp id=1]'); ?>
            </div>
            <div class="itgMainMenu__searchBox--overlay"></div>
          </div>
          <div class="itgMainMenu__toggle itg-pl-8 itg-pr-16">
            <button class="hamburger hamburger--squeeze" type="button" aria-label="Menu" aria-controls="navigation">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
          </div>
          <div class="itgMainMenu__supContainer itg-px-32 itg-py-8 is-hide">
            <a href="<?php echo get_home_url(); ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/dist/src/images/ITG_logo_positivo.png" alt="Logo Italgas">
            </a>
            <a href="<?php echo get_home_url(); ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/dist/src/images/icons/home.svg" alt="Home">
            </a>
          </div>
          <div class="itgMainMenu__container itg-px-32 itg-py-8">
            <?php
            $main_menu = wp_get_nav_menu_items('main-menu');

            /*echo '<pre>';
          var_dump($main_menu);
          echo '</pre>';
          
          */
            foreach ($main_menu as $key => $main_menu_item) {
              $main_menu_item_ID = $main_menu_item->ID;
              $main_menu_item_parent = $main_menu_item->menu_item_parent;
              $main_menu_item_title = $main_menu_item->title;
              $main_menu_item_url = $main_menu_item->url;
              $main_menu_item_target = $main_menu_item->target;

            ?>
              <div class="itgMainMenu__container--single itg-mt-16">
                <?php echo $main_menu_item_title; ?>
              </div>
            <?php

            }
            ?>
          </div>
        </div>
      </div>
    </header><!-- #masthead -->
<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Itg_Sustainability
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function itg_sustainability_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'itg_sustainability_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function itg_sustainability_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'itg_sustainability_pingback_header' );


class footer_menu_walker extends Walker_Nav_menu {
    function start_lvl (&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu f\">\n";
        $output .= "\n<div class=\"column\">\n";
    }
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n".($depth ? "$indent</div>\n" : "");
    }
}

add_filter('wp_nav_menu_objects' , 'my_menu_class');
function my_menu_class($menu) {
    $level = 0;
    $stack = array('0');
    foreach($menu as $key => $item) {
        while($item->menu_item_parent != array_pop($stack)) {
            $level--;
        }   
        $level++;
        $stack[] = $item->menu_item_parent;
        $stack[] = $item->ID;
        $menu[$key]->classes[] = 'level-'. ($level - 1);
    }                    
    return $menu;        
}

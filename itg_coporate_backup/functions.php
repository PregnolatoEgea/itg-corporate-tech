<?php
/**
 * Itg Sustainability functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Itg_Sustainability
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'itg_sustainability_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function itg_sustainability_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Itg Sustainability, use a find and replace
		 * to change 'itg_sustainability' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'itg_sustainability', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'itg_sustainability' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'itg_sustainability_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'itg_sustainability_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function itg_sustainability_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'itg_sustainability_content_width', 640 );
}
add_action( 'after_setup_theme', 'itg_sustainability_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function itg_sustainability_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'itg_sustainability' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'itg_sustainability' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'itg_sustainability_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function itg_sustainability_scripts() {
	wp_enqueue_style( 'itg_sustainability-style', get_template_directory_uri() . '/dist/main.css', array(), _S_VERSION );
	wp_style_add_data( 'itg_sustainability-style', 'rtl', 'replace' );

	wp_enqueue_script( 'itg_sustainability-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'itg_sustainability-io-bundle', get_template_directory_uri() . '/dist/bundle.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'itg_sustainability_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * ITG Custom color picker
 */

function custom_color_picker($init) {

  $custom_colours = '
      "FFFFFF", "white",
      "202020", "black",
      "003478", "blue-1",
      "007AC9", "blue-2",
      "00A9E0", "blue-3",
      "D3F4FF", "light-blue",
      "34B233", "green-1",
      "BED600", "green-2",
      "FECB00", "yellow",
      "E98300", "orange",
      "E00034", "red",
      "983222", "brown",
      "8E8E8E", "grey-1",
      "DFDFDF", "grey-2",
  ';

  // build colour grid default+custom colors
  $init['textcolor_map'] = '['.$custom_colours.']';

  // change the number of rows in the grid if the number of colors changes
  // 8 swatches per row
  $init['textcolor_rows'] = 1;
  $init['textcolor_rows'] = 2;

  return $init;
}
add_filter('tiny_mce_before_init', 'custom_color_picker');

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));

}

/**
 * ADD EDITOR STYLES SUPPORT
 */
add_editor_style();

/**
 * ADD SEARCH SIZE
 */
add_image_size( 'search_cut', 200, 150, array('center', 'center') );
<?php
/**
 * Itg Sustainability Theme Customizer
 *
 * @package Itg_Sustainability
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function itg_sustainability_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'itg_sustainability_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'itg_sustainability_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'itg_sustainability_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function itg_sustainability_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function itg_sustainability_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function itg_sustainability_customize_preview_js() {
	wp_enqueue_script( 'itg_sustainability-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'itg_sustainability_customize_preview_js' );

function cptui_register_my_taxes_comunicati() {

	/**
	 * Taxonomy: Comunicato.
	 */

	$labels = [
		"name" => __( "Comunicato", "itg_sustainability" ),
		"singular_name" => __( "Comunicati", "itg_sustainability" ),
	];

	
	$args = [
		"label" => __( "Comunicato", "itg_sustainability" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'comunicati', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "comunicati",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "comunicati", [ "post" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_comunicati' );

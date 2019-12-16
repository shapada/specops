<?php

/**
 * Enqueue block editor scripts and styles
 */
add_action( 'enqueue_block_editor_assets', 'ti_block_editor_styles', 999 );

function ti_block_editor_styles() {
		wp_enqueue_style( 'ti-editor-styles', get_theme_file_uri( '/blocks/css/ti-editor-style.css' ), false, '1.0', 'all' );
		wp_enqueue_script( 'ti-editor-scripts', get_theme_file_uri( '/blocks/js/ti-editor-scripts.js' ), array(), '1.0', true );
}

/**
 * Assign block categories to post types
 */
add_filter( 'block_categories', 'assign_block_categories', 10, 2 );

function assign_block_categories( $categories, $post ) {
	return array_merge(
		$categories,
		array( array( 'slug' => 'home', 'title' => 'Home' ),
					 array( 'slug' => 'about-us', 'title' => 'About Us' ),
					 array( 'slug' => 'contact', 'title' => 'Contact' ),
					 array( 'slug' => 'product', 'title' => 'Product' ),
					 array( 'slug' => 'docs', 'title' => 'Docs' ),
					 array( 'slug' => 'case-study', 'title' => 'Case Studies' ),
					 array( 'slug' => 'pillar', 'title' => 'Pillar Pages' ),
					 array( 'slug' => 'partners', 'title' => 'Partners' ),
					)
	);
}

/**
 * Block registration callback to find our templates
 */
function acf_block_render_callback( $block ) {
	// Convert name ("acf/xxx") into path friendly slug ("xxx")
	$slug = str_replace( 'acf/', '', $block['name'] );
	$cat = $block['category'];
	
	// Include a template part from within the "blocks" folder
	if ( file_exists( get_theme_file_path( "/blocks/{$cat}/content-{$slug}.php" ) ) ) {
		include( get_theme_file_path( "/blocks/${cat}/content-{$slug}.php" ) );
	}
}

/**
 * Register our ACF block
 */
require_once get_theme_file_path( "/blocks/register/register-home.php" );
require_once get_theme_file_path( "/blocks/register/register-about.php" );
require_once get_theme_file_path( "/blocks/register/register-contact.php" );
require_once get_theme_file_path( "/blocks/register/register-product.php" );
require_once get_theme_file_path( "/blocks/register/register-docs.php" );
require_once get_theme_file_path( "/blocks/register/register-case-study.php" );
require_once get_theme_file_path( "/blocks/register/register-pillar-page.php" );
require_once get_theme_file_path( "/blocks/register/register-partners.php" );

<?php

/**
 * Register Product blocks
 */

add_action( 'acf/init', 'register_product_blocks' );

function register_product_blocks() {

	if ( function_exists( 'acf_register_block_type' ) ) {
		// Overview
		acf_register_block_type( array(
			'name'				=> 'product-overview',
			'title'				=> 'Overview',
			'description'		=> 'The introductory hero area',
			'render_callback'	=> 'acf_block_render_callback',
			'mode'				=> 'auto',
			'category'			=> 'product',
			'post_types'		=> array( 'product' ),
			'icon'				=> 'index-card',
			'keywords'			=> array( 'overview', 'introduction', 'hero' ),
		) );

		// Benefits
		acf_register_block_type( array(
			'name'				=> 'product-benefits',
			'title'				=> 'Benefits',
			'description'		=> 'The featured uses/benefits of the product',
			'render_callback'	=> 'acf_block_render_callback',
			'mode'				=> 'auto',
			'category'			=> 'product',
			'post_types'		=> array( 'product' ),
			'icon'				=> 'star-filled',
			'keywords'			=> array( 'benefits', 'uses' ),
		) );

		// Features
		acf_register_block_type( array(
			'name'				=> 'product-features',
			'title'				=> 'Features',
			'description'		=> 'A list of product features',
			'render_callback'	=> 'acf_block_render_callback',
			'mode'				=> 'auto',
			'category'			=> 'product',
			'post_types'		=> array( 'product' ),
			'icon'				=> 'list-view',
			'keywords'			=> array( 'features', 'list', 'product features' ),
		) );

		// Form
		acf_register_block_type( array(
			'name'				=> 'product-form',
			'title'				=> 'Form',
			'description'		=> 'The code for the form iframe',
			'render_callback'	=> 'acf_block_render_callback',
			'mode'				=> 'auto',
			'category'			=> 'product',
			'post_types'		=> array( 'product' ),
			'icon'				=> 'edit',
			'keywords'			=> array( 'form', 'pardot', 'product form' ),
		) );

		// Sticky bottom bar
		acf_register_block_type( array(
			'name'				=> 'product-bottom-bar',
			'title'				=> 'Sticky Bottom Bar',
			'description'		=> 'Resources, reviews, and related products',
			'render_callback'	=> 'acf_block_render_callback',
			'mode'				=> 'auto',
			'category'			=> 'product',
			'post_types'		=> array( 'product' ),
			'icon'				=> 'editor-kitchensink',
			'keywords'			=> array( 'resources', 'reviews', 'related products' ),
		) );
	}
}
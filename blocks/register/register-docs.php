<?php

/**
 * Register Docs blocks
 */

add_action( 'acf/init', 'register_docs_blocks' );

function register_docs_blocks() {
	if ( function_exists( 'acf_register_block_type' ) ) {
		// Accordion
		acf_register_block_type( array(
			'name'						=> 'docs-accordion',
			'title'						=> 'Accordion',
			'description'			=> 'An accordion of content blocks',
			'render_callback'	=> 'acf_block_render_callback',
			'mode'						=> 'auto',
			'category'				=> 'docs',
			'post_types'			=> array( 'docs' ),
			'icon'						=> 'list-view',
			'keywords'				=> array( 'accordion' ),
		) );
		
		// Callout
		acf_register_block_type( array(
			'name'						=> 'docs-callout',
			'title'						=> 'Callout',
			'description'			=> 'Callout with links to more docs',
			'render_callback'	=> 'acf_block_render_callback',
			'mode'						=> 'auto',
			'category'				=> 'docs',
			'post_types'			=> array( 'docs' ),
			'icon'						=> 'admin-comments',
			'keywords'				=> array( 'callout', 'links' ),
		) );

		// Related Content
		acf_register_block_type( array(
			'name'						=> 'docs-related',
			'title'						=> 'Related Content',
			'description'			=> 'A list of other articles and resources related to the doc',
			'render_callback'	=> 'acf_block_render_callback',
			'mode'						=> 'auto',
			'category'				=> 'docs',
			'post_types'			=> array( 'docs' ),
			'icon'						=> 'forms',
			'keywords'				=> array( 'related', 'related content', 'more' ),
		) );
	}
}
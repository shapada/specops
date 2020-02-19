<?php

/**
 * Register Partners blocks
 */

add_action( 'acf/init', 'register_partners_blocks' );

function register_partners_blocks() {

	if ( function_exists( 'acf_register_block_type' ) ) {
		// Partners
		acf_register_block_type( array(
			'name'				=> 'feature-partners',
			'title'				=> 'Feature Partners',
			'description'		=> 'The list of Specops featrure partners.',
			'render_callback'	=> 'acf_block_render_callback',
			'mode'				=> 'auto',
			'category'			=> 'partners',
			'post_types'		=> array( 'page' ),
			'icon'				=> 'groups',
			'keywords'			=> array( 'partners', 'specops partners', 'partner list' ),
		) );

		if ( function_exists( 'acf_register_block_type' ) ) {
			// Pillar Page Section
			acf_register_block_type( array(
				'name'				=> 'partners-cards-section',
				'title'				=> 'Cards Section',
				'description'		=> 'A card-styled section layout.',
				'render_callback'	=> 'acf_block_render_callback',
				'mode'				=> 'auto',
				'category'			=> 'partners',
				'post_types'		=> array( 'page' ),
				'icon'				=> 'tagcloud',
				'keywords'			=> array( 'partners', 'page', 'section', 'content', 'cards section' ),
			) );
		}
	}
}
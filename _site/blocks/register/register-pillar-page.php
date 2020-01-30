<?php

/**
 * Register Pillar Pages blocks
 */

add_action('acf/init', 'register_pillar_blocks');

function register_pillar_blocks()
{
    if (function_exists('acf_register_block_type')) {
        // Pillar Page Section
        acf_register_block_type(array(
            'name'				=> 'pillar-page-section',
            'title'				=> 'Page Section',
            'description'		=> 'A pillar page section',
            'render_callback'	=> 'acf_block_render_callback',
            'mode'				=> 'auto',
            'category'			=> 'pillar',
            'post_types'		=> array( 'page' ),
            'icon'				=> 'tagcloud',
            'keywords'			=> array( 'pillar', 'page', 'section', 'content' ),
        ));
    }
}

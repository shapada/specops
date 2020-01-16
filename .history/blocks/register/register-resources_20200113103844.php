<?php
/**
 * Register Resources blocks
 */

add_action('acf/init', 'register_resources_blocks');

function register_resources_blocks()
{
    if (function_exists('acf_register_block_type')) {
        acf_register_block_type( [
            'name'				=> 'resource-datasheet',
            'title'				=> 'Datasheet',
            'description'		=> 'Datasheet used to represent a data sheet resource.',
            'render_callback'	=> 'acf_block_render_callback',
            'mode'				=> 'auto',
            'category'			=> 'resources',
            'post_types'		=> [ 'page' ],
            'icon'				=> 'resources',
            'keywords'			=> [ 'resources', 'resource datasheet', 'datasheet' ],
		] );

		acf_register_block_type( [
            'name'				=> 'resource-content',
            'title'				=> 'Text/Image/Video Content',
            'description'		=> 'A block containing a text and image section, a two image section, or a video section',
            'render_callback'	=> 'acf_block_render_callback',
            'mode'				=> 'auto',
            'category'			=> 'resources',
            'post_types'		=> [ 'page' ],
            'icon'				=> 'resources',
            'keywords'			=> [ 'resources', 'resource text', 'resource image', 'resource video','video', 'text', 'images', 'image' ],
		] );
    }
}

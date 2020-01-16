<?php
/**
 * Register Resources blocks
 */

add_action('acf/init', 'register_resources_blocks');

function register_resources_blocks()
{
    if (function_exists('acf_register_block_type')) {
        acf_register_block_type(array(
            'name'				=> 'resource-datasheet',
            'title'				=> 'Datasheet',
            'description'		=> 'Datasheet used to represent a data sheet resource.',
            'render_callback'	=> 'acf_block_render_callback',
            'mode'				=> 'auto',
            'category'			=> 'resources',
            'post_types'		=> [ 'page' ],
            'icon'				=> 'resources',
            'keywords'			=> [ 'resources', 'resource datasheet', 'datasheet' ],
		));

		acf_register_block_type(array(
            'name'				=> 'resource-text-image',
            'title'				=> 'Text and Image',
            'description'		=> 'A block containing text and an image.',
            'render_callback'	=> 'acf_block_render_callback',
            'mode'				=> 'auto',
            'category'			=> 'resources',
            'post_types'		=> [ 'page' ],
            'icon'				=> 'resources',
            'keywords'			=> [ 'resources', 'resource text', 'resource image', 'text', 'image' ],
		));
    }
}

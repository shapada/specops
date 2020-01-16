<?php
/**
 * Register Resources blocks
 */

add_action('acf/init', 'register_resources_blocks');

function register_resources_blocks()
{
    if (function_exists('acf_register_block_type')) {
        acf_register_block_type([
            'name'				=> 'datasheet',
            'title'				=> 'Datasheet',
            'description'		=> 'Datasheet used to represent a data sheet resource.',
            'render_callback'	=> 'acf_block_render_callback',
            'mode'				=> 'auto',
            'category'			=> 'resources',
            'post_types'		=> [ 'resources' ],
            'icon'				=> 'media-spreadsheet',
            'keywords'			=> [ 'resources', 'resource datasheet', 'datasheet' ],
        ]);

        acf_register_block_type([
            'name'				=> 'media-content',
            'title'				=> 'Media Content',
            'description'		=> 'A block containing text, image, or video content.',
            'render_callback'	=> 'acf_block_render_callback',
            'mode'				=> 'auto',
            'category'			=> 'resources',
            'post_types'		=> [ 'resources' ],
            'icon'				=> 'format-aside',
            'keywords'			=> [ 'resources', 'resource image',  'images', 'image', 'resource video', 'videos', 'video', 'resource text', 'text' ],
        ]);
    }
}

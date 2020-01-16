<?php

/**
 * Register About Us blocks
 */

add_action('acf/init', 'register_about_blocks');

function register_about_blocks()
{
    if (function_exists('acf_register_block_type')) {
        // Our Story
        acf_register_block_type(array(
            'name'				=> 'our-story',
            'title'				=> 'Our Story',
            'description'		=> 'The introductory paragraph',
            'render_callback'	=> 'acf_block_render_callback',
            'mode'				=> 'auto',
            'category'			=> 'about-us',
            'post_types'		=> array( 'page' ),
            'icon'				=> 'editor-justify',
            'keywords'			=> array( 'introduction', 'story', 'our story' ),
        ));

        // Executives
        acf_register_block_type(array(
            'name'				=> 'executives',
            'title'				=> 'Executives',
            'description'		=> 'List of Specops executives',
            'render_callback'	=> 'acf_block_render_callback',
            'mode'				=> 'auto',
            'category'			=> 'about-us',
            'post_types'		=> array( 'page' ),
            'icon'				=> 'id',
            'keywords'			=> array( 'executives', 'execs' ),
        ));

        // Partner Logos
        acf_register_block_type(array(
            'name'				=> 'partners',
            'title'				=> 'Partners',
            'description'		=> 'List of partner logos and info',
            'render_callback'	=> 'acf_block_render_callback',
            'mode'				=> 'auto',
            'category'			=> 'about-us',
            'post_types'		=> array( 'page' ),
            'icon'				=> 'images-alt',
            'keywords'			=> array( 'partners', 'logos' ),
        ));

        // Locations
        acf_register_block_type(array(
            'name'				=> 'locations',
            'title'				=> 'Locations',
            'description'		=> 'Specops office locations',
            'render_callback'	=> 'acf_block_render_callback',
            'mode'				=> 'auto',
            'category'			=> 'about-us',
            'post_types'		=> array( 'page' ),
            'icon'				=> 'location',
            'keywords'			=> array( 'locations', 'offices' ),
        ));

        // Highlights
        acf_register_block_type(array(
            'name'				=> 'highlights',
            'title'				=> 'Highlights',
            'description'		=> 'Specops yearly highlights',
            'render_callback'	=> 'acf_block_render_callback',
            'mode'				=> 'auto',
            'category'			=> 'about-us',
            'post_types'		=> array( 'page' ),
            'icon'				=> 'list-view',
            'keywords'			=> array( 'highlights', 'timeline' ),
        ));
    }
}

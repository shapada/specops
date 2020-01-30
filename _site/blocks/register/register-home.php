<?php

/**
 * Register Homepage blocks
 */

add_action('acf/init', 'register_home_blocks');

function register_home_blocks()
{
    if (function_exists('acf_register_block_type')) {
        // Homepage Intro
        acf_register_block_type(array(
            'name'						=> 'home-intro',
            'title'						=> 'Intro',
            'description'			=> 'The introductory section of the homepage',
            'render_callback'	=> 'acf_block_render_callback',
            'mode'						=> 'auto',
            'category'				=> 'home',
            'post_types'			=> array( 'page' ),
            'icon'						=> 'editor-justify',
            'keywords'				=> array( 'introduction', 'intro' ),
        ));

        // Homepage Featured Products
        acf_register_block_type(array(
            'name'						=> 'home-products',
            'title'						=> 'Featured Products',
            'description'			=> 'The featured products on the homepage',
            'render_callback'	=> 'acf_block_render_callback',
            'mode'						=> 'auto',
            'category'				=> 'home',
            'post_types'			=> array( 'page' ),
            'icon'						=> 'images-alt',
            'keywords'				=> array( 'featured', 'products' ),
        ));

        // Homepage Blog
        acf_register_block_type(array(
            'name'						=> 'home-blog',
            'title'						=> 'Blog',
            'description'			=> 'The featured blog posts on the homepage',
            'render_callback'	=> 'acf_block_render_callback',
            'mode'						=> 'auto',
            'category'				=> 'home',
            'post_types'			=> array( 'page' ),
            'icon'						=> 'format-aside',
            'keywords'				=> array( 'featured', 'blog posts', 'blog' ),
        ));

        // Homepage Testimonial
        acf_register_block_type(array(
            'name'						=> 'home-testimonial',
            'title'						=> 'Testimonial',
            'description'			=> 'The homepage testimonial',
            'render_callback'	=> 'acf_block_render_callback',
            'mode'						=> 'auto',
            'category'				=> 'home',
            'post_types'			=> array( 'page' ),
            'icon'						=> 'format-aside',
            'keywords'				=> array( 'testimonial', 'review', 'social proof' ),
        ));
    }
}

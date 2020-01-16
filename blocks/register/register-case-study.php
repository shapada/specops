<?php

/**
 * Register About Us blocks
 */

add_action('acf/init', 'register_case_study_blocks');

function register_case_study_blocks()
{
    if (function_exists('acf_register_block_type')) {
        // Reviews
        acf_register_block_type(array(
            'name'				=> 'reviews',
            'title'				=> 'Reviews',
            'description'		=> 'Quotes and links from online reviews of Specops products',
            'render_callback'	=> 'acf_block_render_callback',
            'mode'				=> 'auto',
            'category'			=> 'case-study',
            'post_types'		=> array( 'page' ),
            'icon'				=> 'testimonial',
            'keywords'			=> array( 'reviews', 'professional reviews' ),
        ));

        // Organization and Results
        acf_register_block_type(array(
            'name'				=> 'organization-results',
            'title'				=> 'Organization and Results',
            'description'		=> 'General info on the case study organization/location and goals/results',
            'render_callback'	=> 'acf_block_render_callback',
            'mode'				=> 'auto',
            'category'			=> 'case-study',
            'post_types'		=> array( 'case-studies' ),
            'icon'				=> 'yes',
            'keywords'			=> array( 'organization', 'results', 'location', 'country', 'goals', 'results' ),
        ));
        // CTA Banner
        acf_register_block_type(array(
            'name'				=> 'cta-banner',
            'title'				=> 'CTA Banner',
            'description'		=> 'Call to action to learn more about Specops products',
            'render_callback'	=> 'acf_block_render_callback',
            'mode'				=> 'auto',
            'category'			=> 'case-study',
            'post_types'		=> array( 'case-studies' ),
            'icon'				=> 'megaphone',
            'keywords'			=> array( 'cta', 'cta banner', 'product', 'call to action' ),
        ));
    }
}

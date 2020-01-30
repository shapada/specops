<?php

/**
 * Register Contact Us blocks
 */

add_action('acf/init', 'register_contact_blocks');

function register_contact_blocks()
{
    if (function_exists('acf_register_block_type')) {
        // Contact Support
        acf_register_block_type(array(
            'name'				=> 'contact-support',
            'title'				=> 'Contact Support',
            'description'		=> 'A box to redirect visitors to contact support',
            'render_callback'	=> 'acf_block_render_callback',
            'mode'				=> 'auto',
            'category'			=> 'contact',
            'post_types'		=> array( 'page' ),
            'icon'				=> 'sos',
            'keywords'			=> array( 'support', 'contact', 'contact support' ),
        ));

        // Contact Info
        acf_register_block_type(array(
            'name'				=> 'contact-info',
            'title'				=> 'Contact Info',
            'description'		=> 'Address and phone number listings',
            'render_callback'	=> 'acf_block_render_callback',
            'mode'				=> 'auto',
            'category'			=> 'contact',
            'post_types'		=> array( 'page' ),
            'icon'				=> 'location',
            'keywords'			=> array( 'contact info', 'information', 'nuumber', 'address', 'mail' ),
        ));
    }
}

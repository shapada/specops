<?php
/**
 * Forge Saas Custom Post Types
 *
 * @package Forge Saas
 */

// let's create the function for the custom type
function forge_register_post_types()
{

    // pass in an array of post types. Define their post slug and labels
    $the_post_types = array(
        array(
            'post_slug'		=>	'resources',
            'post_label'	=>	'Resources',
            'post_single' 	=>	'Resource',
            'rewrite_slug'	=>  'our-resources',
            'show_in_rest' 	=> 	true,
            'menu_icon'		=>  'dashicons-book'
        ),
        array(
            'post_slug' 	=>	'case-studies',
            'post_label' 	=>	'Case Studies',
            'post_single'  	=>	'Case Study',
            'rewrite_slug' 	=>  'our-case-studies',
            'show_in_rest' 	=> 	true,
            'menu_icon'		=>  'dashicons-portfolio',
            'template'      =>	array(
                array( 'acf/organization-results' ),
                array( 'core/paragraph' ),
                array( 'acf/cta-banner' ),
            ),
        ),
        array(
            'post_slug' 	=>	'careers',
            'post_label'   	=>	'Careers',
            'post_single'  	=>	'Career',
            'rewrite_slug' 	=>  'our-careers',
            'show_in_rest' 	=> 	true,
            'menu_icon'		=>  'dashicons-id'
        ),
        array(
            'post_slug' 	=>	'product',
            'post_label' 	=>	'Products',
            'post_single'	=>	'Product',
            'rewrite_slug' 	=>  'product',
            'show_in_rest' 	=> 	true,
            'menu_icon'		=>  'dashicons-feedback',
            'taxonomies'	=>  array( 'post_tag' ),
            'template'      =>	array(
                                    array( 'acf/product-overview' ),
                                    array( 'acf/product-benefits' ),
                                    array( 'acf/product-features' ),
                                    array( 'acf/product-form' ),
                                    array( 'acf/product-bottom-bar' ),
                                ),
            'template_lock' => 'all',
        ),
    );

    // loop through post type array and register post types
    foreach ($the_post_types as $post_type) {
        $default = array(
            'labels' => array(
                'name' 					=> __($post_type['post_label'], 'post type general name'), /* This is the Title of the Group */
                'singular_name' 		=> __($post_type['post_single'], 'post type singular name'), /* This is the individual type */
                'add_new' 				=> __('Add New', 'custom post type item'), /* The add new menu item */
                'add_new_item'			=> __('Add New '.$post_type['post_single'].''), /* Add New Display Title */
                'edit'					=> __('Edit'), /* Edit Dialog */
                'edit_item'				=> __('Edit '.$post_type['post_single'].''), /* Edit Display Title */
                'new_item'				=> __('New '.$post_type['post_single']), /* New Display Title */
                'view_item'				=> __('View '.$post_type['post_single']), /* View Display Title */
                'search_items'			=> __('Search '.$post_type['post_single']), /* Search Custom Type Title */
                'not_found'				=>  __('Nothing found in the Database.'), /* This displays if there are no entries yet */
                'not_found_in_trash'	=> __('Nothing found in Trash'), /* This displays if there is nothing in the trash */
                'parent_item_colon'		=> ''
            ), /* end of arrays */
            // 'menu_icon' 			=> '',
            'public' 				=> true,
            'publicly_queryable'	=> true,
            'exclude_from_search'	=> false,
            'show_ui' 				=> true,
            'query_var' 			=> true,
            'has_archive'			=> false,
            'menu_position'			=> 5, /* this is what order you want it to appear in on the left hand side menu */
            'rewrite'				=> array('with_front' => false, 'slug' => $post_type['rewrite_slug']),
            'capability_type'		=> 'post',
            'hierarchical'			=> false,
            /* the next one is important, it tells what's enabled in the post editor */
            'supports'				=> array( 'title', 'editor', 'thumbnail', 'revisions','excerpt')
        );

        $args = wp_parse_args($post_type, $default);

        /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
        register_post_type($post_type['post_slug'], $args);
    }

    // array used to register taxonomies for post types.
    $taxonomy_types = array(
        array(
            'tax_slug'		=>	'resource-types',
            'tax_label'		=>	'Resource Types',
            'tax_single'	=>	'Resource Type',
            'post_type'		=>	'resources',
            'rewrite_slug'	=>	'resource-types'
        ),
        array(
            'tax_slug'		=>	'resource-topic',
            'tax_label'		=>	'Resource Topics',
            'tax_single'	=>	'Resource Topic',
            'post_type'		=>	'resources',
            'rewrite_slug'	=>	'resource-topic'
        ),
        array(
            'tax_slug'		=>	'support-types',
            'tax_label'		=>	'Support Types',
            'tax_single'	=>	'Support Type',
            'post_type'		=>	'support',
            'rewrite_slug'	=>	'support-types'
        )
    );

    // loop through $taxonomy_types and register taxonomies.
    foreach ($taxonomy_types as $taxonomy) {
        $default = array(
            'hierarchical' => true,     /* if this is true it acts like categories */
            'show_in_rest' => true,
            'labels' => array(
                'name' 				=> __($taxonomy['tax_label']), /* name of the custom taxonomy */
                'singular_name' 	=> __($taxonomy['tax_single']), /* single taxonomy name */
                'search_items'		=> __('Search '.$taxonomy['tax_label']), /* search title for taxomony */
                'all_items'			=> __('All '.$taxonomy['tax_label']), /* all title for taxonomies */
                'parent_item'		=> __('Parent '.$taxonomy['tax_single']), /* parent title for taxonomy */
                'parent_item_colon' => __('Parent '.$taxonomy['tax_single'].':'), /* parent taxonomy title */
                'edit_item'			=> __('Edit '.$taxonomy['tax_single']), /* edit custom taxonomy title */
                'update_item'		=> __('Update '.$taxonomy['tax_single']), /* update title for taxonomy */
                'add_new_item'		=> __('Add New '.$taxonomy['tax_single']), /* add new title for taxonomy */
                'new_item_name'		=> __('New '.$taxonomy['tax_single'].' Name') /* name title for taxonomy */
            ),
            'show_ui' 	=> true,
            'query_var' => true,
            'rewrite'   => array( 'slug' => $taxonomy['rewrite_slug'] ),
        );

        $args = wp_parse_args($taxonomy, $default);

        register_taxonomy($taxonomy['tax_slug'], $taxonomy['post_type'], $args);
    }
}

function forge_register_special_post_types()
{
    $the_post_types = array(
        array(
            'post_slug' 	=>	'docs',
            'post_label' 	=>	'Docs',
            'post_single' 	=>	'Doc',
            'rewrite_slug'	=>  'support-docs',
            'menu_icon'		=>  'dashicons-media-document',
            'show_in_rest' 	=> 	true,
            'hierarchical'			=> true,
        )
    );

    // loop through post type array and register post types
    foreach ($the_post_types as $post_type) {
        $default = array(
            'labels' => array(
                'name' 					=> __($post_type['post_label'], 'post type general name'), /* This is the Title of the Group */
                'singular_name' 		=> __($post_type['post_single'], 'post type singular name'), /* This is the individual type */
                'add_new' 				=> __('Add New', 'custom post type item'), /* The add new menu item */
                'add_new_item'			=> __('Add New '.$post_type['post_single'].''), /* Add New Display Title */
                'edit'					=> __('Edit'), /* Edit Dialog */
                'edit_item'				=> __('Edit '.$post_type['post_single'].''), /* Edit Display Title */
                'new_item'				=> __('New '.$post_type['post_single']), /* New Display Title */
                'view_item'				=> __('View '.$post_type['post_single']), /* View Display Title */
                'search_items'			=> __('Search '.$post_type['post_single']), /* Search Custom Type Title */
                'not_found'				=>  __('Nothing found in the Database.'), /* This displays if there are no entries yet */
                'not_found_in_trash'	=> __('Nothing found in Trash'), /* This displays if there is nothing in the trash */
                'parent_item_colon'		=> 'Parent'
            ), /* end of arrays */
            // 'menu_icon' 			=> '',
            'public' 				=> true,
            'publicly_queryable'	=> true,
            'exclude_from_search'	=> false,
            'show_ui' 				=> true,
            'query_var' 			=> true,
            'has_archive'			=> false,
            'menu_position'			=> 10, /* this is what order you want it to appear in on the left hand side menu */
            'rewrite'				=> array('with_front' => false, 'slug' => $post_type['rewrite_slug']),
            'capability_type'		=> 'page',
            'hierarchical'			=> true,
            /* the next one is important, it tells what's enabled in the post editor */
            'supports'				=> array( 'title', 'editor', 'revisions', 'excerpt', 'page-attributes')
        );

        $args = wp_parse_args($post_type, $default);

        /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
        register_post_type($post_type['post_slug'], $args);
    }
}


    // adding the function to the Wordpress init
    add_action('init', 'forge_register_post_types');
    add_action('init', 'forge_register_special_post_types');

<?php

// add_filter( 'searchwp_term_highlight_break_on_first_match', '__return_false' );

add_filter( 'excerpt_length', 'custom_excerpt_length', 9999 );
function custom_excerpt_length( $length ) {
	return 55;
}

/**
 * Register a new taxonomy for search result filtering purposes
 */
add_action( 'init', 'ti_register_product_taxonomy', 0 );
function ti_register_product_taxonomy() {
    $args = array(
        'label'        => 'Product Type',
        'hierarchical' => true,
        'show_in_rest' => true,
    );
	register_taxonomy( 'product_search', array( 'post', 'resources', 'docs', 'product', 'case-studies' ), $args );
}


/**
 * FacetWP only include some facets
 */
add_filter( 'facetwp_index_row', function( $params, $class ) {
    if ( 'content_type' == $params['facet_name'] ) {
        $included_terms = array( 'Posts', 'Docs', 'Resources', 'Products' );
        if ( ! in_array( $params['facet_display_value'], $included_terms ) ) {
            return false;
        }
    }
    return $params;
}, 10, 2 );


/**
 * Change FacetWP pager HTML
 */
add_filter( 'facetwp_pager_html', 'ti_facetwp_pager', 10, 2 );
function ti_facetwp_pager( $output, $params ) {
    $output = '<ul class="pagination clearfix">';
    $page = (int) $params['page'];
    $total_pages = (int) $params['total_pages'];
    // Only show pagination when > 1 page
    if ( 1 < $total_pages ) {
        if ( 1 < $page ) {
			$output .= '<li class="prev" rel="prev"><a class="facetwp-page" data-page="' . ( $page - 1 ) . '">←</a></li>';
        }
        for ( $i = 2; $i > 0; $i-- ) {
            if ( 0 < ( $page - $i ) ) {
                $output .= '<li><a class="facetwp-page" data-page="' . ($page - $i) . '">' . ($page - $i) . '</a></li>';
            }
        }
        // Current page
        $output .= '<li class="current"><a class="facetwp-page active" data-page="' . $page . '">' . $page . '</a><li>';
        for ( $i = 1; $i <= 2; $i++ ) {
            if ( $total_pages >= ( $page + $i ) ) {
                $output .= '<li><a class="facetwp-page" data-page="' . ($page + $i) . '">' . ($page + $i) . '</a></li>';
            }
        }
        if ( $page < $total_pages ) {
			$output .= '<li class="next" rel="next"><a class="facetwp-page" data-page="' . ( $page + 1 ) . '">→</a></li>';
        }
	}
	$output .= '</ul>';
    return $output;
}


/**
 * Add custom scripts and styles for searching
 */
add_action( 'wp_enqueue_scripts', 'ti_specops_assets' );
function ti_specops_assets() {
	if ( is_page('search-results') ) {
		wp_enqueue_style( 'ti-search',  get_stylesheet_directory_uri() . '/styles/css/ti-search.css' );
		wp_enqueue_script( 'ti-facetwp', get_stylesheet_directory_uri() . '/scripts/ti-search.js', array('jquery'), '', true );
		wp_enqueue_script( 'resize-sensor', get_stylesheet_directory_uri() . '/scripts/min/resizesensor.min.js', '', '', true );
		wp_enqueue_script( 'sticky-sidebar', get_stylesheet_directory_uri() . '/scripts/min/jquery.sticky-sidebar.min.js', array('jquery'), '', true );
	}
	if ( is_singular('docs') ) {
		wp_enqueue_script( 'markjs', get_stylesheet_directory_uri() . '/scripts/min/jquery.mark.min.js', array('jquery'), '', true );
		wp_enqueue_script( 'ti-docsearch', get_stylesheet_directory_uri() . '/scripts/ti-docsearch.js', array('jquery', 'markjs'), '', true );
	}
}


/**
 * Search in nav
 */
add_filter( 'wp_nav_menu_items','ti_add_search_box', 10, 2 );
function ti_add_search_box( $items, $args ) {
    if ( $args->theme_location == 'primary' ) {
		return $items .
		'<li class="ti-menu-header-search">' .
			'<form class="ti-search-expand ti-search-closed" role="search">' .
				'<span class="ti-search-icon"></span>' .
				'<span class="ti-search-close-icon"></span>' .
				'<input class="ti-search" placeholder="Search" type="text">' .
			'</form>' .
		'</li>';
	}
 
    return $items;
}
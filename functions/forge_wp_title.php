<?php



/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 */
function forge_saas_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $sep $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $sep " . sprintf( __( 'Page %s', 'forge_saas' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'forge_saas_wp_title', 10, 2 );






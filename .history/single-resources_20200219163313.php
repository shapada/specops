<?php
/**
 * The file that renders a single resource item.
 **/
get_header();

include_once( get_template_directory() . '/functions/related-resources.php' );

get_template_part( 'templates/page', 'banner' );

?>
<div class="single-page-content cpt-search">
	<?php
		if( has_term( 'datasheets', 'resource-types' ) ) {
			get_template_part( 'templates/content', 'datasheet' );
		} else {
			get_template_part( 'templates/content', 'resource' );
		}
	?>
</div>



<?php
get_footer();

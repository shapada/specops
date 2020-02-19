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
		if( has_term( 'datasheets', 'resource-type' ) ) {
			get_template_part( 'page/resource', 'datasheet' );
		} else {
			get_template_part( 'page', 'resource' );
		}
	?>
</div>

<?php
$related_resources = new RelatedResources( get_the_ID(), 'resource-topics', 'Related Resources' );
$related_resources->render();

get_footer();

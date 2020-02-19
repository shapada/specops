<?php
/**
 * The file that renders a single resource item.
 **/
get_header();

include_once( get_template_directory() . '/functions/related-resources.php' );
include_once( get_template_directory() . '/functions/contact-us-sticky.php' );

get_template_part( 'templates/page', 'banner' );

?>
<div class="single-page-content cpt-search">
	<div class="row">
		<div class="columns-12 column-center" id="content">
			<?php
                while ( have_posts() ) {
                    the_post();

                    $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );

					if ( ! empty( $image ) ): ?>
						<img src="<?php echo esc_url($image[0]); ?>" alt="">
					<?php
					endif;

                    the_content();

                    endif;
                }
            ?>
		</div>
	</div>
</div>

<?php
	$related_resources = new RelatedResources( get_the_ID(), 'resource-topics', 'Related Resources' );
	$related_resources->render();
?>

<?php
get_footer();

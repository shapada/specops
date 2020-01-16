<?php
/**
 * Block Name: Resource Datasheet
 *
 * This is the template that displays the feature partners.
 */
?>

<div class="row">
	<div class="columns-12">
			<?php if ( have_rows( 'datasheet' ) ): ?>
				<div class="datasheet">
					<h2 class="section-title">
						<?php echo esc_html( get_field( 'datasheet_heading' ) ); ?>
					</h2>
					<?php while ( have_rows('datasheet') ) : the_row(); ?>
						<div class="row">
							<?php var_dump( $post ); ?>
						</div>
					<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</div>

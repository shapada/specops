<?php
/**
 * Block Name: Resource Datasheet
 *
 * This is the template that displays the feature partners.
 */
?>
<div class="resource-datasheet">
	<div class="row">
		<div class="columns-10 column-center">
			<?php if ( have_rows( 'datasheets' ) ): ?>
				<h2 class="section-title">
					<?php echo esc_html( get_field( 'datasheet_heading' ) ); ?>
				</h2>
				<?php while ( have_rows( 'datasheet' ) ) : the_row(); ?>
					<div class="row">

					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</div>

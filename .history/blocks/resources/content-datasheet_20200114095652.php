<?php
/**
 * Block Name: Resource Datasheet
 *
 * This is the template that displays the feature partners.
 */
?>
<div class="row">
	<div class="columns-12">
		<div class="datasheet">
		<?php if( get_field( 'datasheet_heading' ) ): ?>
			<h3 class="heading">
				<?php echo esc_html( get_field( 'datasheet_heading' ) ); ?>
			</h3>
		<?php endif; ?>
		<?php if( get_field( 'datasheet_description' ) ): ?>
			<p class="description">
				<?php esc_html( the_field( 'datasheet_description' ) ) ?>
			</p>
		<?php endif; ?>
		<?php if( get_field( 'datasheet_table' ) ): ?>

		<?php endif; ?>
		</div>
	</div>
</div>

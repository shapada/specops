<?php
/**
 * Block Name: Resource Datasheet
 *
 * This is the template that displays the feature partners.
 */
?>

<?php if ( get_field( 'datasheet' ) ): ?>

<div class="row">
	<div class="columns-12">
		<div class="datasheet">
			<h2 class="section-title">
				<?php echo esc_html( get_field( 'datasheet_heading' ) ); ?>
			</h2>
		</div>
	</div>
</div>

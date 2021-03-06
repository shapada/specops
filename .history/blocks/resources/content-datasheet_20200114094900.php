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
			<h3 class="heading">
				<?php echo esc_html( get_field( 'datasheet_heading' ) ); ?>
			</h2>
			<p class="description">
				<?php echo esc_html( get_field( 'datasheet_description' ) ) ?>
			</p>
		</div>
	</div>
</div>

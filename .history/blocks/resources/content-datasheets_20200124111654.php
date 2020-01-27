<?php
/**
 * Block Name: Resource Datasheet
 *
 * This is the template that displays the feature partners.
 */
$heading = get_field( 'datasheet-heading' );
$description = get_field( 'datasheet-description' );
$datatable   = get_field( 'datasheet-table' );
$bgcolor 	 = get_field( 'datasheet-bgcolor' );

$datasheets = get_field( 'datasheets' );

if( ! empty( $datasheets ) ) { ?>
	<div class="datasheets">
		<?php
		foreach( $datasheets as $datasheet ) {
			if( ! empty( $datasheet[ 'datasheet-heading' ] ) ) ?>
				<h3 class="content-block-heading text-align-center">
					<?php echo esc_html( $datasheet['datasheet-heading' ] ); ?>
				</h3>
			<?php
			if( ! empty( $datasheet['datasheet-descriptin'] ) ) { ?>
				<p class="content-block-description">
					<?php echo esc_html( $datasheet['datasheet-description'] ); ?>
				</p>
			} ?>

		} ?>
	</div>
}

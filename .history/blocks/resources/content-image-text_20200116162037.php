<?php
/**
 * Block Name: Resource Text/Image
 *
 * This is the template that displays an image and text block
 */
$heading = get_field('text-image-heading')
$image_id = get_field( 'text-image-id' );
$image_position = get_field( 'text-image-position' );
$text = get_field( 'text-image-editor-content' );

$flex_direction = ( 'right' === $image_position ) ? 'flex-row-reverse' : '';
?>
<div class="image-text-content d-flex <?php echo esc_attr( $flex_direction ); ?>">
	<div class="resource-image">
		<img src="http://via.placeholder.com/547x393">
	</div>

	<div class="resource-text">
		<?php echo wp_filter_post_kses( $text ); ?>
	</div>
</div>

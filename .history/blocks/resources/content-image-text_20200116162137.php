<?php
/**
 * Block Name: Resource Text/Image
 *
 * This is the template that displays an image and text block
 */
$heading = get_field('heading');
$image_id = get_field( 'image' );
$image_position = get_field( 'timage' );
$text = get_field( 'text' );

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

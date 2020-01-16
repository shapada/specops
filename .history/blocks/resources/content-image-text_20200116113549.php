<?php
/**
 * Block Name: Resource Text/Image
 *
 * This is the template that displays an image and text block
 */
$heading = get_field( 'heading' );
$image_id = get_field( 'image' );
$image_position = get_field( 'image-position' );
$text = get_field( 'text' );

var_dump( $heading );
var_dump( $image_id );
var_dump( $image_position );

var_dump( $text );

?>

<div class="image-text-content ">

	<?php if ( ! empty( $heading ) ): ?>
		<h3 class="heading">
			<?php echo esc_html( $heading ); ?>
		</h3>
	<?php endif; ?>

</div>

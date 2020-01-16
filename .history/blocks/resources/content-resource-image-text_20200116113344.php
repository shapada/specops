<?php
/**
 * Block Name: Resource Text/Image
 *
 * This is the template that displays an image and text block
 */
$heading = get_field( 'heading' );
$heading_position = get_field( 'heading_position' );
$image_id = get_field( 'image' );
$image_position = get_field( 'image_position' );
$text_content = get_field( 'text_content' );

var_dump( $heading );
var_dump( $heading_position );

var_dump( $image_id );
var_dump( $image_position );

var_dump( $text_content );

?>

<div class="image-text-content ">

	<?php if ( ! empty( $heading ) ): ?>
		<h3 class="heading">
			<?php echo esc_html( $heading ); ?>
		</h3>
	<?php endif; ?>

</div>

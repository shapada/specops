<?php
/**
 * Block Name: Resource Text/Image
 *
 * This is the template that displays the feature partners.
 */
$heading = get_field( 'heading' );
$heading_position = get_field( 'heading_position' );
$img_id = get_field( 'image' );
$image_position = get_field( 'image_position' );
$text_content = get_field( 'text_content' );

var_dump( $heading );
var_dump( $img_id );
?>

<div class="image-text-content ">

	<?php if ( ! empty( $heading ) ): ?>
		<h3 class="heading" >
			<?php echo esc_html(); ?>
		</h3>
	<?php endif; ?>


</div>

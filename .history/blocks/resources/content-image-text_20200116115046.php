<?php
/**
 * Block Name: Resource Text/Image
 *
 * This is the template that displays an image and text block
 */
$image_id = get_field( 'image' );
$image_position = get_field( 'image-position' );
$text = get_field( 'text' );

$img_flex_order = '1';

if( 'right' === $image_position ) {

}

?>

<style>
	.image-text-content {
		display: flex;
	}

	.image-text-content > div {
		width: 50%;
	}

	.resource-image {
		order: 2;
	}
</style>
<div class="image-text-content">

	<div class="resource-image" style="">
		<img src="http://via.placeholder.com/640x360">
	</div>

	<div class="resource-text">
		<?php echo wp_filter_post_kses( $text ); ?>
	</div>
</div>

<?php
/**
 * Block Name: Resource Text/Image
 *
 * This is the template that displays an image and text block
 */
$image_id = get_field( 'image' );
$image_position = get_field( 'image-position' );
$text = get_field( 'text' );

$flex_order = '1';
if( ! empty( $image_position ) && 'right' === $image_position ) {
	$flex_order = '2';
}

?>

<style>
	.image-text-content {
		display: flex;
		justify-content: space-between;
		align-items: center;
	}

	.image-text-content > div {
		width: 50%;
	}

	.resource-image {
		order: <?php echo "$img_flex_order" ?>;
	}

	.resource-image, {
		width: 50%;
	}

	.resource-text {

	}
</style>
<div class="image-text-content <?php $flex_direction; ?>">

	<div class="resource-image">
		<img src="http://via.placeholder.com/480x320">
	</div>

	<div class="resource-text">
		<?php echo wp_filter_post_kses( $text ); ?>
	</div>
</div>

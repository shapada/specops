<?php
/**
 * Block Name: Resource Text/Image
 *
 * This is the template that displays an image and text block
 */
$image_id = get_field( 'image' );
$image_position = get_field( 'image-position' );
$text = get_field( 'text' );

var_dump( $image_id );
var_dump( $image_position );

var_dump( $text );

?>

<div class="image-text-content">

	<div class="resource-image">
		<img src="http://via.placeholder.com/640x360">
	</div>

	<div class="resource-text">

	</div>
</div>

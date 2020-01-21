<?php
/**
 * Block Name: Resource Text/Image
 *
 * This is the template that displays an image and text block
 */
$heading = get_field('heading');
$image_id = get_field( 'image' );
$image_position = get_field( 'image-position' );
$text = get_field( 'text' );

$style = ( 'right' === $image_position ) ? 'reverse-block' : '';
?>

<div class="content-block image-text-block <?php echo esc_attr( $style ); ?>">
	<h2>How does it work?</h2>
	<div class="image-block">
		<img src="http://via.placeholder.com/547x393">
	</div>

	<div class="text-block">
		<?php echo wp_filter_post_kses( $text ); ?>
	</div>
</div>
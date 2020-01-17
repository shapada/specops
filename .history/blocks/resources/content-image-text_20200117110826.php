<?php
/**
 * Block Name: Resource Text/Image
 *
 * This is the template that displays an image and text block
 */
$heading = get_field('heading');
$heading_position = get_field( 'heading-position' );
$image_id = get_field( 'image' );
$image_position = get_field( 'image-position' );
$text = get_field( 'text' );
$background_color = get_field( 'background-color' );

$heading_style = ! empty( $heading_position ) ? 'style=text-align:' . $heading_position . ';' : '';
$content_style = ! empty( $image_position ) && 'right' === $image_position ? 'reverse-block' : '';
$bg_color_style = ! empty( $background_color ) && 'light-grey' === $background_color ? 'style=background-color:' . $background_color . ';' : '';

?>

<div class="content-block image-text-block" <?php echo $bg_color_style; ?>>
	<?php if( ! empty( $heading ) ): ?>

		<h2 class="content-block-heading" <?php echo esc_attr( $heading_style ); ?>>
			<?php echo esc_html( $heading ); ?>
		</h2>

	<?php endif; ?>

	<div class="content-block-body <?php echo esc_attr( $content_style ); ?>">
		<div class="image-content">
			<img src="<?php echo esc_url( wp_get_attachment_url( $image_id ) ); ?>">
		</div>

		<div class="text-content">
			<?php echo wp_filter_post_kses( $text ); ?>
		</div>
	</div>

</div>

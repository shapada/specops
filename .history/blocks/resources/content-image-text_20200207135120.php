<?php
/**
 * Block Name: Resource Text/Image
 *
 * This is the template that displays an image and text block
 */
if ( have_rows( 'image-text' ) ):
	$background_color = get_field( 'background-color' );
	$bg_color_style = ! empty( $background_color ) ? 'style=background-color:#' . $background_color . ';' : '';
?>

<div class="content-block" <?php echo esc_attr( $bg_color_style ); ?>>

<?php
	while( have_rows( 'image-text' ) ): the_row();
		$heading 		  = get_sub_field( 'heading' );
		$heading_position = get_sub_field( 'heading-position' );

		$image_id 		  = get_sub_field( 'image' );
		$image_position   = get_sub_field( 'image-position' );

		$text_content 	  = get_sub_field( 'text-content' );

		$background_color = get_sub_field( 'background-color' );

		$heading_css  = ! empty( $heading_position ) ? $heading_position : 'text-center';
		$content_css  = ! empty( $image_position ) && 'right' === $image_position ? 'reverse-block' : '';
		$width_css 	  = get_sub_field( 'layout' );

		if( ! empty( $heading ) ): ?>
			<h2 class="block-heading <?php echo esc_attr( $heading_css ); ?>">
				<?php echo esc_html( $heading ); ?>
			</h2>
		<?php endif; ?>

		<?php if( ! empty( $text_content ) ): ?>

			<div class="image-text-block d-flex align-items-center justify-content-between <?php echo esc_attr( $content_css ); ?> <?php echo esc_attr( $width_css ); ?>">
				<div class="image-block">
					<img src="<?php echo esc_url( wp_get_attachment_image_url( $image_id, 'large' ) ); ?>">
				</div>
				<div class="text-block">
					<?php echo wp_filter_post_kses( $text_content ); ?>
				</div>
			</div>
		<?php endif; ?>
	<?php endwhile; ?>
</div><!-- .content-block -->
<?php endif; ?>

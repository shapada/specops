<?php

/**
 * Images Block
 *
 */

if ( have_rows( 'images-block' ) ):
	$bg_color = get_field( 'background-color' );
	$bg_color_style = ! empty( $bg_color ) ? 'style=background-color:#' . $bg_color . ';' : '';
?>
<div class="content-block d-flex justify-content-between" <?php echo esc_attr( $bg_color_style ); ?>>
	<?php while( have_rows( 'images-block' ) ): the_row();
		$image_id = get_sub_field('image-block');
		$caption  = get_sub_field( 'caption' ); ?>
		<div class="image-block">
			<img src="<?php echo esc_url( wp_get_attachment_image_url( $image_id, 'full' ) ); ?>" alt="">
			<p class="text-center font-italic"><?php echo esc_html( $caption ); ?></p>
		</div>
	<?php endwhile; ?>
</div>s
<?php endif; ?>

<?php

/**
 * Side-by-Side Images Block
 *
 */

$images = get_field( 'images' );
$bg_color = get_field( 'background-color' );

$bg_color_style = ! empty( $background_color ) ? 'style=background-color:#' . $background_color . ';' : '';

?>
<div class="content-block images-block" <?php echo esc_attr( $bg_color_style ); ?>>
	<div class="content-block-body d-flex">
		<?php
		if( ! empty ( $images ) ):
			foreach( $images as $image ):
				if( empty( $image ) ) {
					continue;
				}
			?>
			<div class="image-content">
				<img src="<?php echo wp_get_attachment_image_url( $image['image'] ); ?>" alt="">
			</div>
		<?php
		endforeach;
	endif;
	?>
	</div>
</div>

<?php

/**
 * Side-by-Side Images Block
 *
 */

$images = get_field( 'images' );
$bg_color = get_field( 'background-color' );

$bg_color_style = ! empty( $bg_color ) ? 'style=background-color:#' . $bg_color . ';' : '';
echo '<pre>';
var_dump( have_rows( 'images' ) );
?>
<div class="content-block" <?php echo esc_attr( $bg_color_style ); ?>>
	<div class="images-block">
		<div class="content-block-body d-flex">
			<?php
			if( ! empty ( $images ) ):
				foreach( $images as $image ):
					if( empty( $image ) ) {
						continue;
					}
				?>
				<div class="image-content">
					<img src="<?php echo esc_url( wp_get_attachment_image_url( $image['image'] ) ); ?>" alt="">
					<p><?php echo esc_html( $image['description'] ); ?></p>
				</div>
			<?php
			endforeach;
		endif;
		?>
		</div>
	</div>

</div>

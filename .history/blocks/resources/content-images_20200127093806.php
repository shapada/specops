<?php

/**
 * Images Block
 *
 */

$images = get_field( 'images-block' );
$bg_color = get_field( 'background-color' );

$bg_color_style = ! empty( $bg_color ) ? 'style=background-color:#' . $bg_color . ';' : '';


if ( have_rows( 'images-block' ) ): ?>

	<?php while( have_rows( 'image-text' ) ): the_row();
		$image_id = get_sub_field('image-block');
		$caption  = get_sub_field( 'caption' ); ?>

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
				<?php endif; endwhile; ?>

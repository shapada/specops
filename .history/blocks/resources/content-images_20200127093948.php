<?php

/**
 * Images Block
 *
 */

$images = get_field( 'images-block' );
$bg_color = get_field( 'background-color' );

$bg_color_style = ! empty( $bg_color ) ? 'style=background-color:#' . $bg_color . ';' : '';


if ( have_rows( 'images-block' ) ): ?>
<div class="content-block" <?php echo esc_attr( $bg_color_style ); ?>>
	<?php while( have_rows( 'image-text' ) ): the_row();
		$image_id = get_sub_field('image-block');
		$caption  = get_sub_field( 'caption' ); ?>
		<div class="images-block">
			<div class="content-block-body d-flex">

				<div class="image-content">
					<img src="<?php echo esc_url( wp_get_attachment_image_url( $image_id ) ); ?>" alt="">
					<p><?php echo esc_html( $caption ); ?></p>
				</div>

			</div>
		</div>
	</div>
<?php endwhile;
dif; ?>

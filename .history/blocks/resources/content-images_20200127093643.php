<?php

/**
 * Images Block
 *
 */

$images = get_field( 'images-block' );
$bg_color = get_field( 'background-color' );

$bg_color_style = ! empty( $bg_color ) ? 'style=background-color:#' . $bg_color . ';' : '';
echo '<pre>';
var_dump( $images );


if ( have_rows( 'images-block' ) ): ?>

	<?php while( have_rows( 'image-text' ) ): the_row();

		$heading 		  = get_sub_field('heading');
		$heading_position = get_sub_field( 'heading-position' );

		$image_id 		  = get_sub_field( 'image' );
		$image_position   = get_sub_field( 'image-position' );

		$text 			  = get_sub_field( 'text' );
		$background_color = get_sub_field( 'background-color' );
	?>
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

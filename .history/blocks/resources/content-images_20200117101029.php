<?php

/**
 * Side-by-Side Images Block
 *
 */

$images = get_field( 'images' );
?>
<div class="content-block images-block">
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

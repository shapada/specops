<?php

/**
 * Side-by-Side Images Block
 *
 */

$images = get_field( 'images' );
?>
<div class="content-block images-block">
	<div class="content-block-body">
		<?php
		if( ! empty ( $images ) ):
			foreach( $images as $image_id ):
				if( empty( $image_id ) ) {
					continue;
				}
			?>
			<div class="image-content">
				<img src="<?php echo wp_get_attachment_image( $image_id ); ?>" alt="">
			</div>
		<?php
		endforeach;
	endif;
	?>
	</div>
</div>

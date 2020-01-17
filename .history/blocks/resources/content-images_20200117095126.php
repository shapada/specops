<?php

/**
 * Side-by-Side Images Block
 *
 */

 $left_image = get_field( 'left-image')
?>
<div class="content-block images-block">
	<div class="content-block-body">
		<div class="image-block">
			<img src="<?php echo wp_get_attachment_image( attachment_id, size, icon, attr ) ?>" alt="">
		</div>
		<div class="image-block">
			<img src="<?php echo wp_get_attachment_image( attachment_id, size, icon, attr ) ?>" alt="">
		</div>
	</div>
</div>

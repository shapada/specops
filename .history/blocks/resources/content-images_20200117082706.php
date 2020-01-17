<?php

/**
 * Side-by-Side Images Block
 *
 */
<div class="content-block images-block">
	<div class="image-block">
		<img src="<?php echo wp_get_attachment_image( attachment_id, size, icon, attr ) ?>" alt="">
		<img src="<?php echo wp_get_attachment_image( attachment_id, size, icon, attr ) ?>" alt="">
	</div>
</div>

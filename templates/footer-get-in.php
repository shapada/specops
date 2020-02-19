<?php  $image = wp_get_attachment_image_src(get_field('touch_background','options'), 'full' ); ?>
<div class="get-in-touch" style="background:url(<?php echo $image[0]; ?>); background-size:cover;">

	<div class="row">

		<div class="columns-10 column-center">
			<div class="get-in-wrapper">
				

				<h3><?php the_field('touch_title', 'options'); ?></h3>
				<p><?php the_field('touch_content', 'options'); ?></p>
				<a href="<?php the_field('touch_link', 'options'); ?>" class="button"><?php the_field('touch_link_text', 'options'); ?></a>
			</div>
		</div>

	</div>

</div>

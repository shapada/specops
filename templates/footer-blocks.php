
<div class="double-full-width footer-blocks">

	<div class="row">

		<div class="columns-4 right-2">
			<div class="footer-block resource-block">
				<?php  $image = wp_get_attachment_image_src(get_field('resource_image','options'), 'full' ); ?>
				<img src="<?php echo $image[0]; ?>" alt="">
				<h3><?php the_field('resource_title', 'options'); ?></h3>
				<?php if ( get_field( 'resource_content', 'options' ) ) : ?>
					<p><?php the_field('resource_content', 'options'); ?></p>
				<?php endif; ?>
				<?php if ( get_field( 'resource_link_text', 'options' ) ) : ?>
					<span class="link-text"><?php the_field('resource_link_text', 'options'); ?></span>
				<?php endif; ?>
				<a class="block-link" href="<?php the_field('resource_link', 'options'); ?>">&nbsp;</a>
			</div>
		</div>

		<div class="columns-4 right-2">
			<div class="footer-block support-block">
				<?php  $image = wp_get_attachment_image_src(get_field('support_image','options'), 'full' ); ?>
				<img src="<?php echo $image[0]; ?>" alt="">
				<h3><?php the_field('support_title', 'options'); ?></h3>
				<?php if ( get_field( 'support_content', 'options' ) ) : ?>
					<p><?php the_field('support_content', 'options'); ?></p>
				<?php endif; ?>
				<?php if ( get_field( 'support_link_text', 'options' ) ) : ?>
					<span class="link-text"><?php the_field('support_link_text', 'options'); ?></span>
				<?php endif; ?>
				<a class="block-link" href="<?php the_field('support_link', 'options'); ?>">&nbsp;</a>
			</div>

		</div>

	</div>

</div>


<div class="double-full-width footer-blocks-career">

	<div class="row">

		<div class="columns-4 right-2">
			<div class="footer-block career-block">
				<?php  $image = wp_get_attachment_image_src(get_field('career_image','options'), 'full' ); ?>
				<img src="<?php echo $image[0]; ?>" alt="">
				<h3><?php the_field('career_title', 'options'); ?></h3>
				<?php if ( get_field( 'career_content', 'options' ) ) : ?>
					<p><?php the_field('career_content', 'options'); ?></p>
				<?php endif; ?>
				<?php if ( get_field( 'career_link_text', 'options' ) ) : ?>
					<span class="link-text"><?php the_field('career_link_text', 'options'); ?></span>
				<?php endif; ?>
				<a class="block-link" href="<?php the_field('career_link', 'options'); ?>">&nbsp;</a>
			</div>
		</div>

		<div class="columns-4 right-2">
			<div class="footer-block custom-block">
				<?php  $image = wp_get_attachment_image_src(get_field('custom_image','options'), 'full' ); ?>
				<img src="<?php echo $image[0]; ?>" alt="">
				<h3><?php the_field('custom_title', 'options'); ?></h3>
				<?php if ( get_field( 'custom_content', 'options' ) ) : ?>
					<p><?php the_field('custom_content', 'options'); ?></p>
				<?php endif; ?>
				<?php if ( get_field( 'custom_link_text', 'options' ) ) : ?>
					<span class="link-text"><?php the_field('custom_link_text', 'options'); ?></span>
				<?php endif; ?>
				<a class="block-link" href="<?php the_field('custom_link', 'options'); ?>">&nbsp;</a>
			</div>

		</div>

	</div>

</div>

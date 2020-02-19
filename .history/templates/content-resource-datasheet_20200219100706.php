<div class="row">
	<div class="columns-12 column-center" id="content">
		<?php
			while ( have_posts() ) {
				the_post();

				$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );

				if ( ! empty( $image ) ): ?>
					<img src="<?php echo esc_url($image[0]); ?>" alt="">
				<?php
				endif;

				the_content();
			}
		?>
	</div>
</div>


<div class="homepage-testimonial">

	<div class="row">

		<div class="columns-8 column-center">
			<div class="testimonial-wrapper">

			<?php
				$testimonial_link = get_field('testimonial_link');
				$testimonial_button = get_field('testimonial_button_label');
			?>
		
				<h3>
					<?php if ( $testimonial_link ) : ?>
					<a href="<?php echo $testimonial_link; ?>">
					<?php endif; ?>
					<?php the_field('testimonial_header'); ?>
					<?php if ( $testimonial_link ) : ?>
					</a>
					<?php endif; ?>
				</h3>
				<p class="quote"><?php the_field('testimonial_content'); ?></p>
				<p class="citation"><?php the_field('testimonial_citation'); ?></p>
				
				<?php if ( $testimonial_link && $testimonial_button ) : ?>
					<a class="button" href="<?php echo $testimonial_link; ?>">
						<?php echo $testimonial_button; ?>
					</a>
				<?php endif; ?>
		
			</div>
		</div>

	</div>

</div>

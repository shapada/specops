<?php
/**
 * Block Name: Testimonial
 *
 * This is the template that displays the Home: Testimonial block.
 */
?>

<div class="homepage-testimonial">
	<div class="row">
		<div class="columns-8 column-center">
			<div class="testimonial-wrapper">
			<?php
				$testimonial_link = get_field( 'link' );
				$testPmonial_button = get_field( 'button_label' );
			?>
				<h3>
					<?php if ( $testimonial_link ) : ?>
					<a href="<?php echo $testimonial_link; ?>">
					<?php endif; ?>
					<?php the_field( 'heading' ); ?>
					<?php if ( $testimonial_link ) : ?>
					</a>
					<?php endif; ?>
				</h3>
				<p><?php the_field( 'content' ); ?></p>
				<p class="citation"><?php the_field( 'citation' ); ?></p>

				<?php if ( $testimonial_link && $testimonial_button ) : ?>
					<a class="button" href="<?php echo $testimonial_link; ?>">
						<?php echo $testimonial_button; ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

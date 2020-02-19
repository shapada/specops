<?php

	$i = 0;

	// check for rows (parent repeater)
	if ( have_rows( 'highlights' ) ) : ?>
		<div class="years-wrap">
		<?php 

		// loop through rows (parent repeater)
		while ( have_rows( 'highlights' ) ) : the_row();
			$i++ ?>

			<?php if ( $i == 3 ) : ?>
			<div class="show-more"><span class="show-more-button">Show More Highlights</span></div>
				<div class="more-highlights">
			<?php endif; ?>
			<div>
				<h3><?php the_sub_field( 'year' ); ?></h3>
				<?php 

				// check for rows (sub repeater)
				if (  have_rows( 'highlights_points' ) ) : ?>
					<ul>
					<?php 

					// loop through rows (sub repeater)
					while ( have_rows( 'highlights_points' ) ) : the_row();

						// display each item as a list
						?>
						<li>
							<?php the_sub_field( 'highlight' ); ?>
						</li>
					<?php endwhile; ?>
					</ul>
				<?php endif; //if ( get_sub_field( 'highlights_points' ) ) : ?>
			</div>

		<?php endwhile; // while ( has_sub_field( 'year' ) ) : ?>
		</div>
	</div>
<?php endif; // if ( get_field( 'highlights' ) ) : ?>
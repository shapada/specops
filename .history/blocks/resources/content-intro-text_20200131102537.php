<?php

/**
 * Images Block
 *
 */

if ( have_rows( 'intro-text' ) ):?>
	<div class="content-block d-flex justify-content-between" <?php echo esc_attr( $bg_color_style ); ?>>
		<?php
		while( have_rows( 'intro-text' ) ): the_row();
			$image_id = get_sub_field('text-content');
			?>
			<div class="text-content">
				<p>
					<?php echo esc_html( $caption ); ?>
				</p>
			</div>
		<?php endwhile; ?>
	</div>
<?php endif;

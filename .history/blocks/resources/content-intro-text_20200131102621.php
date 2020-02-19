<?php

/**
 * Images Block
 *
 */

if ( have_rows( 'intro-text' ) ):?>
	<div class="content-block d-flex justify-content-between" <?php echo esc_attr( $bg_color_style ); ?>>
		<?php
		while( have_rows( 'intro-text' ) ): the_row();
			$text_content = get_sub_field('text-content');
			?>
			<p class="text-content">
				<?php echo esc_html( $text_content ); ?>
			</p>
		<?php endwhile; ?>
	</div>
<?php endif;

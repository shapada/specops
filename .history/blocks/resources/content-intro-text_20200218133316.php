<?php
if ( have_rows( 'intro-text' ) ):?>
	<div class="row d-flex justify-content-center">
		<div class="columns-8">
			<div class="content-block">
				<?php
				while( have_rows( 'intro-text' ) ): the_row();
					$text_content = get_sub_field( 'intro-text-paragraph' );
					?>
					<p class="intro-text">
						<?php echo esc_html( $text_content ); ?>
					</p>
				<?php endwhile; ?>
			</div>
		</div>
	</div>

<?php endif;

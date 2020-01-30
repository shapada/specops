<div class="page-banner single-resource-banner">
	<div class="row">
		<div class="columns-12 column-center text-center banner-col">
			<?php
            $terms = get_the_terms( get_queried_object(), 'resource-types' );

            if ( ! empty( $terms ) ) {
                foreach ( $terms as $term ) {
                    $link = get_term_link( $term );

                    if ( ! is_a( $link, 'WP_Error' ) ) { ?>
						<a href="<?php echo esc_url( $link ); ?>" class="resource-topic" >
							<?php echo esc_html( $term->name ); ?>
						</a>
					<?php
                    }
                }
            }
            ?>
			<h1 style="single-resource-title">
				<?php esc_html( the_title() ); ?>
			</h1>
			<?php
            if ( get_field('is_pdf') ): ?>
				<div class="pdf-wrapper">
					<a href="<?php esc_url( the_field( 'pdf_file') ); ?>"
						target="_blank"
						class="button">
						Download PDF
					</a>
				</div>
			<?php endif; ?>

			<?php

				if( get_field( 'video-description' ) ) {
					$video_description = get_field( 'video-description' );

					if ( ! empty( $video_description ) ) { ?>
						<p>
							<?php echo esc_html( $video_description ); ?>
						</p>
					<?php
					}
				}
			?>
		</div>
	</div>
</div>

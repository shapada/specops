<?php

/**
 * Related Resources
 */

class RelatedResources {

	private $post_id = 0;
	private $terms = [];

	function __construct( $post_id, $terms ) {
		if( is_int( $post_id ) ) {
			$this->set_post_id( $post_id );
		}

		if( ! empty( $terms ) ) {
			$this->set_terms( $terms );
		}
	}

	private function get_posts( $args = [] ) {
		$query_args = array_merge( $this->get_default_args(), $args );
		$wp_query = new WP_Query( $query_args );

		return $wp_query->get_posts();
	}

	public function render() {
		$posts = $this->get_posts();

		if	( empty( $posts ) ) {
			return;
		}
		?>
		<ul class="related-resources-list">
			<?php
			foreach( $posts as $post ) {
				?>
				<li class="related-resource">
					<a href="<?php esc_url( get_permalink( $post->ID ) ); ?>">
						<div class="related-article card">
							<div class="card-header">
								<h5>
									<?php echo esc_html( $post->post_title ); ?>
								</h5>
							</div>
							<div class="card-body">
								<?php
									if ( empty( $post->post_excerpt ) ) {
										echo wp_kses_post( wp_trim_words( $post->post_content, 30 ) );
									} else {
										echo wp_kses_post( $post->post_excerpt );
									}
								?>
							</div>
						</div>
					</a>
				</li>
				<?php
			}
		?>
		</ul>
	<?php
	}

	protected function get_post_excerpt( $post ) {
		$excerpt = '';

		if	( is_a( $post, 'WP_Post' ) ) {
			$excerpt = empty( $post->post_excerpt ) ? wp_trim_words( $post->post_content, 30 ) : $post->post_excerpt;
		}

		return $excerpt;
	}

	private function get_default_args() {
		return [
			'post_type' => 'resources',
			'posts_per_page' => 3,
			'orderby' => 'date',
			'order' => 'DESC',
			'post__not_in' => [ $this->get_post_id() ],
			'tax_query' => array(
				array(
					'taxonomy' => 'resource-topic',
					'field' => 'id',
					'terms' => $this->get_terms(),
				),
			)
		];
	}

	private function set_post_id( $post_id ) {
		if(
			false === filter_var( $post_id, FILTER_VALIDATE_INT )
		) {
			return;
		}

		$this->post_id = $post_id;
	}

	private function set_terms( $terms ) {
		if(
			false === filter_var_array( $terms, FILTER_VALIDATE_INT )
		) {
			return;
		}

		$this->terms = $terms;
	}

	private function get_post_id() {
		return $this->post_id;
	}

	private function get_terms() {
		return $this->terms;
	}
}

<?php

/**
 * Related Resources
 */

class RelatedResources {

	public $heading = '';
	private $post_id = 0;
	private $related_posts = [];
	private $terms = [];

	function __construct( $post_id, $terms, $heading ) {
		if( is_int( $post_id ) ) {
			$this->set_post_id( $post_id );
		}

		if( ! empty( $terms ) ) {
			$this->set_terms( $terms );
		}

		if( ! empty( $heading ) ) {
			$this->set_heading( $heading );
		}
	}

	private function query_related_posts( $args = [] ) {
		$query_args = array_merge( $this->get_default_args(), $args );
		$wp_query = new WP_Query( $query_args );

		if ( $wp_query->have_posts ) {{
			$this->set_related_posts( $wp_query->posts );
		}

		return $wp_query;
	}

	public function have_posts() {
		$posts = $this->get_related_posts();

		return ! empty( $posts );
	}

	public function render() {
		$posts = $this->get_related_posts();

		if	( empty( $posts ) ) {
			return;
		}

		$this->render_heading();

		?>
		<ul class="related-resources-list">
			<?php
			foreach( $posts as $post ) {
				?>
				<li class="related-resource">
					<?php $this->render_resource_item( $post ); ?>
				</li>
			<?php
			}
		?>
		</ul>
	<?php
	}

	private function render_heading() {
		?>
		<h2 class="text-center">
			<?php
				echo esc_html( $this->get_heading() );
			?>
		</h2>
		<?php
	}

	private function render_resource_item( $post ) {
		if( is_a( $post, 'WP_Post' ) ) { ?>
			<a href="<?php esc_url( get_permalink( $post->ID ) ); ?>">
				<div class="card related-article">
					<div class="card-header">
						<h5>
							<?php echo esc_html( $post->post_title ); ?>
						</h5>
					</div>
					<div class="card-body">
						<?php
							echo wp_kses_post( $this->get_post_excerpt( $post ) );
						?>
					</div>
				</div>
			</a>
		<?php
		}
	}

	protected function get_post_excerpt( $post ) {
		$excerpt = '';

		if	( is_a( $post, 'WP_Post' ) ) {
			$excerpt = empty( $post->post_excerpt ) ? wp_trim_words( $post->post_content, 30 ): $post->post_excerpt;
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

	private function set_heading( $heading ) {
		if(
			false === filter_var( $heading, FILTER_SANITIZE_STRING )
		) {
			return;
		}

		$this->heading = $heading;
	}

	private function set_related_posts( $related_posts ) {
		if (
			false === filter_var_array( $related_posts, [ 'flags'   => FILTER_FORCE_ARRAY ] )
		) {
			$this->related_posts = $related_posts;
		}
	}

	private function get_post_id() {
		return $this->post_id;
	}

	public function get_heading() {
		return $this->heading;
	}

	private function get_terms() {
		return $this->terms;
	}
}

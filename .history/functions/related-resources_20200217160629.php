<?php

/**
 * Related Resources
 */

class RelatedResources {

	private $post_id = 0;
	public $heading = '';
	private $taxonomy = '';

	function __construct( $post_id, $taxonomy, $heading ) {
		if( is_int( $post_id ) ) {
			$this->set_post_id( $post_id );
		}

		if( ! empty( $taxonomy ) ) {
			$this->set_taxonomy( $taxonomy );
		}

		if( ! empty( $heading ) ) {
			$this->set_heading( $heading );
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

		$this->render_heading();
		?>
		<section class="related-articles">
			<div class="row">
				<div class="columns-12">
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
				</div>
			</div>
		</div>
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
					'taxonomy' => $this->get_taxonomy(),
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

	private function set_taxonomy( $taxonomy ) {
		if(
			false === filter_var( $taxonomy, FILTER_SANITIZE_STRING )
		) {
			return;
		}

		$this->taxonomy = $taxonomy;
	}

	private function set_heading( $heading ) {
		if(
			false === filter_var( $heading, FILTER_SANITIZE_STRING )
		) {
			return;
		}

		$this->heading = $heading;
	}

	private function get_post_id() {
		return $this->post_id;
	}

	public function get_heading() {
		return $this->heading;
	}

	private function get_taxonomy() {
		return $this->taxonomy;
	}

	private function get_terms() {
		$results  = [];

		$terms    = get_the_terms( null, $this->taxonomy );
		$term_ids = wp_list_pluck( $terms, 'term_id' );

		if( ! empty( $term_ids ) ) {
			$results = $term_ids;
		}

		return $results;
	}
}

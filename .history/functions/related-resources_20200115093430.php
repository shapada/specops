<?php

/**
 * Related Resources
 */

namespace Specops\Resources;

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

	private function get_related_resources( $args ) {
		$query_args = array_merge( $this->get_default_args(), $args );

		return new WP_Query( $query_args );
	}

	public function render() {
		$related_resources = $this->get_related_resources();

		if( empty( $related_resources ) ) {
			return;
		}
		?>
		<ul class="block-grid-3">
			<?php while ($related_resources->have_posts()): $related_resources->the_post(); ?>
				<li>
					<a href="<?php the_permalink(); ?>">
						<div class="related-article card">
							<div class="card-header">
								<h5>
									<?php the_title(); ?>
								</h5>
							</div>
							<div class="card-body">
								<?php the_excerpt(); ?>
							</div>
						</div>
					</a>
				</li>
			<?php endwhile; wp_reset_query(); ?>
		</ul>
	<?php
	}

	private function get_default_args() {
		return [
			'post_type' => 'resources',
			'posts_per_page' => 3,
			'orderby' => 'date',
			'order' => 'DESC',
			'post__not_in' => array( $this->get_post_id() ),
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

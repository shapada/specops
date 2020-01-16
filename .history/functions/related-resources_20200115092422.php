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

	private function get_related_resources( $args ) {
		$query_args = array_merge( $this->get_default_args(), $args );

		$query = new WP_Query( $query_args );

		$posts = [];
		if( $query->have_posts() ) {
			$posts = $query->posts;
		}

		return $posts;
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
					'terms' => $this->get_term_id(),
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

	private function set_terms( $term_id ) {
		if(
			false === filter_var( $term_id, FILTER_VALIDATE_INT )
		) {
			return;
		}

		$this->term_id = $term_id;
	}

	private function get_post_id() {
		return $this->post_id;
	}

	private function get_term_id() {
		return $this->term_id;
	}
}

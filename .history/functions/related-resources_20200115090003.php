<?php

/**
 * Related Resources
 */

class RelatedResources {

	private $post_id = 0;
	private $query_arge = [];

	function __construct( $post_id ) {
		if( is_int( $post_id ) ) {
			this->set_post_id();
		}
	}

	private function get_related_resources( $args ) {
		$query_args = array_merge( $this->get_default_args(), $args );

	}

	private function get_default_args() {
		return [
			'post_type' => 'resources',
			'posts_per_page' => 3,
			'orderby' => 'date',
			'order' => 'DESC',
			'post__not_in' => array( get_the_ID() ),
			'tax_query' => array(
				array(
					'taxonomy' => 'resource-topic',
					'field' => 'id',
					'terms' => wp_list_pluck($resource_term, 'term_id'),
				),
			)
			];
	}
}

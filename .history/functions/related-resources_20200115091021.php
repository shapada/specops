<?php

/**
 * Related Resources
 */

class RelatedResources {

	private $post_id = 0;
	private $query_arge = [];

	function __construct( $post_id, $args ) {
		if( is_int( $post_id ) ) {
			$this->set_post_id( $post_id );
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
			'post__not_in' => array( $this->post_id ),
			'tax_query' => array(
				array(
					'taxonomy' => 'resource-topic',
					'field' => 'id',
					'terms' => wp_list_pluck($resource_term, 'term_id'),
				),
			)
		];
	}

	private function query() {

	}

	private function set_post_id( $post_id ) {
		if( false === filter_var( $post_id, FILTER_VALIDATE_INT ) ) {
			return;
		}
	}

	private function get_post_id() {
		return $this->post_id;
	}
}

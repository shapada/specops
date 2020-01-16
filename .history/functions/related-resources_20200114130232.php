<?php

/**
 * Related Resources
 */
class RelatedResources {

	private $post_id;

	__construct( $post_id ) {
		if( is_int( $post_id ) ) {
			this->set_post_id();
		}
	}
}

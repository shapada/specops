<?php

/**
 * Related Resources
 */
class RelatedResources {

	$post_id = 0;

	__construct( $post_id ) {
		if( is_int( $post_id ) ) {
			this->set_post_id();
		}
	}
}

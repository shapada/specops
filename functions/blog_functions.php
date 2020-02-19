<?php





if ( ! function_exists( 'forge_saas_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function forge_saas_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php _e( 'Pingback:', 'forge_saas' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'forge_saas' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
					<?php printf( __( '%s <span class="says">says:</span>', 'forge_saas' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author -->

				<div class="comment-metadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'forge_saas' ), get_comment_date(), get_comment_time() ); ?>
						</time>
					</a>
					<?php edit_comment_link( __( 'Edit', 'forge_saas' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-metadata -->

				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'forge_saas' ); ?></p>
				<?php endif; ?>
			</footer><!-- .comment-meta -->

			<div class="comment-content">
				<?php comment_text(); ?>
			</div><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for forge_saas_comment()


if ( ! function_exists( 'forge_saas_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function forge_saas_posted_on($taxonomy = 'category') {
	
	// get post categories
	$categories = get_the_category();
	$terms = get_the_terms( get_the_ID(), $taxonomy);

	$term_list = array();
	
	if($terms){
		
		foreach($terms as $term) {
			$term_list[] = sprintf('<a href="%s" title="%s">%s</a>',
				get_term_link($term),
				esc_attr( sprintf( __( "View all posts in %s" ), $term->name ) ),
				$term->name
			);
		}
		
	}
		
	$forge_meta = sprintf( __( '<time class="entry-date" datetime="%1$s">%2$s<span>%3$s</span></time>', 'forge_saas' ),
		esc_attr( get_the_time( 'Y-m-j' ) ),
		esc_attr( get_the_date( 'M' ) ),
		esc_attr( get_the_date( 'd' ) ),
		$term_list? '<span class="amp"> | </span>' : '',
		implode(', ', $term_list)
	);

	return apply_filters ( 'forge_post_meta' , $forge_meta );
}
endif;

/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function forge_saas_full_date($taxonomy = 'category') {
	
	// get post categories
	$categories = get_the_category();
	$terms = get_the_terms( get_the_ID(), $taxonomy);

	$term_list = array();
	
	if($terms){
		
		foreach($terms as $term) {
			$term_list[] = sprintf('<a href="%s" title="%s">%s</a>',
				get_term_link($term),
				esc_attr( sprintf( __( "View all posts in %s" ), $term->name ) ),
				$term->name
			);
		}
		
	}
		
	$forge_meta = sprintf( __( '<time class="entry-date" datetime="%1$s">%2$s</time>', 'forge_saas' ),
		esc_attr( get_the_time( 'Y-m-j' ) ),
		esc_attr( get_the_date( 'M d, Y' ) ),
	
		$term_list? '<span class="amp"> | </span>' : '',
		implode(', ', $term_list)
	);

	return apply_filters ( 'forge_post_meta' , $forge_meta );
}


// hide Swedish posts from the main blog loop
function hide_swedes($query) {
	if($query->is_home() && $query->is_main_query()){
		$query->set('cat','-17');
	}
}
add_action('pre_get_posts','hide_swedes');

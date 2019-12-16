<?php
/**
 * The main template file.
 */
get_header(); ?>

	<div class="row content-area">

		<div class="columns-8 column-center post-intro">



			<?php while ( have_posts() ) : the_post(); ?>
				<?php if ( has_post_thumbnail() ) : ?>
					<?php if(!get_field('hide_featured_image')): ?>
						<?php the_post_thumbnail('blog-single-thumb', 'class=featured-image+alignright'); ?>
					<?php endif; ?>
				<?php endif; ?>
				<h1><?php the_title(); ?></h1>
				<p><?php
                    echo forge_saas_full_date();
                    if($post->post_date_gmt < $post->post_modified_gmt) {
                        echo '<span class="ti-last-updated">(Last updated on <strong>' . date("F j, Y", strtotime($post->post_modified)) . '</strong>)</span>';
                    }
                    ?></p>
				<?php the_content(); ?>

				<?php if($terms = get_the_tags()): ?>
				<p class="tags">
					<span class="tags-title"><?php _e('Tags', 'anvil'); ?>:</span>
					<?php
						usort($terms, function($a, $b) {
							return strcasecmp($a->name, $b->name);
						});

						$output = array();
						foreach( $terms as $term ) {
							$output[] = sprintf('<a rel="tag" href="%s">%s</a>', get_term_link($term), $term->name);
						}

						echo implode(', ', $output);
					?>
				</p>
				<?php endif; ?>

				<?php if( !get_field('disable_author_block') ): ?>
					<div class="author-block row">
						<div class="columns-3">
							<?php $headshot_id = get_field('author_headshot', 'user_'.get_the_author_ID())? : get_field('default_author_headshot', 'options'); ?>
							<div class="author-headshot"><?php echo wp_get_attachment_image($headshot_id, 'medium'); ?>></div>
						</div>
						<div class="columns-8">
							<p class="author-meta"><?php _e('Written by', 'anvil'); ?></p>
							<h4 class="author-name"><?php the_author_meta( 'display_name' ); ?></h4>
							<p class="author-bio"><?php the_author_meta( 'description' ); ?> </p>
							<a href="<?php echo get_author_posts_url(get_the_author_ID()); ?>" class="read-more"><?php _e('More Articles', 'anvil'); ?></a>
						</div>
					</div>
				<?php endif; ?>

			<?php endwhile; ?>

			<div class="back-nav-wrapper">
				<a href="<?php the_field('blog_parent', 'options'); ?>" class="back-to"><?php _e('Back to Blog', 'anvil'); ?></a>
				<?php get_template_part( 'templates/social-sharing' ); ?>
			</div>

			<?php forge_saas_content_nav(); ?>
		</div>

	</div>

	<?php if( get_field('related_posts') ): ?>
		<div class="realted-article">

			<div class="row">
				<div class="columns-12">
					<h2><?php _e('Related Articles', 'anvil'); ?></h2>
					<ul class="block-grid-3">
						<?php foreach( get_field('related_posts') as $post ): setup_postdata($post); ?>
							<li>
								<div class="blog-wrap">
									<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
									<?php the_excerpt(); ?>
									<a href="<?php the_permalink(); ?>" class="read-more"><?php _e('Read More', 'anvil'); ?></a>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

			</div>

		</div>
	<?php endif; ?>


		<?php
			$these_cats = wp_get_post_terms($post->ID,'category');
			shuffle($these_cats);
			// print_r($these_cats);
			$this_cat = $these_cats[0];
			//print_r($this_cat);
			$posts = get_field('related_content_offer', $this_cat);

			if($posts):
			foreach($posts as $post): setup_postdata( $post );
		?>

			<div class="content-offer-modal-container">

				<div class="content-offer-modal">

					<div class="com-close">Close</div>

					<div class="com-upper">

						<h2><?php the_title(); ?></h2>

						<p class="com-subtitle"><?php the_field('subtitle'); ?></p>

					</div>

					<div class="com-lower">

						<div class="com-left">

							<?php the_post_thumbnail('content-offer'); ?>

						</div>

						<div class="com-right">

							<?php the_content(); ?>

							<?php gravity_form(7, false, false, false, array('offer_id' => get_the_ID()), true); ?>

						</div>

					</div>

				</div>

			</div>

			<script>

				jQuery(document).ready(function($) {

					$(window).on('scroll.showPop', function() {
						var triggerPoint = $('body').height() / 2 - $(window).height() / 2;
						if($(window).scrollTop() > triggerPoint) {
							$('.content-offer-modal-container').fadeIn();
							$(window).unbind('scroll.showPop');
						}
					});

					$('.com-close').on('click',function(){
						$('.content-offer-modal-container').fadeOut();
					});

				});

			</script>

		<?php endforeach; endif; wp_reset_postdata(); ?>


<?php get_footer(); ?>

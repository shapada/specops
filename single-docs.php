<?php
/**
 * The new docs(support) single file.
 */

//Find top-most parent post to use properties elsewhere
$parents = get_post_ancestors( $post );
$id = ($parents) ? $parents[count($parents)-1]: $post->ID;
$parent = get_post($id);

//Building nav args for the custom post nav sidebar
$nav_args = array(
				'child_of' => $id,
				'post_type' => 'docs',
				'title_li' => '',
				'link_before' => '<span class="nav-link-wrap">',
				'link-after' => '</span>'
			);

get_header(); ?>
	<?php get_template_part('templates/page', 'banner'); ?>
	<div class="doc-content">

	<?php /*	<div class="row">

			<div name="top" class="columns-8 column-center blog-search">

				<h2><?php _e('Search Support', 'anvil'); ?></h2>
				<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<div>
						<label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
						<input type="hidden" name="post_type" value="docs" />
						<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Search our Support"/>
						<input type="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
					</div>
				</form>

			</div>

		</div> */ ?>
		<div class="row">

			<div name="top" class="columns-12 support-heading">

				<div class="row">

					<div class="columns-8 heading-wrap">

						<h2><?php _e('Support for', 'anvil'); ?> <?php echo $parent->post_title; ?></h2>

					</div>

					<div class="columns-4 select-wrap">

						<?php if ( have_rows( 'products', 2956 ) ) : ?>
						<span><?php _e('View Support for a different product', 'anvil'); ?></span>
						<div class="custom-select">
							<select class="cs-select" name="product-support-select" id="support-select" onchange="location = this.options[this.selectedIndex].value;">
								<option value="#" disabled selected class="default"><?php _e('Select Product', 'anvil'); ?></option>
								<?php while (have_rows( 'products', 2956  )) : the_row(); ?>
									<?php while (have_rows( 'product', 2956 )) : the_row(); ?>
										<option value="<?php the_sub_field( 'link' ); ?>"><?php the_sub_field( 'title' ); ?></option>
									<?php endwhile; ?>
								<?php endwhile; ?>
							</select>
						</div>
						<?php endif; ?>

					</div>

				</div>

			</div>

		</div>

		<div class="row">
			<div class="columns-4 docs-navigation">
				<nav>
					<ul>
						<?php wp_list_pages( $nav_args ); ?>
					</ul>
				</nav>
				<div class="callout">
					<span class="callout-title"><?php the_field('callout_title', 'options'); ?></span>
					<?php the_field('callout_content', 'options'); ?>
					<a href="<?php the_field('callout_button_url', 'options'); ?>" class="button"><?php the_field('callout_button_text', 'options'); ?></a>
				</div>
			</div>
			<div class="columns-8 main-content" id="content">
				<?php if ( have_posts() ) :
						while ( have_posts() ) : the_post(); ?>

					<h3><?php echo forge_get_breadcrumb(); ?></h3>

					<?php the_content(); ?>

				<?php endwhile;endif; ?>

				<?php if ( have_rows( 'content_blocks' ) ) : ?>

				<?php while ( have_rows( 'content_blocks' ) ) : the_row(); ?>

					<?php if ( get_row_layout() == 'callout' ) : ?>

					<div class="callout-wrapper">

						<h3><?php the_sub_field( 'title' ); ?></h3>

						<?php the_sub_field( 'content' ); ?>

						<?php if ( have_rows( 'link_list' ) ) : ?>
						<ul class="link-list">
							<?php while ( have_rows( 'link_list' ) ) : the_row(); ?>
							<li><a href="<?php the_sub_field( 'link_url' ); ?>"><?php the_sub_field( 'link_text' ); ?></a></li>
							<?php endwhile; ?>
						</ul>
						<?php endif; ?>

					</div>

					<?php elseif ( get_row_layout() == 'accordion' ) : ?>

					<p class="search-page-wrap"><span class="search-input-wrap"><input value="" placeholder="Search this content" type="search" class="search-page"></span><span class="ti-counter"></span></p>

					<div class="accordion">

						<?php while ( have_rows( 'accordion_item' ) ) : the_row(); ?>
						<section>
							<h5 name="<?php echo sanitize_title( get_sub_field('title') ); ?>" class="title"><?php the_sub_field( 'title' ); ?></h5>
							<div class="content"><?php the_sub_field( 'content' ); ?></div>
						</section>
						<?php endwhile; ?>
					</div>

					<?php elseif ( get_row_layout() == 'content_editor' ) : ?>

					<?php the_sub_field( 'content' ); ?>

					<?php elseif ( get_row_layout() == 'related_content' ) : ?>

					<div class="related-articles">

						<span><?php the_sub_field( 'title' ); ?></span>

						<?php $related = get_sub_field( 'related_articles' ); ?>

						<?php if ( $related ) : ?>
						<ul class="post-list">

							<?php foreach ( $related as $post ) : ?>
								<?php setup_postdata( $post ); ?>
								<li><?php the_title(); ?> | <a href="<?php the_permalink(); ?>"><?php _e('See More', 'anvil'); ?></a></li>
							<?php endforeach; ?>
						</ul>
						<?php wp_reset_postdata(); ?>
						<?php endif; ?>

					</div>

					<?php endif; ?>

				<?php endwhile; ?>

				<?php endif;
					echo do_shortcode( '[was-this-helpful]' );
				?>
				
			</div>

		</div>
	</div>

<?php get_footer(); ?>
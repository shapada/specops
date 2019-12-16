<?php
/*
 * Template Name: Support (Dev) Page
 */
get_header(); ?>

	<?php get_template_part('templates/page', 'banner'); ?>

	<?php /*
		<div class="row">

			<div name="top" class="columns-8 column-center blog-search">

				<h2><?php _e('Search Support', 'anvil'); ?></h2>
				<form role="search" method="get" id="searchform" class="searchform row" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<div class="columns-9">
						<input type="hidden" name="post_type" value="docs" />
						<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Search our Support"/>
					</div>
					<div class="columns-3">
						<input type="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
					</div>
				</form>

			</div>

		</div>
		*/ ?>

		<div class="row">

			<div class="columns-12 nav-tabs">

				<?php if (have_rows('products')): ?>
				<ul class="block-grid-3 term-nav-list">
					<?php while ( have_rows('products') ) : the_row(); ?>
					<li><a href="#<?php echo forge_slugify( get_sub_field('product_category') ); ?>"><?php the_sub_field('product_category'); ?></a></li>
					<?php endwhile; ?>
				</ul>
				<?php endif; ?>
			</div>

		</div>

		<?php if (have_rows('products')) : ?>

			<?php while (have_rows('products')) : the_row(); ?>

			<div class="row">

				<div class="columns-12 product-row" role="main">
					<div class="sub-title">
						<h2 name="<?php echo forge_slugify( get_sub_field('product_category') ); ?>"><?php the_sub_field('product_category'); ?></h2>
					</div>

					<?php if ( have_rows('product') ) : ?>

					<ul class="block-grid-4 product-grid">

						<?php while( have_rows('product') ) :
							the_row(); ?>

						<li class="product">

							<a href="<?php the_sub_field('link'); ?>">
								<?php echo wp_get_attachment_image( get_sub_field('image'), 'support-thumb' ); ?>
							</a>

							<h4 class="product-name">
								<a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('title'); ?></a>
							</h4>

						</li>

						<?php endwhile; ?>

					</ul>

					<?php endif; ?>

					<a href="#top" class="top-button button"><?php _e('Back to top', 'anvil'); ?></a>
				</div><!-- .product-row -->


			</div>

			<?php endwhile; ?>

		<?php endif; ?>

<?php get_footer(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

	<div class="row">

		<?php if (has_post_thumbnail() && is_category('news')): ?>
			<div class="columns-1"><p class="post-meta"><?php echo forge_saas_posted_on();  ?></p></div>
			<div class="columns-2">

				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('blog-thumb'); ?></a>

			</div>

			<div class="columns-8">

		<?php else: ?>

			<div class="columns-1"><p class="post-meta"><?php echo forge_saas_posted_on();  ?></p></div>


			<div class="columns-8">

		<?php endif; ?>

				<header>

					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>




					<!-- <p class="post-meta"><?php //echo forge_saas_posted_on();?></p> -->

				</header> <!-- end article header -->

				<section class="post_content clearfix">

					<?php if (is_single()): ?>

						<?php the_content(); ?>

					<?php else : ?>

						<p>
							<?php echo excerpt(40); ?>
							<a href="<?php the_permalink(); ?>" class="read-more"><?php _e('Read More', 'anvil'); ?></a>
						</p>

					<?php endif; ?>

				</section> <!-- end article section -->

				<footer>

					<p class="tags"><?php the_tags('<span class="tags-title">'.__('Tags', 'anvil').':</span> ', ' ', ''); ?></p>

				</footer> <!-- end article footer -->

			</div>

	</div>

</article> <!-- end article -->

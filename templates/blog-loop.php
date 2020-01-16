<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

	<div class="row">

		<div class="columns-1"><p class="post-meta"><?php echo forge_saas_posted_on();  ?></p></div>
		<div class="columns-2">

			<?php if (has_post_thumbnail()) : ?>
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('blog-thumb'); ?></a>
			<?php else : ?>
				<a href="<?php the_permalink(); ?>"><?php echo wp_get_attachment_image(2052, 'blog-thumb'); ?></a>
			<?php endif; ?>  

		</div>

		<div class="columns-8">

			<header>
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<p class="mobile-date"><?php echo forge_saas_posted_on();  ?></p>
			</header> <!-- end article header -->

			<section class="post_content clearfix">
					<p>
						<?php echo excerpt(40); ?>
						<a href="<?php the_permalink(); ?>" class="read-more"><?php _e('Read More', 'anvil'); ?></a>
					</p>
			</section> <!-- end article section -->

		</div>

	</div>

</article> <!-- end article -->

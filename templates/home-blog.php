<div class="homepage-blog">

	<div class="row">
	<h2 class="bottom-line">
		<?php
			if ( is_front_page() ) {
				the_field( 'homepage_blog_title' );
			} else {
				echo 'Read The Latest From Our Blog';
			}
		?>
	</h2>

	<div class="columns-10 column-center">

		<?php
			global $post;
			$posts = get_field( 'home_featured_posts' );
			if (! $posts ) {
				$posts = get_posts( array( 'posts_per_page'   => 3 ) );
			}
			$i  = 0;
			$j = 0;
		?>
			<div class="row primary-post">
				<?php foreach ( $posts as $post ) : ?>
						<?php setup_postdata( $post );
						if ( $i == 0) : ?>
								<div class="columns-6 text-center">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail( 'home-case-study' ); ?>
									</a>
								</div>
								<div class="columns-6">
									<a href="<?php the_permalink(); ?>">
										<h4><?php the_title(); ?></h4>
									</a>
									<span class="date"><?php the_date( 'M. d, Y' ); ?></span>
									<?php the_excerpt(); ?>
									<a class="read-more" href="<?php the_permalink(); ?>">Read More</a>
								</div>
						<?php endif; ?>
						<?php $i++ ?>
				<?php endforeach; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>

		<div class="columns-12">

			<div class="row secondary-posts">
				<h3>More from our blog</h3>
				<?php foreach ( $posts as $post ) : ?>
						<?php setup_postdata( $post );
						if ( $j != 0) : ?>
								<div class="columns-6">
									<a href="<?php the_permalink(); ?>">
										<h4><?php the_title(); ?></h4>
										<span class="date"><?php the_date( 'M. d, Y' ); ?></span>
									</a>
								</div>
						<?php endif; ?>
						<?php $j++ ?>
				<?php endforeach; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
		</div>
	</div>
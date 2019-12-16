<div class="homepage-highlighted-topic">

	<div class="row">

		<h2 class="bottom-line">
			<?php the_field( 'homepage_highlighted_topic_title' ); ?>
		</h2>

		<div class="columns-12">

			<ul class="block-grid-3">

				<?php if ( have_rows( 'homepage_highlighted_topic_articles' ) ) : ?>

				<?php while ( have_rows( 'homepage_highlighted_topic_articles' ) ) : the_row(); ?>

				<li class="highlighted-article">
				
					<a href="<?php the_sub_field( 'homepage_highlighted_topic_article_link' ); ?>">
						<h3><?php the_sub_field( 'homepage_highlighted_topic_article_title' ); ?></h3>
					</a>

					<a class="highlighted-article-learn-more" href="<?php the_sub_field( 'homepage_highlighted_topic_article_link' ); ?>">
						Learn More
					</a>

				</li>

				<?php endwhile; endif; ?>

			</ul>

		</div>

	</div>

</div>
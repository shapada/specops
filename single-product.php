<?php
/**
 * The product single file.
 */
get_header(); ?>

<div itemscope itemtype="product" id="product-<?php the_ID(); ?>" <?php post_class(); ?> data-product>

<?php while ( have_posts() ) : the_post(); ?>

  <?php the_content();

endwhile; ?>

</div>

<?php get_footer(); ?>
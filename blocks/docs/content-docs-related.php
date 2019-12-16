<?php
/**
 * Block Name: Related Articles
 *
 * This is the template that displays the Docs: Related Articles block.
 */
?>

<div class="related-articles">
  <span><?php the_field( 'heading' ); ?></span>
  <?php $related = get_field( 'related_articles' ); ?>
  <?php if ( $related ) : ?>
  <ul class="post-list">
    <?php foreach ( $related as $post ) : ?>
      <?php setup_postdata( $post ); ?>
      <li><?php echo get_the_title( $post->ID ); ?> | <a href="<?php echo get_permalink( $post->ID ); ?>">See More</a></li>
    <?php endforeach; ?>
  </ul>
  <?php wp_reset_postdata(); ?>
  <?php endif; ?>
</div>
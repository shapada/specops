<?php
/**
 * Block Name: Product Sticky Bottom Bar
 *
 * This is the template that displays the Product Sticky Bottom Bar block.
 */
?>

<?php
  $resource_posts = get_field('product_resources');
  $related_posts = get_field('product_related_products');
  $case_studies_posts = get_field('product_case_studies');

  if ($resource_posts || $related_posts || $case_studies_posts || have_rows('single_product_reviews')) :
?>
  <div id="product-sticky-footer">
  <div class="row product-sticky-footer-expand-trigger-wrapper">
    <div class="product-sticky-footer-expand-trigger"></div>
  </div>

  <div class="product-sticky-footer-title">
    <div class="row">
      <h2>Learn More</h2>
    </div>
  </div>

  <div class="product-sticky-footer-wrapper">
    <div class="row">
      <?php if ($resource_posts) : ?>
        <div id="product-resources" class="tab-panel active">
          <ul class="product-resource-list">
            <?php foreach ($resource_posts as $post) : ?>
              <?php setup_postdata($post); ?>
              <li>
                <a href="<?php echo get_permalink($post->ID); ?>">
                  <div class="resource-thumb-wrap">
                    <?php
                      if (has_post_thumbnail($post->ID)) :
                        echo get_the_post_thumbnail($post->ID, 'thumbnail');
                      else :
                        $terms = get_the_terms($post->ID, 'resource-types');
                        if ($terms && ! is_wp_error($terms)) :
                          foreach ($terms as $term) :
                            $img = get_field('resource_type_image', $term);
                            $img_id = $img['id'];
                          endforeach;
                          echo wp_get_attachment_image($img_id, 'thumbnail');
                        endif;
                      endif;
                    ?>
                  </div>
                  <h3><?php echo get_the_title($post->ID); ?></h3>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
          <?php wp_reset_postdata(); ?>
        </div>
      <?php endif; ?>

      <?php if (have_rows('product_reviews')) : ?>
        <div id="product-reviews" class="tab-panel">
          <ul class="product-reviews-wrap">
            <?php while (have_rows('product_reviews')) : the_row();
              // Get sub-fields
              $title = get_sub_field('review_heading');
              $link = get_sub_field('review_link');
              $author = get_sub_field('review_author');
              $review = get_sub_field('review');
            ?>
              <li>
                <div class="review-title">
                  <h3><?php echo ($link) ? '<a href="' . $link . '" target="_blank">' : ''; ?><?php echo $title; ?><?php echo ($link) ? '</a>' : ''; ?></h3>
                </div>
                <div class="review-content">
                  <?php echo preg_replace('/<p>/', '<p>' . $author . ', ', $review, 1); ?>
                </div>
              </li>
            <?php endwhile; ?>
          </ul>
        </div>
      <?php endif; ?>

      <?php if ($related_posts) : ?>
        <div id="product-related" class="tab-panel">
          <ul>
            <?php foreach ($related_posts as $post) :
              setup_postdata($post);

              $blocks = parse_blocks($post->post_content);
              foreach ($blocks as $block) {
                  if ($block['blockName'] == 'acf/product-overview') {
                      $excerpt = $block['attrs']['data']['product_overview_excerpt'];
                      if (! $excerpt) {
                          $excerpt = wp_trim_words($block['attrs']['data']['product_overview'], 30);
                      }
                      break;
                  }
              }
            ?>
              <li>
                <h3><a href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a></h3>
                <?php if ($excerpt) : ?>
                  <p><?php echo $excerpt; ?></p>
                <?php endif; ?>
                <a href="<?php echo get_permalink($post->ID); ?>" class="button button-blue">Learn More</a>
              </li>
            <?php endforeach; ?>
          </ul>
          <?php wp_reset_postdata(); ?>
        </div>
      <?php endif; ?>

      <?php if ($case_studies_posts) : ?>
        <div id="product-case-studies" class="tab-panel">
          <ul>
            <?php foreach ($case_studies_posts as $post) : ?>
              <?php setup_postdata($post); ?>
              <li>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <?php
                  $excerpt = get_field('intro', $post->ID);
                  $excerpt = $excerpt ? $excerpt : the_excerpt();
                ?>
                  <p><?php echo $excerpt; ?></p>
                <a href="<?php the_permalink(); ?>" class="button button-blue">Read More</a>
              </li>
            <?php endforeach; ?>
          </ul>
          <?php wp_reset_postdata(); ?>
        </div>
      <?php endif; ?>

      <ul class="product-footer-tabs">
        <?php if ($resource_posts) : ?>
          <li rel="product-resources">View Resources</li>
        <?php endif; ?>
        <?php if (have_rows('product_reviews')) : ?>
          <li rel="product-reviews">View Product Reviews</li>
        <?php endif; ?>
        <?php if ($related_posts) : ?>
          <li rel="product-related">View Related Products</li>
        <?php endif; ?>
        <?php if ($case_studies_posts) : ?>
          <li rel="product-case-studies">View Case Studies</li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
  </div>
<?php elseif (is_admin()) : ?>
  <div id="product-sticky-footer" style="text-align: center; color: #888; font-weight: bold;">
		<div class="row">
      <div class="product-center-content""><p>Add content to sticky footer</p></div>
    </div>
  </div>
<?php endif; ?>
<?php
/**
 * Block Name: Partners
 *
 * This is the template that displays the About Us: Partners block.
 */
?>

<section id="partners">
  <div class="row">
    <div class="columns-12 column-center">
      <h2><?php the_field( 'heading' ); ?></h2>
      <?php if ( have_rows( 'partners' ) ): ?>
        <ul class="partners-logos">
          <?php while ( have_rows( 'partners' ) ) : the_row(); 

            $image = get_sub_field( 'partner_logo' );
          
          ?>
          <li>            
            <?php if ( $image ) : ?>
              <?php echo wp_get_attachment_image( $image['id'], 'medium' ); ?>
            <?php else : ?>
              <div class="image-placeholder"></div>
            <?php endif; ?>
          </li>
          <?php endwhile; ?>
        </ul>
      <?php endif; ?>
    </div>
  </div>
</section>

<section id="partners-callout">
  <div class="row">
    <div class="columns-12 column-center">
      <?php the_field( 'partners_callout' ) ?>
      <a class="button" href="<?php the_field( 'partners_link' ); ?>"><?php the_field( 'partners_button_label' ); ?></a>
    </div>
  <div>
</section>
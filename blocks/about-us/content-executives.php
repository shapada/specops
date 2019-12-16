<?php
/**
 * Block Name: Executives
 *
 * This is the template that displays the About Us: Executives block.
 */
?>

<section id="people">
  <div class="row">
    <div class="columns-12">

      <div class="people">
        <h2><?php the_field( 'heading' ) ?></h2>

        <?php if ( have_rows( 'executives' ) ): ?>
  
        <ul class="block-grid-3">

        <?php while( have_rows( 'executives' ) ): the_row(); 
        
          $image = get_sub_field( 'photo' );

        ?>

            <li class="person">
              <div class="image-wrap">
                <?php if ( $image ): ?>
                  <?php echo wp_get_attachment_image( $image['id'], 'about-head' ); ?>
                <?php endif; ?>
                <div class="overlay">
                  <span class="button bio-button">Read Bio</span>
                </div>
              </div>
              <div class="info-wrap">
                <h3><?php the_sub_field( 'name' ); ?></h3>
                <p class="job-title"><?php the_sub_field( 'title' ); ?></p>
              </div>

              <div class="bio-mask"></div>
              <div class="bio-modal">
                <div class="close">&times;</div>
                <?php if ( $image ): ?>
                  <div class="bio-img">
                    <?php echo wp_get_attachment_image( $image['id'], 'about-head' ); ?>
                  </div>
                <?php endif; ?>
                <h3><?php the_sub_field( 'name' ); ?></h3>
                <p class="job-title"><?php the_sub_field( 'title' ); ?></p>
                <div class="bio">
                  <?php the_sub_field( 'bio' ); ?>
                </div>
              </div>
            </li>
          <?php endwhile; ?>
        </ul>
        <?php endif; ?>
      </div>

    </div>

  </div>
</section>
<?php
/**
 * Block Name: Page Section
 *
 * This is the template that displays the Pillar Pages: Page Section block.
 */
?>

<?php
  // Content vars
  $title      = get_field('pillar_section_title');
  $lead_text  = get_field('pillar_lead_text_group');
  $body_text  = get_field('pillar_body_text');
  $pullquote  = get_field('pillar_pullquote');

  // Conditional vars
  $add_image     = get_field('pillar_add_image');
  $add_pullquote = get_field('pillar_add_pullquote');
  $show_on       = get_field('pillar_show_on');

  // Other vars
  $bg_color   = get_field('pillar_background_color');
  $menu_label = get_field('pillar_menu_label');
  $id = sanitize_title_with_dashes($menu_label);

  // Columns vars
  if ($add_image || $add_pullquote) {
      $main_col_class = 'columns-8';
      $side_col_class = 'columns-4';

      if ($show_on == 'left') {
          $main_col_class .= ' col-right';
          $side_col_class .= ' col-left';
      } else {
          $main_col_class .= ' col-left';
          $side_col_class .= ' col-right';
      }
  } else {
      $main_col_class = 'columns-8 column-center';
  }

?>

<section class="pillar-section <?php echo $bg_color; ?>" id="<?php echo $id; ?>">

  <div class="row">

    <div class="<?php echo $main_col_class; ?>">

      <?php if ($title) : ?>
      <h2><?php echo $title; ?></h2>
      <?php endif; ?>

      <?php if (have_rows('pillar_lead_text_group')) :

      while (have_rows('pillar_lead_text_group')) : the_row();

        // Vars
        $show_lead_text = get_sub_field('pillar_show_lead_text');
        $lead_text      = get_sub_field('pillar_lead_text');

      ?>

        <?php if ($show_lead_text && $lead_text) : ?>
        <div class="pillar-lead-text">
          <?php echo $lead_text; ?>
        </div>
        <?php endif; ?>

        <?php if ($body_text) : ?>
        <div class="pillar-body-text">
          <?php echo $body_text; ?>
        </div>
        <?php endif; ?>

      <?php endwhile; endif; ?>

    </div>

    <?php if ($add_image || $add_pullquote) : ?>
    <div class="<?php echo $side_col_class; ?> pillar-side-content">

      <?php if (have_rows('pillar_image_group')) :

      while (have_rows('pillar_image_group')) : the_row();

        // Vars
        $image       = get_sub_field('pillar_image');
        $image_link  = get_sub_field('pillar_image_link');

      ?>

        <?php if ($image) : ?>
        <div class="pillar-image">
          <?php if ($image_link) : ?>
          <a href="<?php echo $image_link; ?>">
          <?php endif; ?>
            <?php echo wp_get_attachment_image($image['id'], 'large'); ?>
          <?php if ($image_link) : ?>
          </a>
          <?php endif; ?>
        </div>
        <?php endif; ?>

      <?php endwhile; endif; ?>

      <?php if ($pullquote) : ?>
      <div class="pillar-pullquote">
        <?php echo $pullquote; ?>
      </div>
      <?php endif; ?>

    </div>
    <?php endif; ?>

  </div>

</section>
<?php
/**
* Block Name: Cards Section
*
* This is the template that displays the partner's card section blocks.
*/
$bg_color = get_field('background_color');
?>
<div class="cards" <?php echo ! empty($bg_color) ? 'style="background: ' . esc_attr($bg_color) . ';"' : ''; ?>>
    <div class="row"> 
        <div class="columns-12">		
            <?php if (have_rows('cards_section')): ?>
                <h2 class="section-title">
                    <?php echo esc_html(get_field('heading')); ?>
                </h2>
                <div class="row">
                    <?php while (have_rows('cards_section')) : the_row(); ?>
                        <div class="columns-4 card">
                            <?php if (get_sub_field('title')): ?>
                                <h3>
                                    <a href="<?php esc_url(the_sub_field('link_url')); ?>"> 
                                        <?php esc_html(the_sub_field('title')); ?>
                                    </a>
                                </h3>
                            <?php endif; ?>
                            <?php if (get_sub_field('content')): ?>
                                <p>
                                    <?php esc_html(the_sub_field('content')); ?>
                                </p>
                            <?php endif; ?>
                            <?php if (get_sub_field('link_url') && get_sub_field('link_text')): ?>
                                <a href="<?php esc_url(the_sub_field('link_url')); ?>" class="card-link-url">
                                    <?php esc_html(the_sub_field('link_text')); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
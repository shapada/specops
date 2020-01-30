<?php
/**
 * Block Name: Product Overview
 *
 * This is the template that displays the Product Overview block.
 */
?>


<div id="product-banner">
	<?php
        // Get product banner fields
        $title = get_field('product_overview_headline');
        $overview = get_field('product_overview');
        $btn_show = get_field('show_product_button');
        $custom_btn_label = get_field('product_overview_button_label');
        $custom_btn_link = get_field('product_overview_button_link');
        $screenshot = get_field('product_overview_screenshot');
    ?>

	<div class="row">
		<div class="product-banner-text">
			<h1>
        <?php if ($title) {
        echo $title;
    } elseif (get_the_title()) {
        echo get_the_title();
    } else {
        if (is_admin() && function_exists('acf_maybe_get_POST')) {
            $acf_title = get_the_title(intval(acf_maybe_get_POST('post_id')));
            if ($acf_title) {
                echo $acf_title;
            } else {
                echo 'Headline';
            }
        }
    }
        ?>
      </h1>
      <?php if ($overview) {
            echo $overview;
        } elseif (is_admin() && ! $overview) {
            echo '<p>Add an introductory paragraph. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in tellus tortor. Nam gravida ex eget enim condimentum, in semper neque pharetra. Integer finibus, lacus ac fringilla varius, ipsum eros gravida lacus, sit amet ullamcorper odio risus a augue. Ut in nibh nec orci egestas vehicula nec posuere est.</p>';
        } ?>
			<?php if ($btn_show) : ?>
			  <a class="button" href="<?php echo ($custom_btn_link) ? $custom_btn_link : '#tryfree'; ?>">
          <?php echo ($custom_btn_label) ? $custom_btn_label : 'Try It For Free!'; ?>
        </a>
      <?php endif; ?>
		</div>

		<div class="product-banner-image">
			<div class="laptop-wrap">
				<?php echo wp_get_attachment_image($screenshot['id'], 'full'); ?>
			</div>
		</div>
	</div>
</div>
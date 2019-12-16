<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="summary-height">
        <?php
            /**
             * woocommerce_before_single_product_summary hook
             *
             * @hooked woocommerce_show_product_sale_flash - 10
             * @hooked woocommerce_show_product_images - 20
             */
    //		//----------This is the video--------------
    //		do_action( 'woocommerce_before_single_product_summary' );

            $sale_callout = get_field( 'sale_callout_image' );

            if ( !empty( $sale_callout ) ):
        ?>
        <style>
            .single-product .summary-height > .row > .columns-6::after
            {
                background-image: url(<?php echo $sale_callout; ?>);
            }
        </style>
        <?php endif; ?>

        <div class="summary entry-summary row">
    <!--        <span class="ti-min-form-height">-->
            <?php
                /**
                 * woocommerce_single_product_summary hook
                 *
                 * @hooked woocommerce_template_single_title - 5
                 * @hooked woocommerce_template_single_rating - 10
                 * @hooked woocommerce_template_single_price - 10
                 * @hooked woocommerce_template_single_excerpt - 20
                 * @hooked woocommerce_template_single_add_to_cart - 30
                 * @hooked woocommerce_template_single_meta - 40
                 * @hooked woocommerce_template_single_sharing - 50
                 */
                //---------Product Summary---------------
                do_action( 'woocommerce_single_product_summary' );
//                do_action( 'woocommerce_single_product_forms');
            ?>
            <div id="theForm" class="ti-columns-6 ti-pull-right">
                <?php
                    echo the_field('form_field');

                ?>
            </div>
        </div>
    <!--        </span>-->

            <?php

            ?>

        </div><!-- .summary -->
        <div>
        <?php
            /**
             * woocommerce_after_single_product_summary hook
             *
             * @hooked woocommerce_output_product_data_tabs - 10
             * @hooked woocommerce_upsell_display - 15
             * @hooked woocommerce_output_related_products - 20
             */
            //------------Tabs and their content------------
            do_action( 'woocommerce_after_single_product_summary' );
        ?>

        <meta itemprop="url" content="<?php the_permalink(); ?>" />
        </div>
    </div>
</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>

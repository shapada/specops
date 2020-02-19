<?php
/**
 * Single Product title
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<div class="product-summary">
	<div class="product-summary-wrapper">
		<h1 itemprop="name" class="product_title entry-title"><?php the_title(); ?></h1>
		<?php if(get_field('intro', get_queried_object())): ?>
			<p><?php the_field('intro', get_queried_object()); ?></p>
		<?php endif; ?>
    </div>

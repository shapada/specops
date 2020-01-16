<?php
/**
 * Single product short description
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

//if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post;
var_dump($post);

//if ( ! $post->post_excerpt ) return;
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="columns-6 pull-right">
	<?php echo the_field('form_field');  echo "MIKES TEST";  ?>
</div>
<?php endwhile; ?>
<?php endif; ?>

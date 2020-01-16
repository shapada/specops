<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Forge Saas
 */
?>
	<aside id="secondary" class="columns-4 widget-area" role="complementary">
		
		<div class="panel">
		<?php do_action('before_sidebar'); ?>
		<?php if (! dynamic_sidebar('sidebar-main')) : ?>

			<div id="search" class="widget widget_search">
				<?php get_search_form(); ?>
			</div>

			<div id="archives" class="widget">
				<h1 class="widget-title"><?php _e('Archives', 'forge_saas'); ?></h1>
				<ul>
					<?php wp_get_archives(array( 'type' => 'monthly' )); ?>
				</ul>
			</div>

			<div id="meta" class="widget">
				<h1 class="widget-title"><?php _e('Meta', 'forge_saas'); ?></h1>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</div>

		<?php endif; // end sidebar widget area?>
		</div>
		
	</aside><!-- #secondary -->

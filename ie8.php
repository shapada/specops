<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?> >

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php wp_title('|', true, 'right'); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>


	<div id="masthead" class="site-header panel" role="banner">
		
		<div class="row">
	
			<div class="columns-6 site-branding">
				<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
					<img src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="site logo" />
				</a>
			</div>

		</div>

	</div>

	<div id="main" class="site-main">

		<div class="row content-area">

			<div id="content" class="columns-12 site-content" role="main">

				<div id="post-<?php the_ID(); ?>">

					<div class="entry-header">
						
						<h1 class="entry-title"><?php _e('Not Supported', 'anvil'); ?></h1>
					
					</div><!-- .entry-header -->

					<div class="entry-content">
					
						<p><?php _e('I\'m sorry but your browser doesn\'t support this site!', 'anvil'); ?></p>

						<p><?php printf(__('Please <a href="%1$s" target="_blank" rel="nofollow">Upgrade</a> your browser.', 'anvil'), 'https://browser-update.org/update.html'); ?></p>

					</div><!-- .entry-content -->

				</div><!-- #post-## -->

			</div>

		</div>

	</div><!-- #main -->

	<div class="site-footer" role="contentinfo">
		
		<div class="row">
		
			<div class="columns-12 site-info text-center">

				<p><small>&copy; <?php echo date('Y'); ?> Forge and Smith. All rights reserved. Design and development by <a href="http://forgeandsmith.com/">Forge and Smith</a>.</small></p>
				
			</div><!-- .site-info -->

		</div>

	</div><!-- #colophon -->

<?php wp_footer(); ?>
</body>
</html>

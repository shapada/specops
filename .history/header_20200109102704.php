<!DOCTYPE html>
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if IE 8]> 				 <html class="no-js lt-ie9" <?php language_attributes(); ?> > <![endif]-->
<!--[if IE 9]> 				 <html class="no-js lt-ie10" <?php language_attributes(); ?> > <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title><?php wp_title('|', true, 'right'); ?></title>
<link rel="profile" href="//gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />

<link href="<?php echo get_stylesheet_directory_uri(); ?>/Phone_icon.png" rel="apple-touch-icon" />
<link href="<?php echo get_stylesheet_directory_uri(); ?>/Phone_icon.png" rel="apple-touch-icon" sizes="120x120" />

<!-- Code snippet to speed up Google Fonts rendering: googlefonts.3perf.com -->
<link rel="dns-prefetch" href="https://fonts.gstatic.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
<link rel="preload" href="https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,7000" as="fetch" crossorigin="anonymous">
<script type="text/javascript">
!function(e,n,t){"use strict";var o="https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,7000",r="__3perf_googleFontsStylesheet";function c(e){(n.head||n.body).appendChild(e)}function a(){var e=n.createElement("link");e.href=o,e.rel="stylesheet",c(e)}function f(e){if(!n.getElementById(r)){var t=n.createElement("style");t.id=r,c(t)}n.getElementById(r).innerHTML=e}e.FontFace&&e.FontFace.prototype.hasOwnProperty("display")?(t[r]&&f(t[r]),fetch(o).then(function(e){return e.text()}).then(function(e){return e.replace(/@font-face {/g,"@font-face{font-display:swap;")}).then(function(e){return t[r]=e}).then(f).catch(a)):a()}(window,document,localStorage);
</script>
<!-- End of code snippet for Google Fonts -->

<?php wp_head(); ?>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KVK69XW');</script>
<!-- End Google Tag Manager -->

</head>

<body <?php body_class(); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KVK69XW"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

	<header class="top-banner">

		<div class="row">

			<div class="columns-12">

				<?php if (get_field('top_bar_text', 'options')): ?>

					<span class="top-bar-tagline"><?php the_field('top_bar_text', 'options'); ?></span>

				<?php endif; ?>
				
			</div>

		</div>

	</header>

	<header id="masthead" class="site-header panel" role="banner">

		<div class="row">

			<div class="columns-4 site-branding">
				<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
					<img src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="site logo" />
				</a>
			</div>

			<div id="site-navigation" class="columns-8 navigation-main" role="navigation">

				<?php wp_nav_menu(array( 'theme_location' => 'primary', 'items_wrap' => '<ul id="main-nav" class="nav menu dropmenu">%3$s</ul>' )); ?>

				<a href="#" class="fs-mobile-trigger burger-trigger">
					<span></span>
					<span></span>
					<span></span>
				</a>

			</div><!-- #site-navigation -->

		</div>

	</header><!-- #masthead -->

	<section id="main" class="site-main">

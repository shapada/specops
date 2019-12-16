<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the id=main div and all content after
 */
?>

	</section><!-- #main -->
	<?php if(is_page_template('pages/_about.php')): ?>
		<?php get_template_part( 'templates/footer', 'blocks-career' ); ?>
	<?php elseif(is_tax('support-types') || is_singular('support') || is_page_template('pages/_support-dev.php') ): ?>
		<?php get_template_part( 'templates/footer', 'support' ); ?>
	<?php elseif(is_page('products')||is_singular('product')|| is_front_page()|| is_page('case-studies')||is_singular('case-studies')): ?>
		<?php get_template_part( 'templates/footer', 'blocks' ); ?>
	<?php endif; ?>
	<?php if(!(is_tax('support-types') || !(is_singular('support')) || !(is_page_template('pages/_about.php')) )): ?>
		<?php get_template_part( 'templates/footer', 'get-in' ); ?>
	<?php endif; ?>

	<div class="site-footer" role="contentinfo">

		<div class="row">


			<div class="columns-12">

				<?php wp_nav_menu( array( 'theme_location' => 'footer', 'items_wrap' => '<ul id="footer-nav" class="nav menu">%3$s</ul>' ) ); ?>
			</div>

			<?php /*
			<div class="columns-4 newsletter">
				<h4><?php _e('Newsletter Sign Up', 'anvil'); ?></h4>
				<p><?php the_field('footer_newsletter', 'options'); ?></p>
			</div>
			<div class="columns-6">

				<?php gravity_form( 4, false, false, false, null, true ); ?>

			</div>

			*/ ?>



			<div class="columns-12 social-wrapper">

				<?php if(have_rows('social_media', 'options')): ?>

					<ul class="social-menu menu">

						<?php while(have_rows('social_media', 'options')): the_row(); ?>

							<li><a class="ss-icon ss-social-regular <?php the_sub_field('social_media'); ?>" target="_blank" href="<?php the_sub_field('social_media_link', 'options'); ?>"><?php the_sub_field('social_media'); ?></a></li>

						<?php endwhile;?>

					</ul>

				<?php endif; ?>

			</div>

		</div>
	<?php if (
		is_front_page() ||
		is_page( 'contact-us' ) ||
		is_page( 'resources' ) ||
		is_tax( 'resource-types' ) ||
		is_singular('resources') ||
		is_page( 'products' ) ||
		is_singular( 'product' ) ||
		is_page_template( 'pages/_landing.php' ) ||
		is_page_template( 'pages/_case-studies.php' )
	) : ?>

	<?php endif; ?>
	</div><!-- #colophon -->

	<div class="columns-12 site-info text-center">
		<p>
			<small>
				&copy; <?php echo date('Y'); ?> <?php _e('Specops Software. All rights reserved.', 'anvil'); ?>

				<a href="<?php echo get_permalink(2068);?>"><?php echo get_the_title(2068);?></a>
				<br>
				
		</p>

	</div><!-- .site-info -->
<?php wp_footer(); ?>

	<?php if ( is_front_page() ) : ?>
		<script type="application/ld+json">
			{
			"@context": "https://schema.org",
			"@type": "Organization",
			"url": "https://specopssoft.com",
			"logo": "https://specopssoft.com/wp-content/uploads/2019/10/spec-square.png",
			"contactPoint": [{
				"@type": "ContactPoint",
				"telephone": "+46-8-465 012 34",
				"contactType": "sales",
				"availableLanguage": [
					"English",
					"Swedish",
					"German"
				]
			},{
				"@type": "ContactPoint",
				"telephone": "+46-8-465 012 50",
				"contactType": "technical support",
				"availableLanguage": [
					"English",
					"Swedish",
					"German"
				]
			},{
				"@type": "ContactPoint",
				"telephone": "+44 (0)203 002 1877",
				"contactType": [
					"sales",
					"technical support"
				],
				"areaServed": [
					"UK",
					"IE"
				],
				"availableLanguage": "English"
			},{
				"@type": "ContactPoint",
				"telephone": "+1-877-773-2677",
				"contactType": [
					"sales",
					"technical support"
				],
				"contactOption": "TollFree",
				"areaServed": [
					"US",
					"CA",
					"AU",
					"NZ"
				],
				"availableLanguage": "English"
			},{
				"@type": "ContactPoint",
				"telephone": "+1-416-849-5325",
				"contactType": [
					"sales",
					"technical support"
				],
				"areaServed": [
					"US",
					"CA",
					"AU",
					"NZ"
				],
				"availableLanguage": "English"
			}]
		}
		</script>
	<?php endif; ?>
</body>
</html>

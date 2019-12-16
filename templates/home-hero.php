<?php
	function getCTAColor($backgroundImageLabel, $secondCTA = false) {
		switch($backgroundImageLabel) {
			case 'blue-triangle':
			case 'circuit':
			case 'space':
			case 'red-waves':
				if($secondCTA) {
					return 'ti-white-outline-cta';
				}
				return 'ti-yellow-cta-button';
			break;
			case 'green-triangle':
			case 'light-poly':
			case 'cloud':
				if($secondCTA) {
					return 'ti-black-outline-cta';
				}
				return 'ti-black-cta-button';
			break;
			default:
				return '';
			break;
		}
	}
	function getTextColor($backgroundImageLabel) {
		switch($backgroundImageLabel) {
			case 'blue-triangle':
			case 'circuit':
			case 'space':
			case 'red-waves':
				return '#fff';
			break;
			case 'green-triangle':
			case 'light-poly':
			case 'cloud':
				return '#000';
			break;
			default:
				return '';
			break;
		}
	}
	function getBackgroundUrl($backgroundImageLabel) {
		switch($backgroundImageLabel) {
			case 'blue-triangle':
				return 'https://specopssoft.com/wp-content/uploads/2018/05/spec-blue-triangles.png';
			break;
			case 'circuit':
				return 'https://specopssoft.com/wp-content/uploads/2018/05/spec-gradient-blue-circuit.png';
			break;
			case 'cloud':
				return 'https://specopssoft.com/wp-content/uploads/2018/05/spec-clouds2.png';
			break;
			case 'green-triangle':
				return 'https://specopssoft.com/wp-content/uploads/2018/05/spec-green-triangles.png';
			break;
			case 'light-poly':
				return 'https://specopssoft.com/wp-content/uploads/2018/05/spec-light-gradient-polygon3.png';
			break;
			case 'red-waves':
				return 'https://specopssoft.com/wp-content/uploads/2018/05/spec-red-waves.png';
			break;
			case 'space':
				return 'https://specopssoft.com/wp-content/uploads/2018/05/spec-space.png';
			break;
			default:
				return 'Error';
			break;
		}
	}

	$backgroundImageLabel = get_field('hero_background_image', 'option');
	$backgroundImage = getBackgroundUrl($backgroundImageLabel);
	$imagePosition = get_field('image_position', 'option');
	$imageUrl = get_field('hero_image', 'option');
	$headerText = get_field('header_text', 'option');
	$headerTextColor = get_field('header_text_color', 'option');
	$headerTextFontStyle = get_field('header_text_font', 'option');
	$headerTextSize = get_field('header_text_size', 'option') . 'px';
	$headerMobileTextSize = get_field('header_mobile_text_size', 'option') . 'px';
	$bodyText = get_field('header_body', 'option');
	$bodyTextColor = get_field('body_text_color', 'option');
	$bodyTextSize = get_field('body_text_size', 'option') . 'px';
	$bodyMobileTextSize = get_field('body_mobile_text_size', 'option') . 'px';
	$numberOfCTAs = get_field('cta_number', 'option');
	$firstCTAText = get_field('cta_text', 'option');
	$firstCTALink = get_field('cta_link', 'option');
	$firstCTAColor = get_field('banner_first_cta_color', 'option');
	$firstCTATextColor = get_field('banner_first_cta_text_color', 'option');
	$textColor = getTextColor($backgroundImageLabel);

	if($numberOfCTAs == "Two") {
		$secondCTAText = get_field('second_cta_text', 'option');
		$secondCTALink = get_field('second_cta_link', 'option');
		$secondCTAColor = get_field('banner_second_cta_color', 'option');
		$secondCTATextColor = get_field('banner_second_cta_text_color', 'option');
		$secondCTAIsInBanner = get_field('second_cta_in_banner', 'option');
		if($secondCTAIsInBanner) {
			$secondCTABannerBackgroundColor = get_field('second_cta_banner_background_color', 'option');
			$secondCTABannerText = get_field('second_cta_banner_text', 'option');
			$secondBannerTextColor = get_field('second_banner_text_color', 'option');
		}
	}

	$headerFont = '';
	if(is_front_page()) {
		switch(get_field('header_text_font', 'option')) {
			case 'Roboto Condensed':
				$headerFont = 'Roboto Condensed';
			break;
			case 'Roboto Slab':
				$headerFont = 'Roboto Slab';
			break;
			case 'Roboto Mono':
				$headerFont = 'Roboto Mono';
			break;
			default:
				$headerFont = 'Roboto';
			break;
		}
	}
	
?>
<style>
	.homepage-hero-new {
		padding: 40px 0;
	}
	.homepage-hero-new img {
		width: auto;
	}
	@media screen and (max-width: 1050px) {
		.homepage-hero-new img {
			display: none;
		}
	}
	.ti-hero-sub-banner {
		padding: 20px 0;
	}
	.homepage-hero-new h2 {
		line-height: 1.25em;
	}
	.homepage-hero-new p,
	.ti-hero-sub-banner p {
		padding: 0;
	}
	.ti-hero-sub-banner p {
		font-size: 1.5em;
	}
	.homepage-hero-new a,
	.ti-hero-sub-banner a,
	.homepage-hero-new a:hover,
	.ti-hero-sub-banner a,
	.ti-hero-sub-banner a:hover, {
		text-decoration: none;
	}
	.ti-yellow-cta-button,
	.ti-yellow-cta-button:hover,
	.ti-yellow-cta-button:active,
	.ti-yellow-cta-button:focus {
		background: #d1db2d;
		color: #000;
	}
	.ti-black-cta-button,
	.ti-black-cta-button:hover,
	.ti-black-cta-button:active
	.ti-black-cta-button:focus {
		background: #000;
		color: #fff;
	}
	.ti-yellow-cta-button,
	.ti-black-cta-button,
	.ti-hero-sub-banner a,
	.ti-white-outline-cta,
	.ti-black-outline-cta {
		padding: 15px 20px;
		border-radius: 4px;
		font-weight: bold;
		margin-top: 15px;
		display: inline-block;
		text-decoration: none;
	}
	.ti-hero-sub-banner a {
		margin-top: 0;
	}
	.ti-hero-sub-banner p {
		min-height: 40px;
		line-height: 40px;
	}
	.ti-hero-sub-banner a:hover {
		color: inherit;
	}
	.ti-white-outline-cta {
		border: 1px solid #fff;
		color: #fff;
		background: transparent;
	}
	.ti-white-outline-cta:hover,
	.ti-white-outline-cta:active,
	.ti-white-outline-cta:focus {
		color: #fff;
	}
	.ti-black-outline-cta {
		border: 1px solid #000;
		color: #000;
		background: transparent;
	}
	.ti-black-outline-cta:hover,
	.ti-black-outline-cta:active,
	.ti-black-outline-cta:focus {
		color: #000;
	}
	.ti-center-text h2,
	.ti-center-text p,
	.ti-center-text a,
	.ti-center-text div {
		text-align: center;
	}
	.ti-yellow-cta-button,
	.ti-black-cta-button,
	.ti-white-outline-cta,
	.ti-black-outline-cta,
	.secondary-cta a,
	.ti-hero-sub-banner a {
		line-height: 48px;
		padding-top: 0;
		padding-bottom: 0;
		height: 48px;
		vertical-align: bottom;
		-webkit-transition: opacity 0.3s;
		transition: opacity 0.3s;
	}
	.ti-yellow-cta-button:hover,
	.ti-black-cta-button:hover,
	.ti-white-outline-cta:hover,
	.ti-black-outline-cta:hover,
	.secondary-cta a:hover {
		opacity: 0.65;
	}
	.ti-hero-sub-banner > .row {
		text-align: center;
	}
	.ti-hero-sub-banner > .row > div {
		display: inline-block;
		float: none;
		width: auto;
		vertical-align: middle;
	}
	@media screen and (min-width: 1051px) {
		.homepage-hero > .row.hero-row {
			display: table;
		}
		.homepage-hero > .row.hero-row > div {
			float: none;
			display: table-cell;
			vertical-align: middle;
		}

	}
	@media screen and (max-width: 767px) {
		.homepage-hero h2 {
			font-size: <?php echo $headerMobileTextSize; ?> !important;
		}
		.homepage-hero p {
			font-size: <?php echo $bodyMobileTextSize; ?> !important;
		}
	}
</style>
<div class="homepage-hero homepage-hero-new" style="background: url(<?php echo $backgroundImage; ?>);">

	<div class="row hero-row">
		<?php if($imagePosition != "None") : ?>
			<div class="columns-6">
				<?php if($imagePosition == "Right") : ?>
					<h2 style="color: <?php echo $headerTextColor; ?>; font-size: <?php echo $headerTextSize; ?>; font-family: '<?php echo $headerFont; ?>', sans-serif;"><?php echo $headerText; ?></h2>
					<p style="color: <?php echo ($bodyTextColor ? $bodyTextColor : $textColor); ?>; <?php echo ($bodyTextSize ? 'font-size: ' . $bodyTextSize . ';' : ''); ?>"><?php echo $bodyText; ?></p>
					<div>
						<a class="<?php echo getCTAColor($backgroundImageLabel); ?>" href="<?php echo $firstCTALink; ?>" style="<?php echo ($firstCTATextColor ? 'color: ' . $firstCTATextColor . '; ' : ''); echo ($firstCTAColor ? 'background: ' . $firstCTAColor . ';' : ''); ?>"><?php echo $firstCTAText; ?></a>
						<?php if($numberOfCTAs == "Two" && !$secondCTAIsInBanner) : ?>
						<a class="<?php echo getCTAColor($backgroundImageLabel, true); ?>" href="<?php echo $secondCTALink; ?>" style="<?php echo ($secondCTATextColor ? 'color: ' . $secondCTATextColor . '; ' : ''); echo ($secondCTAColor ? 'background: ' . $secondCTAColor . '; border-color: ' . $secondCTAColor . ';' : ''); ?>"><?php echo $secondCTAText; ?></a>
						<?php endif; ?>
					</div>
				<?php else : ?>
					<img src="<?php echo $imageUrl; ?>">
				<?php endif; ?>
			</div>
			<div class="columns-6">
				<?php if($imagePosition == "Left") : ?>
					<h2 style="color: <?php echo $headerTextColor; ?>; font-size: <?php echo $headerTextSize; ?>; font-family: '<?php echo $headerFont; ?>', sans-serif;"><?php echo $headerText; ?></h2>
					<p style="color: <?php echo ($bodyTextColor ? $bodyTextColor : $textColor); ?>; <?php echo ($bodyTextSize ? 'font-size: ' . $bodyTextSize . ';' : ''); ?>"><?php echo $bodyText; ?></p>
					<div>
						<a class="<?php echo getCTAColor($backgroundImageLabel); ?>" href="<?php echo $firstCTALink; ?>" style="<?php echo ($firstCTATextColor ? 'color: ' . $firstCTATextColor . '; ' : ''); echo ($firstCTAColor ? 'background: ' . $firstCTAColor . ';' : ''); ?>"><?php echo $firstCTAText; ?></a>
						<?php if($numberOfCTAs == "Two" && !$secondCTAIsInBanner) : ?>
						<a class="<?php echo getCTAColor($backgroundImageLabel, true); ?>" href="<?php echo $secondCTALink; ?>" style="<?php echo ($secondCTATextColor ? 'color: ' . $secondCTATextColor . '; ' : ''); echo ($secondCTAColor ? 'background: ' . $secondCTAColor . '; border-color: ' . $secondCTAColor . ';' : ''); ?>"><?php echo $secondCTAText; ?></a>
						<?php endif; ?>
					</div>
				<?php else : ?>
					<img src="<?php echo $imageUrl; ?>">
				<?php endif; ?>
			</div>
		<?php else : ?>
		<!-- No image, centered text -->
			<div class="columns-12 ti-center-text">
				<h2 style="color: <?php echo $headerTextColor; ?>; font-size: <?php echo $headerTextSize; ?>; font-family: '<?php echo $headerFont; ?>', sans-serif;"><?php echo $headerText; ?></h2>
				<p style="color: <?php echo ($bodyTextColor ? $bodyTextColor : $textColor); ?>; <?php echo ($bodyTextSize ? 'font-size: ' . $bodyTextSize . ';' : ''); ?>"><?php echo $bodyText; ?></p>
				<div>
					<a class="<?php echo getCTAColor($backgroundImageLabel); ?>" href="<?php echo $firstCTALink; ?>" style="<?php echo ($firstCTATextColor ? 'color: ' . $firstCTATextColor . '; ' : ''); echo ($firstCTAColor ? 'background: ' . $firstCTAColor . ';' : ''); ?>"><?php echo $firstCTAText; ?></a>
					<?php if($numberOfCTAs == "Two" && !$secondCTAIsInBanner) : ?>
					<a class="<?php echo getCTAColor($backgroundImageLabel, true); ?>" href="<?php echo $secondCTALink; ?>" style="<?php echo ($secondCTATextColor ? 'color: ' . $secondCTATextColor . '; ' : ''); echo ($secondCTAColor ? 'background: ' . $secondCTAColor . '; border-color: ' . $secondCTAColor . ';' : ''); ?>"><?php echo $secondCTAText; ?></a>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>
<?php if($numberOfCTAs = "Two" && $secondCTAIsInBanner) : ?>
<div class="ti-hero-sub-banner" style="background: <?php echo $secondCTABannerBackgroundColor; ?>;">
	<div class="row">
		<div class="columns-8">
			<p style="color: <?php echo $secondBannerTextColor; ?>;"><?php echo $secondCTABannerText; ?></p>
		</div>
		<div class="columns-4">
			<a class="<?php echo getCTAColor($backgroundImageLabel, true); ?>" href="<?php echo $secondCTALink; ?>" style="<?php echo ($secondCTATextColor ? 'color: ' . $secondCTATextColor . '; ' : ''); echo ($secondCTAColor ? 'background: ' . $secondCTAColor . '; border-color: ' . $secondCTAColor . ';' : ''); ?>"><?php echo $secondCTAText; ?></a>
		</div>
	</div>
</div>
<?php endif;?>
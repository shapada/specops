	<?php


		if( has_term( 'datasheets', 'resource-types' ) ) {
			get_template_part( 'templates/content', 'single-resource-banner' );
		} else {




		$hasBanner = true;
		$bannerTitle = '';
		$bannerContent = '';
		$background = "background: #115071;";
		$pStyle = '';
		$hStyle = '';
		$padding = "40px 0 30px";
		$isBlogPage = false;
		switch($post->post_title) {
			case "Case Studies":
				$bannerTitle = get_field('banner_title_case', 'option');
				$bannerContent = get_field('banner_text_case', 'option');
			break;
			case "Products":
				// var_dump(strpos($_SERVER['REQUEST_URI'], 'product-category'));
				if(strpos($_SERVER['REQUEST_URI'], 'products') !== false) {
					$bannerTitle = get_field('banner_title_product', 'option');
					$bannerContent = get_field('banner_text_product', 'option');
				}else {
					$hasBanner = false;
				}
			break;
			case "Resources":
				$bannerTitle = get_field('banner_title_resources', 'option');
				$bannerContent = get_field('banner_text_resources', 'option');
			break;
			case "Support":
				$bannerTitle = get_field('banner_title_support', 'option');
				$bannerContent = get_field('banner_text_support', 'option');
			break;
			case "Contact Us":
				$bannerTitle = get_field('banner_title_contact', 'option');
				$bannerContent = get_field('banner_text_contact', 'option');
			break;
			case "Careers":
				$bannerTitle = get_field('banner_title_careers', 'option');
				$bannerContent = get_field('banner_text_careers', 'option');
			break;
			case "About":
				$bannerTitle = get_field('banner_title_about', 'option');
				$bannerContent = get_field('banner_text_about', 'option');
			break;
			case "Our Partnerships":
				$bannerTitle = get_field( 'banner_title_partners', 'option' );
				$bannerContent = get_field( 'banner_text_partners', 'option' );
				break;
			default:
				if($post->post_type == "case-studies") {
					$bannerTitle = get_the_title();
					$bannerContent = get_field('intro');
					break;
				}
				if(strpos($_SERVER['REQUEST_URI'], 'products') !== false) {
					$bannerTitle = get_field('banner_title_product', 'option');
					$bannerContent = get_field('banner_text_product', 'option');
					break;
				}
				if(strrpos($_SERVER['REQUEST_URI'],"/blog/") !== false) {
					$isBlogPage = true;
					break;
				}
				$hasBanner = false;

			break;
		}
	?>

	<?php if( !$titles ) $titles = get_the_title(); ?>


<?php if($hasBanner) : ?>
	<?php if(!$isBlogPage) : ?>
	<div class="page-banner" style="<?php echo $background; ?> padding: <?php echo $padding; ?>;">
		<div class="row">
			<div class="columns-10 column-center text-center banner-col">

				<h1 style="padding-bottom: 10px;<?php echo $hStyle; ?>"><?php echo $bannerTitle; ?></h1>
				<p style="<?php echo $pStyle; ?>"><?php echo $bannerContent; ?></p>

			</div>
		</div>
	</div>
	<?php endif; ?>
<?php else: ?>
	<?php if ($post->post_type != "resources" && $_SERVER['REQUEST_URI'] != "/blog/") : ?>
		<div class="ti-top-spacer" style="padding-top: 50px;"></div>
	<?php endif; ?>
<?php endif;

	}

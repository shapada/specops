<?php
/*
 * Template Name: Pillar Page
 */
?>

<?php get_header(); ?>

<div class="pillar-page">

<?php

// Vars
$show_menu    = get_field('pillar_show_submenu');
$show_modal   = get_field('pillar_show_modal');

$cta = get_field('pillar_cta_group');
$button_label = $cta['pillar_button_label'];
$button_url = $cta['pillar_button_link']['url'];
$modal_title = $cta['pillar_modal_title'];

$menu_items = [];
$blocks = parse_blocks(get_the_content());
$content = '';
$i = 0;
$j = 0;

foreach ($blocks as $block) {
    if (($i !== 0) && ($block['blockName'] === 'acf/pillar-page-section')) {
        $menu_label = $block['attrs']['data']['pillar_menu_label'];
        $menu_link = sanitize_title_with_dashes($menu_label);

        if ($menu_label) {
            array_push($menu_items, array( 'label' => $menu_label, 'link' => $menu_link ));
        }
    }
    
    $i++;
}

ob_start(); ?>

<nav class="pillar-menu">
<div class="row">
	<progress value="0"></progress>
	<div class="columns-12">

		<span class="pillar-menu-trigger">
			<span class="burger-trigger burger-trigger-small">
				<span></span>
				<span></span>
				<span></span>
			</span>
			Topics
		</span>

		<div class="pillar-menu-list-wrap">
			<ul>
				<?php foreach ($menu_items as $menu_item) : ?>
					<li><a href="#<?php echo $menu_item['link']; ?>"><?php echo $menu_item['label']; ?></a></li>
				<?php endforeach; ?>
			</ul>
			<a class="button" href="<?php echo $button_url; ?>"><?php echo $button_label; ?></a>
		</div>
	</div>
</div>
</nav>

<?php

$menu = ob_get_clean();

foreach ($blocks as $block) {
    if (($j === 0) && ($blocks[0]['blockName'] === 'acf/pillar-page-section') && $show_menu) {
        $content .= str_replace(array( '<h2>', '</h2>', 'id=""' ), array( '<h1>', '</h1>', 'id="first-section"' ), render_block($block));
        $content .= $menu;
    } else {
        $content .= render_block($block);
    }

    $j++;
}

echo $content;

?>

</div>

<?php if ($show_modal) : ?>
	<div class="pillar-modal">
		<div class="row">
		<div class="columns-12">
			<div class="close"><span>&times;</span> Close</div>
			<h2>Interested in learning more about <strong><?php echo $modal_title; ?>?</strong></h2>
			<a class="button" href="<?php echo $button_url; ?>"><?php echo $button_label; ?></a>
			<span class="no-thanks">No, thank you.</span>
		</div>
		</div>
	</div>
<?php endif ;?>

<?php get_footer(); ?>

<?php
/**
 * The support single file.
 */
get_header(); ?>
	<?php get_template_part('templates/page', 'banner'); ?>
	<div class="cpt-search">
		<div class="row">
			<div class="columns-4">
				<div class="sidebar-inner">
					<?php get_template_part('templates/content', 'support-sidebar'); ?>
				</div>
			</div>
			<div class="columns-8" id="content">
				<?php while (have_posts()) : the_post(); ?>
						<?php $terms = get_the_terms(get_queried_object(), 'support-types');  ?>
					<h2><?php the_title(); ?></h2>
					<h6>Posted in</h6>
					<?php foreach ($terms as $term): ?>
					<?php $link = get_term_link($term); ?>
						<a href="<?php echo $link; ?>" class="support-topics"><?php echo $term->name; ?></a>
					<?php endforeach; ?>
					<?php the_content(); ?>

					<?php if (get_field('has_pdf')): ?>
						<div class="pdf-wrapper">
							<a href="<?php the_field('pdf_file'); ?>" target="_blank" class="button"><?php _e('Download PDF', 'anvil'); ?></a>
						</div>
					<?php endif; ?>

					<?php if (get_field('google_doc_id')) :?>
						<?php
                            $g_doc_id = get_field('google_doc_id');
                            $g_doc_type = get_field('google_doc_type');
                            $g_doc_format = get_field('google_document_formats')? get_field('google_document_formats') : get_field('google_spreadsheet_formats');

                            $g_doc_sheet_embed_src = '';

                            if ($g_doc_type === "document") {
                                $g_doc_sheet_embed_src = "https://docs.google.com/" . $g_doc_type . "/d/". $g_doc_id ."/pub?embedded=true";
                            } else {
                                $g_doc_sheet_embed_src = "https://docs.google.com/" . $g_doc_type . "/d/". $g_doc_id ."/pubhtml?widget=true&amp;headers=false";
                            }
                        ?>
						<div class="google-docs-embed">

							<iframe src="<?php echo $g_doc_sheet_embed_src; ?>"></iframe>

							<p>
								<a href="https://docs.google.com/<?php echo $g_doc_type; ?>/d/<?php echo $g_doc_id ?>/" target="_blank"><?php _e('View this file on Google Docs', 'anvil'); ?></a>
							</p>
							<p>
								<a href="https://docs.google.com/<?php echo $g_doc_type; ?>/export?format=<?php echo $g_doc_format; ?>&amp;id=<?php echo $g_doc_id; ?>"><?php _e('Download This File', 'anvil'); ?>(.<?php echo $g_doc_format; ?>)</a>
							</p>
						</div>
					<?php endif;?>

					<?php if (have_rows('faqs_highlights')): ?>
						<div class="faq-wrapper">
							<div class="row">
								<div class="columns-12">

									<h2 class="faq-title"><?php the_field('faq_title'); ?></h2>
								</div>
								<?php while (have_rows('faqs_highlights')) : the_row(); ?>
									<div class="columns-12">
										<?php if (get_sub_field('title')) : ?>
										<h5><strong><?php the_sub_field('title'); ?></strong></h5>
										<?php endif; ?>
										<?php while (have_rows('faq/highlight')) : the_row(); ?>
											<h5><?php the_sub_field('faq/highlight_title'); ?></h5>
											<p><?php the_sub_field('faq/highlight_content'); ?></p>
										<?php endwhile; ?>
									</div>
								<?php endwhile; ?>

							</div>
						</div>
					<?php endif;?>
				<?php endwhile; ?>

					<!-- <div class="columns-10 "> -->
						<div class="back-nav-wrapper">
							<?php $terms = get_the_terms(get_queried_object(), 'support-types');  ?>
							<?php foreach ($terms as $term): ?>
							<?php $link = get_term_link($term); ?>
								<a href="<?php echo $link; ?>" class="button" ><?php _e('Back To', 'anvil'); ?> <?php echo $term->name; ?></a>
							<?php endforeach; ?>

						</div>
					<!-- </div> -->
			</div>
		</div>
	</div>



<?php get_footer(); ?>

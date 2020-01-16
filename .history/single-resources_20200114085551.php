<?php
/**
 * The file that renders a single resource item.
 */
get_header();
?>
<div class="page-banner">
	<div class="row">
		<div class="columns-12 column-center text-center banner-col">
			<?php
			$terms = get_the_terms( get_queried_object(), 'resource-types' );

			if( ! empty( $terms ) ) {
                foreach ($terms as $term) {
                    $link = get_term_link($term);

                    if ( ! is_a( $link, 'WP_Error') ) { ?>
						<a href="<?php echo esc_url($link); ?>" class="resource-topic" >
							<?php echo esc_html($term->name); ?>
						</a>
					<?php
                    endif;
                }
				?>

				<h1 style="single-resource-title">
					<?php the_title(); ?>
				</h1>
				<?php if ( has_field('is_pdf') ): ?>
					<div class="pdf-wrapper">
						<a href="<?php the_field('pdf_file'); ?>" target="_blank" class="button"><?php _e('Download PDF', 'anvil'); ?></a>
					</div>
				<?php endif;
				}
			} ?>
		</div>
	</div>
</div>

	<div class="single-page-content cpt-search">
		<div class="row">
			<?php while ( have_posts() ) : the_post();
				if ( has_field( 'form_field' ) ):
				?>
					<div class="columns-12 column-center" id="content">
						<div class="columns-6 clearfix">
				<?php
				else:
				?>
					<div class="columns-8 column-center" id="content">
				<?php
				endif;

				$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');

				if ( ! empty( $image ) ):
				?>
					<img src="<?php echo $image[0]; ?>" alt="">
				<?php
				endif;

				the_content();

				if (get_field('form_field')) : ?>
					</div>
					<div class="columns-6 clearfix">
						<?php echo get_field('form_field'); ?>
					</div>
				<?php endif; ?>
			<?php endwhile; ?>
		</div>
	</div>`
</div>
<section class="content-section">
	<div class="row">
		<div class="columns-12">
			<div class="datasheet">
				<h3 class="heading">
					Password / Passphrase Complexity
				</h3>
				<p class="description">
					Complexity is commonly the character types (lower case, upper case, numeric, and special) used in a password. However, complexity is ineffective if it is predictable.
				</p>
				<table class="datatable">
					<thead>
						<tr>
						<th></th>
						<th>Specops</th>
						<th>Microsoft FGPP</th>
						<th>Azure Password Protection</th>
						</tr>
					</thead>
					<tbody>
						<tr>
						<td>OOTB dictionary lists</td>
						<td>Yes</td>
						<td>No</td>
						<td>No</td>
						</tr>
						<tr>
						<td>Import leaked password lists</td>
						<td>Yes</td>
						<td>No</td>
						<td>No</td>
						</tr>

						<tr>
						<td>Ban common character substitution</td>
						<td>Yes</td>
						<td>No</td>
						<td>Yes (via normalization process)</td>
						</tr>
					</tbody>
				</table>
			</div><!-- datasheet -->
		</div><!--.columns-10 -->
	</div><!--.rows -->
</section>
<section class="content-section">
	<div class="row">
		<div class="columns-12">
			<div class="content">
				<div class="content-text">
					<h3>How does it work?</h3>
					<p>Specops Password Policy is built on the Group Policy engine in Active Directory and works in conjunction with existing password policy functions. It consists of the following components and does not require any additional servers or resources in your environment.</p>
					<ul>
					<li>
						<strong>Administration Tools:</strong><br>
						<span>
						Configures the central aspects of the solution, and enables the creation of Specops Password Policy settings in GPOs.
						</span>
					</li>
					<li>
						<strong>Sentinel:</strong><br>
						<span>
						Verifies whether a new password matches the Specops Password Policy settings assigned to the user. The Sentinel is a password filter at the domain controllers.
						</span>
					</li>
					<li>
						<strong>Client (optional)</strong><br>
						<span>
						Displays the password policy rules when a user fails to meet the policy criteria when changing their password. Also notifiers users when their passwords are about to expire.
						</span>
					</li>
					</ul>
				</div>
				<div class="content-image">
					<img src="http://via.placeholder.com/600x400">
				</div>
			</div>
		</div>
	</div>
</section>
<section class="related-articles">
	<div class="row">
		<div class="columns-12">
			<h2><?php _e('Related Resources', 'anvil'); ?></h2>
			<ul class="block-grid-3">
				<?php
					$resource_term = get_the_terms(null, 'resource-topic');
					// print_r($resource_term);

					$related = array(
						'post_type' => 'resources',
						'posts_per_page' => 3,
						'orderby' => 'date',
						'order' => 'DESC',
						'post__not_in' => array(get_the_ID()),
						'tax_query' => array(
							array(
								'taxonomy' => 'resource-topic',
								'field' => 'id',
								'terms' => wp_list_pluck($resource_term, 'term_id'),
							),
						),
					);
					$related_resources = new WP_Query($related);
				?>
				<?php while ($related_resources->have_posts()): $related_resources->the_post(); ?>
					<li>
					<a href="<?php the_permalink(); ?>">
						<div class="related-article card">
							<div class="card-header">
								<h5>
									 <?php the_title(); ?>
								</h5>
							</div>
							<div class="card-body">
								<?php the_excerpt(); ?>
							</div>
						</div>
					</a>
				</li>
				<?php endwhile; wp_reset_query(); ?>
			</ul>
		</div>
	</div>
</div>
<?php
get_footer();

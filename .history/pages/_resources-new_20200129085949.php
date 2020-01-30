<?php
/*
 * Template Name: Resources New
 */
get_header(); ?>

  <?php
    $featuredVideo = get_field('featured_video');
    $featuredWhitepaper = get_field('featured_whitepaper');
    $featuredDatasheet = get_field('featured_datasheet');
    $featuredContent = [];
    $featuredContent['Videos'] = [];
    $featuredContent['Videos']['title'] = get_field('featured_video_title');
    $featuredContent['Videos']['url'] = get_the_permalink($featuredVideo->ID);
    $featuredContent['Videos']['description'] = get_field('featured_video_description');
    $featuredContent['Whitepapers'] = [];
    $featuredContent['Whitepapers']['title'] = get_field('featured_whitepaper_title');
    $featuredContent['Whitepapers']['url'] = get_the_permalink($featuredWhitepaper->ID);
    $featuredContent['Whitepapers']['description'] = get_field('featured_whitepaper_description');
    $featuredContent['Datasheets'] = [];
    $featuredContent['Datasheets']['title'] = get_field('featured_datasheet_title');
    $featuredContent['Datasheets']['url'] = get_the_permalink($featuredDatasheet->ID);
    $featuredContent['Datasheets']['description'] = get_field('featured_datasheet_description');

    if (strlen($featuredContent['Videos']['description']) > 135) {
        $featuredContent['Videos']['description'] = substr($featuredContent['Videos']['description'], 0, 135) . '...';
    }
    if (strlen($featuredContent['Whitepapers']['description']) > 135) {
        $featuredContent['Whitepapers']['description'] = substr($featuredContent['Whitepapers']['description'], 0, 135) . '...';
    }
    if (strlen($featuredContent['Datasheets']['description']) > 135) {
        $featuredContent['Datasheets']['description'] = substr($featuredContent['Datasheets']['description'], 0, 135) . '...';
	}
  ?>
  <div class="page-banner" style="background: #115071; padding: 40px 0 30px;">
    <div class="row">
      <div class="columns-10 column-center text-center banner-col">
        <h1 style="padding-bottom: 10px;">Resources</h1><p style=""></p>
        <p>Find the best practice solution to common problems.</p>
      </div>
    </div>
  </div>
	<section class="resources-results">

		<div class="row-resources">

			<div class="column-center">

				<ul>

					<?php
                        $tax_query = [];

                        if ( ! empty( $_GET['resource-type'] ) ) {
                            $tax_query[] = [
                                'taxonomy' => 'resource-types',
                                'field' => 'slug',
                                'terms' => $_GET['resource-type']
							];
                        }

                        if ( ! empty( $_GET['resource-topic'] ) ) {
                            $tax_query[] = [
                                'taxonomy' => 'resource-topic',
                                'field' => 'slug',
                                'terms' => $_GET['resource-topic']
							];
                        }

                        if ( ! empty( $_GET['keyword'] ) ) {
                            $keyword_query = $_GET['keyword'];
                        }

                        $args = [
                            'tax_query' => $tax_query,
                            'orderby' => 'date',
                            'order' => 'DESC',
                            's' => $keyword_query,
						];

                        $second_query = get_query( 'resources', -1, $args );
            $count = 0;
            $theContent = [];
            $theContent['Datasheets'] = [];
            $theContent['Videos'] = [];
            $theContent['Whitepapers'] = [];
            $videoCount = 0;
            $whitepaperCount = 0;
            $datasheetCount = 0;
            if ($second_query->have_posts()): while ($second_query->have_posts()): $second_query->the_post();

              $resource_types = wp_get_post_terms($post->ID, 'resource-types');
              foreach ($resource_types as $resource_type):

                $resource_img = get_field('resource_type_image', $resource_type);
                $resource_img_url = $resource_img['url'];
				$resource_img_alt = $resource_img['alt'];

                if (array_key_exists($resource_type->name, $theContent)) {
                    if ($resource_type->name == 'Videos') {
                        $thisCount = $videoCount;
                    } elseif ($resource_type->name == 'Whitepapers') {
                        $thisCount = $whitepaperCount;
                    } else {
                        $thisCount = $datasheetCount;
                    }
                    $theContent[$resource_type->name][$thisCount]['img_url'] = $resource_img['url'];
                    $theContent[$resource_type->name][$thisCount]['img_alt'] = $resource_image['alt'];
                    $theContent[$resource_type->name][$thisCount]['permalink'] = get_the_permalink();
					$theContent[$resource_type->name][$thisCount]['title'] = get_the_title();
					$theContent[$resource_type->name][$thisCount]['excerpt'] = trinity_get_excerpt( $post );

					if (get_field('video_image_overlay')) {
                        $theContent[$resource_type->name][$thisCount]['video_image'] = get_field('video_image_overlay');
                    }
                    if ($resource_type->name == 'Videos') {
                        $videoCount++;
                    } elseif ($resource_type->name == 'Whitepapers') {
                        $whitepaperCount++;
                    } else {
                        $datasheetCount++;
                    }
                }
                endforeach;
                $count++;
                endwhile;
              else:
              ?>
				<li class="no-results">Sorry, but no results were found.</li>
			  <?php
			endif;
			?>
          <?php
            // var_dump($theContent);
            $titleIcon = '';
            foreach ($theContent as $key => $value) :
              $videoUrl = '';
            if ($key == 'Videos') {
                $titleIcon = get_template_directory_uri() . '/images/video.png';
            } elseif ($key == 'Whitepapers') {
                $titleIcon = get_template_directory_uri() . '/images/whitepaper.png';
            } else {
                $titleIcon = get_template_directory_uri() . '/images/datasheet.png';
            }
          ?>
			<div class="resource-section" id="<?php echo $key; ?>">
			<h2> <img src="<?php echo $titleIcon; ?>"><?php echo $key; ?> </h2>

			<div class="<?php echo 'Videos' === $key ? 'video-wrapper' : 'resource-wrapper'; ?>"

          <?php foreach ($value as $subKey => $subValue) : ?>
            <?php if ($key == 'Videos') : ?>
              <a href="<?php echo $subValue['permalink']; ?>"><div class="resource-inline"><div class="resource-image-overlay"><img src="<?php if (array_key_exists('video_image', $subValue)) {
              echo $subValue['video_image'];
          } else {
              echo get_template_directory_uri() . '/images/vid-placeholder.jpg';
          } ?>"></div><h4><?php echo $subValue['title']; ?></h4></div></a>
            <?php else: ?>
              <a href="<?php echo $subValue['permalink']; ?>"><div class="resource-inline"><div class="background-<?php echo $key; ?>"><h4><?php echo $subValue['title']; ?></h4></div><div class="excerpt-parent"><p class="excerpt"><?php echo $subValue['excerpt'];?></p></div></div></a>
            <?php  endif; ?>

          <?php endforeach; ?>
            </div>

			</div>

          <?php
            endforeach;
          ?>
				</ul>

			</div>

		</div>

	</section>

<?php get_footer(); ?>

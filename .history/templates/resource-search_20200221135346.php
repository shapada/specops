
<?php 
	$bannerBackground = 'style="background: #d0cfd0;"';
	$searchBackground = 'style="background: #fff;"';
	$labelText = '';
	// if($_SERVER['REQUEST_URI'] != "/resources/") {
		// $bannerBackground = 'style="background: #154865;"';
		// $searchBackground = 'style="background: #fff;"';
		// $labelText = 'style="color: #fff;"';
	// }
?>
<div class="blog-search-holder resources-search-holder" <?php echo $bannerBackground; ?> >

	<div class="row">

		<div class="columns-10 column-center">

			<!-- <form class="blog-search-form row" method="get" action="<?php the_field('resource_parent','options'); ?>"> -->

			<form class="blog-search-form row" method="get" action="<?php echo get_permalink(8); ?>">

				<div class="columns-4 keyword-column">

					<label <?php echo $labelText; ?>>Keywords</label>

					<?php if( isset( $_GET['keyword']) && !empty( $_GET['keyword'])): ?>

						<input type="text" name="keyword" value="<?php echo $_GET['keyword']; ?>" />

					<?php else: ?>

						<input type="text" name="keyword" min="1" max="100" />

					<?php endif; ?>

				</div>

				<div class="columns-2 resource-types-column">

					<label <?php echo $labelText; ?>>Type</label>

					<select name="resource-type" <?php echo $searchBackground; ?>>

						<option value="">All</option>

						<?php
							$resource_types = get_terms(
								array(
									'taxonomy' => 'resource-types',
									'parent' => 0
								)
							);
							foreach($resource_types as $resource_type):
						?>

							<?php if(isset($_GET['resource-type']) && $_GET['resource-type'] == $resource_type->slug): ?>

								<option selected value="<?php echo $resource_type->slug; ?>"><?php echo $resource_type->name; ?></option>

							<?php else: ?>

								<option value="<?php echo $resource_type->slug; ?>"><?php echo $resource_type->name; ?></option>

							<?php endif; ?>

						<?php endforeach; ?>

					</select>

				</div>


				<div class="columns-2 resource-topics-column">

					<label <?php echo $labelText; ?>>Topic</label>

					<select name="resource-topic" <?php echo $searchBackground; ?>>

						<option value="">All</option>

						<?php
							$resource_topics = get_terms(
								array(
									'taxonomy' => 'resource-topics',
									'parent' => 0
								)
							);
							foreach($resource_topics as $resource_topic):
						?>

							<?php if(isset($_GET['resource-topic']) && $_GET['resource-topic'] == $resource_topic->slug): ?>

								<option selected value="<?php echo $resource_topic->slug; ?>"><?php echo $resource_topic->name; ?></option>

							<?php else: ?>

								<option value="<?php echo $resource_topic->slug; ?>"><?php echo $resource_topic->name; ?></option>

							<?php endif; ?>

						<?php endforeach; ?>

					</select>

				</div>

				<div class="columns-2 submit-column">

					<label>&nbsp;</label>

					<input class="button" type="submit" value="Search" />
				</div>

			</form>

		</div>

	</div>

</div>

<?php

get_header(); ?>
	<?php get_template_part('templates/page', 'banner'); ?>
	<div class="row content-area">

        <div id="ti-filter-bar" class="columns-4">

            <h1 class="entry-title search-results-mobile-title">Search Results</h1>

            <div class="ti-mobile-search-options-wrap">
                <div class="ti-mobile-search ti-search-closed">
                    <span class="ti-search-close-icon"></span>
                    <span class="ti-search-label">Search</span>
                    <?php echo facetwp_display( 'facet', 'keyword' ); ?>
                </div>

                <div class="ti-slide-out-trigger"><i class="ti-filter-icon"></i> Filter </div>
            </div>

            <div class="ti-slide-out">
                <span class="ti-slide-out-back"><i class="ti-back-icon"></i> Back</span>

                <h4 class="ti-refine">Refine Your Results:</h4>

                <?php echo facetwp_display( 'selections' ); ?>

                <div class="ti-accordion facet-category-accordion ti-open">
                <h4 class="facet-category-heading">Category</h4>
                    <?php echo facetwp_display( 'facet', 'content_type' ); ?>
                </div>
                <div class="ti-accordion facet-product-accordion ti-open">
                    <h4 class="facet-product-heading">Product</h4>
                    <?php echo facetwp_display( 'facet', 'product' ); ?>
                </div>
                <div class="ti-accordion facet-resource-type-accordion ti-closed">
                    <h4 class="facet-resource-type-heading">Resource Type</h4>
                    <?php echo facetwp_display( 'facet', 'resource_type' ); ?>
                </div>
                <div class="ti-accordion facet-resource-topic-accordion ti-closed">
                    <h4 class="facet-resource-topic-heading">Resource Topic</h4>
                    <?php echo facetwp_display( 'facet', 'resource_topic' ); ?>
                </div>
                <div class="ti-accordion facet-blog-category-accordion ti-closed">
                    <h4 class="facet-blog-category-heading">Blog Category</h4>
                    <?php echo facetwp_display( 'facet', 'blog_category' ); ?>
                </div>
                <div class="ti-accordion facet-blog-category-accordion ti-closed">
                    <h4 class="facet-blog-category-heading">Date</h4>
                    <?php echo facetwp_display( 'facet', 'date' ); ?>
                </div>
            </div>
    
        </div>

		<div id="content" class="columns-8 site-content search-results" role="main">

            <?php while ( have_posts() ) : the_post(); ?>
            
                <h1 class="entry-title search-results-title">Search Results</h1>

                <?php echo facetwp_display( 'template', 'search' ); ?>
                <?php echo facetwp_display( 'pager' ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->

	</div>
		
<?php get_footer(); ?>

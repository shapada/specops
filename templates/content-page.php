<?php
/*
 * The template used for displaying page content in page.php
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		
		<h1 class="entry-title">
			<?php
            
                if (is_archive('ht_kb') || is_tax('ht_kb_category') || is_singular('ht_kb')) :

                    echo '<a href="' . get_post_type_archive_link('ht_kb') . '">Knowledge Base</a>';

                else :
                    echo the_title();

                endif;
                
            ?>
		</h1>
	
	</header><!-- .entry-header -->

	<div class="entry-content">
	
		<?php the_content(); ?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->

<?php
/*
 * This is the template that displays on all pages by default.
 */
get_header(); ?>
<style>
    .ti-content .ti-single {
        display: inline-block;
        width: 32%;
        margin-right: 1%;
    }
    .error404 .ti-content a {
        text-decoration: none;
        color: $color-charcoal;
    }
    .ti-content .ti-single:last-child {
        margin-right: 0;
    }
    .ti-content .ti-single img {
        width: auto;
        height: 200px;
    }
    .error404 .entry-content {
        padding: 0;
    }
    .error404 .entry-content p {
        font-size: 16px;
        line-height: 1.25em;
        margin-top: 20px;
        font-style: normal;
    }
    .error404 .ti-page-hero {
        height: 100%;
        background: #134D6D;
        background: url(https://s3.amazonaws.com/clientinstalls/Specops/SPEC-404Page-Jan2017/question-background.png), -moz-linear-gradient(#134D6D, #153A47);
        background: url(https://s3.amazonaws.com/clientinstalls/Specops/SPEC-404Page-Jan2017/question-background.png), -webkit-linear-gradient(#134D6D, #153A47);
        background: url(https://s3.amazonaws.com/clientinstalls/Specops/SPEC-404Page-Jan2017/question-background.png), linear-gradient(#134D6D, #153A47);
        padding: 50px 0;
        color: palettes(mono, white);
    }
    .error404 .ti-page-hero h2 {
        color: palettes(mono, white);
        font-size: 42px;
        line-height: 1.25em;
        padding: 0 10px;
    }
    .error404 .ti-page-hero p {
        color: #31BEC7;
    }
    .error404 .ti-page-hero .ti-green-large {
        font-size: 62px;
        color: #D1DB2D;
    }
    .error404 .ti-page-hero,
    .error404 .latest-blogs {
        position: relative;
        z-index: 1;
        left: 50%;
        right: 50%;
        margin-left: -50vw;
        margin-right: -50vw;
        width: 100vw;
    }
    .error404 .ti-content {
        margin-top: 0;
        padding: 80px 0;
    }
    .error404 .latest-blogs ul.blog-posts{
        margin: 0 30px;
    }
    #searchform {
        width: 75%;
        display: block;
        margin: 0 auto;
    }
    #searchform input {
        display: inline-block;
        height: 26px;
    }
    #searchform #searchsubmit {
        width: 175px;
        max-width: none;
        border-radius: 4px;
    }
    .error404 .ti-page-hero h2 {font-weight: 400;}
    .error404 .ti-max-width-container {
        max-width: 800px;
        margin: 0 auto;
    }
    .ti-content .ti-single p {
        font-weight: bold;
    }
    section#main {
        overflow: hidden;
    }
    [class*=columns-] {
        padding-left: 0;
        padding-right: 0;
    }
    .burger-trigger {
        right: 30px;
    }
    .site-header {
        padding-left: 10px;
    }
    #searchform {
        display: none;
    }
    .homepage-blog .columns-12 > h3 {
		display: none !important;
	}

</style>
<style scoped>
    @media (max-width: 768px) {
        .ti-content .ti-single {
            display: block;
            width: 100%;
            margin-bottom: 40px;
        }
        .ti-content .ti-single p,
        .ti-content .ti-single .ti-image-container {
            display: inline-block;
            width: 46%;
            margin: 0 1%;
        }
        .ti-content .ti-single img {
            width: 150px;
            height: auto;
        }
        .error404 .ti-content .ti-single p {
            vertical-align: top;
            margin-top: 40px;
            font-weight: bold;
            text-align: left;
        }
        .error404 .entry-content p {
            padding: 0 10px 15px;
        }
        #searchform {
            width: 95%;
        }
        .error404 .s404 input[type=search] {
            width: 95%;
            padding: 10px;
            margin-bottom: 10px;
        }
        #searchform #searchsubmit {
            width: 100%;
        }
        .error404 .ti-page-hero {
            padding: 50px 20px;
        }
        .error404 .ti-page-hero .ti-green-large {
            font-size: 45px;
        }
        .error404 .ti-page-hero h2 {
            font-size: 25px;
            line-height: 1.25em;
        }
        .error404 .ti-content {
            padding: 20px 0;
        }
        .homepage-blog {padding: 40px 0px 40px;}
        .error404 .latest-blogs ul.blog-posts {margin: 0 5px;}
        .homepage-blog h3 {padding: 0 15px 20px 15px;}

        .error404 .ti-page-hero,
        .error404 .latest-blogs {
            position: static;
            margin-left: 0;
            margin-right: 0;
        }

    }
    @media (max-width: 450px) {
        .error404 .s404 input[type=search] {
            width: 93%;
        }
        .ti-content .ti-single p {
            margin-top: 20px;
        }
        .ti-content .ti-single img {
            width: 100px;
        }
        .error404 .ti-content .ti-single p {
            margin-top: 28px;
        }
    }
</style>
	<div class="row content-area">

		<div id="content" class="columns-12 site-content" role="main">


				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="entry-content">
                        <div class="ti-page-hero">
                            <div class="ti-max-width-container">

                                <h2><span class="ti-green-large">Oops!</span> It seems the page you are looking for has been lost.</h2>
                                <p>Let us help you find your way. Browse our suggested pages and blogs.</p>

                                <form method="get" id="searchform" class="searchform s404" action="<?php echo esc_url(home_url('/')); ?>" role="search">
                                    <input type="search" class="field" name="s" value="<?php echo esc_attr(get_search_query()); ?>" id="s" placeholder="<?php echo esc_attr_x('What are you looking for?', 'placeholder', 'forge_saas'); ?>" />
                                    <input type="submit" class="submit" id="searchsubmit" value="<?php _e('SEARCH', 'anvil')?>" />
                                </form>
                            </div>

                        </div>
                        <div class="ti-content">
                        <div class="ti-single">
                                <a href="/case-studies/">
                                    <div class="ti-image-container">
                                        <img src="<?php echo get_stylesheet_directory_uri() . '/images/spec-case-studies.png'; ?>">
                                    </div>
                                    <p>READ SUCCESS STORIES</p>
                                </a>
                            </div>
                            <div class="ti-single">
                                <a href="/support-docs/">
                                    <div class="ti-image-container">
                                        <img src="<?php echo get_stylesheet_directory_uri() . '/images/spec-support-icon.png'; ?>">
                                    </div>
                                    <p>GO TO SUPPORT</p>
                                </a>

                            </div>
                            <div class="ti-single">
                                <a href="/resources/">
                                    <div class="ti-image-container">
                                        <img src="<?php echo get_stylesheet_directory_uri() . '/images/spec-resource-icon.png'; ?>">
                                    </div>
                                    <p>EXPLORE OUR RESOURCES</p>
                                </a>
                            </div>

                        </div>
                        <div class="latest-blogs">
	                        <?php get_template_part('templates/home', 'blog'); ?>
                        </div>

					</div><!-- .entry-content -->

				</article><!-- #post-## -->


		</div><!-- #content -->

	</div>

<?php get_footer(); ?>

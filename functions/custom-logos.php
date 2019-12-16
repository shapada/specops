<?php
/* Logos */
function my_custom_login_logo() {
 
	echo '
	<style type="text/css">
		h1 a { 
			background:none !important;
			height: auto !important; 
			width: 100% !important; 
			text-indent: 0 !important;
		}

		h1 a img {
			max-width: 100%;
			width: auto;
		}
	</style>
	<script type="text/javascript">
		window.onload = function(){
			var aTag = document.getElementById("login").getElementsByTagName("a")[0];
			aTag.innerHTML = \'<img src="'.get_bloginfo('template_directory').'/images/logo.png" alt="'.get_bloginfo( 'name' ).'">\';

			aTag.href = "'. site_url() . '";
			aTag.title = "Go to site";
		}
	</script>
	';
}
add_action('login_head', 'my_custom_login_logo');
 
function custom_admin_logo() {
	echo '<style type="text/css">#header-logo { background-image: url('.get_bloginfo('template_directory').'/images/logo.png) !important; background-size:auto;}</style>';
	}
add_action('admin_head', 'custom_admin_logo');

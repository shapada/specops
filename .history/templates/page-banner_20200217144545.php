	<?php

	if(  is_singular('resources') && has_term( 'datasheets', 'resource-types' ) ) {
		get_template_part( 'templates/banner', 'single-datasheet' );
	} else {
		get_template_part( 'templates/banner' );
	}

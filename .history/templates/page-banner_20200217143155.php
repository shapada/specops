	<?php

	if( has_term( 'datasheets', 'resource-types' ) ) {
		get_template_part( 'templates/content', 'banner-datasheet' );
	} else {
		get_template_part( 'templates/content', 'banner-single-page' );
	}

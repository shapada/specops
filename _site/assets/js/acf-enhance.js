jQuery(function($) {

	// collapes the flex content boxes when loaded
	$(".acf-flexible-content .acf-fc-layout-handle").trigger('click');

	// acf edit page, removing the field
	$("#acf_fields").on('click', '.acf_delete_field, .acf-fc-delete', function() {
		if( !confirm('Are you sure?') ) return false;
	});

	// acf post edit, removing the content
	$(".acf-flexible-content").on('click', '.acf-button-remove', function() {
		if( !confirm('Are you sure?') ) return false;
	});
	
});

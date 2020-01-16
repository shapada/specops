jQuery(document).ready(function($) {

	// Read More links
	$('#product-benefits .read-more').click(function(e) {
		e.preventDefault();
		$(this).siblings('.more-content').toggleClass('more-content-visible');
		$(this).toggleClass('read-more-expanded');
		if ($(this).hasClass('read-more-expanded')) {
			$(this).text('Read Less');
		} else {
			$(this).text('Read More');
		}
	});

	// Show sticky footer
	$(window).scroll(throttle(showStickyFooter, 150)); // throttle scroll function
	function showStickyFooter() {
		if ($('body.single-product [data-product]').length) {
			var features = $('#product-features').offset().top;
			var doc_bottom = $(window).scrollTop() + $(window).height();

			if (doc_bottom >= features) {
				$('#product-sticky-footer').addClass('visible');
			} else {
				$('#product-sticky-footer').removeClass('visible expanded');
			}
		}
	}

	// Sticky footer expand
	$('#product-sticky-footer .product-sticky-footer-expand-trigger, #product-sticky-footer .product-sticky-footer-title').click(function() {
		$('#product-sticky-footer').toggleClass('expanded');
	});

	// Sticky footer tabs
	var panel = $('#product-sticky-footer .product-sticky-footer-wrapper .row');
	panel.find('.product-footer-tabs li').first().addClass('active');
	panel.find('.tab-panel').first().addClass('active');

    $('#product-sticky-footer .product-footer-tabs li').on('click', function() {
		var panel_to_show = $(this).attr('rel');
		
		panel.find('.product-footer-tabs li').removeClass('active');
		$(this).addClass('active');
        panel.find('.tab-panel.active').removeClass('active');
        panel.find('#' + panel_to_show).addClass('active');
	});

    // Expand read more link if there is a hash that corresponds with a feature item
    if (window.location.hash) {
        var id = '#product-benefits #' + window.location.hash.substring(1);
        if ($(id).length) {
            $(id).find('.read-more').click();
        }
    }
});
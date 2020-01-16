(function($) {

    $(document).ready(function() {

        var exist_condition = setInterval(function() {
            if ($('#content .facetwp-template').text().length) {
                clearInterval(exist_condition);
                FWP.refresh();
                setTimeout(function() {
                    $('#content .facetwp-template').addClass('ti-loaded');
                }, 500);
            }
        }, 50);
		
        // Accordion behavior
        $(document).on('click', '.ti-accordion.ti-closed h4', function() {
            $(this).parent().removeClass('ti-closed');
            $(this).parent().addClass('ti-open');
            $(this).next('.facetwp-facet').slideDown();
        });
        $(document).on('click', '.ti-accordion.ti-open h4', function() {
            $(this).parent().addClass('ti-closed');
            $(this).parent().removeClass('ti-open');
            $(this).next('.facetwp-facet').slideUp();
        });

        // Change search button behavior to always search rather than reset sometimes
        $(document).on('keyup', '.facetwp-search', function() {
            $(this).siblings('.facetwp-btn').removeClass('f-reset');
        })

        // Slide out mobile form, slide it back with back button
        $(document).on('click', '.ti-slide-out-trigger', function() {
            $('body').addClass('ti-slide-out-active');
            $('.ti-slide-out').addClass('active');
        });
        $(document).on('click', '.ti-slide-out-back', function() {
            $('body').removeClass('ti-slide-out-active');
            $('.ti-slide-out').removeClass('active');
        });

        // Slide out search on mobile
        $(document).on('click', '.ti-mobile-search .ti-search-label', function() {
            $(this).parent().removeClass('ti-search-closed');
            $(this).parent().addClass('ti-search-active');
            $(this).parent().siblings('.ti-slide-out-trigger').addClass('ti-search-active');
        });
        $(document).on('click', '.ti-mobile-search .ti-search-close-icon', function() {
            $(this).parent().removeClass('ti-search-active');
            $(this).parent().addClass('ti-search-closed');
            $(this).parent().siblings('.ti-slide-out-trigger').removeClass('ti-search-active');
        });

        // Sticky sidebar
        if ( $('body').hasClass('admin-bar') ) {
            $('#ti-filter-bar').stickySidebar({
                topSpacing: 164,
                bottomSpacing: 40,
                containerSelector: '.content-area'
            });
        } else {
            $('#ti-filter-bar').stickySidebar({
                topSpacing: 132,
                bottomSpacing: 40,
                containerSelector: '.content-area'
            });
        }
        
    });

	$(document).on('ready facetwp-loaded', function() {

        // Make accordions visible
        $('.ti-accordion').addClass('ti-loaded');

        // Rearrange/relabel the categories, because FacetWP gets their name from their back end name
        $('.facetwp-facet-content_type .facetwp-radio[data-value="docs"]').text('Support').prependTo('.facetwp-facet-content_type');
        $('.facetwp-facet-content_type .facetwp-radio[data-value="post"]').text('Blog').insertAfter('.facetwp-facet-content_type .facetwp-radio[data-value="docs"]');
        $('.facetwp-facet-content_type .facetwp-radio[data-value="resources"]').insertAfter('.facetwp-facet-content_type .facetwp-radio[data-value="post"]');
        $('.facetwp-facet-content_type .facetwp-radio[data-value="product"]').insertAfter('.facetwp-facet-content_type .facetwp-radio[data-value="resources"]');
        
        // Make Category facets always selectable
        $('.facetwp-facet-content_type .facetwp-radio').removeClass('disabled');

        var exist_condition = setInterval(function() {
            // Add a heading to the user selections, count the number of selections
            if ($('.facetwp-selections ul').length) {
                $('.facetwp-selections h4, .ti-slide-out-trigger > span').remove();
                var filter_count = $('.facetwp-selections li:not([data-facet="keyword"]) .facetwp-selection-value:not(:empty)').length;
                if (filter_count > 0) {
                    $('<h4 class="applied-filters">Applied Filters <span>(' + filter_count + ')</span></h4>').prependTo('.facetwp-selections');
                    $('<span>(' + filter_count + ')</span>').appendTo('.ti-slide-out-trigger');
                }
                clearInterval(exist_condition);
            }
        }, 50);

        // Add the search keyword to the title
        var keyword = FWP.facets.keyword;
        if (typeof(keyword) !== 'undefined' && keyword.length > 0) {
            $('h1.entry-title').html('Search Results for: <strong><em>&ldquo;' + keyword + '&rdquo;</em></strong>');
        } else {
            $('h1.entry-title').html('Search Results');
        }

        // Get accordions open or closed for animation
        $('.ti-accordion.ti-open .facetwp-facet').slideDown(0);
        $('.ti-accordion.ti-closed .facetwp-facet').slideUp(0);

        // Change search button behavior to always search rather than reset sometimes
        $('.facetwp-type-search .facetwp-btn').removeClass('f-reset');
        $(document).on('click', '.facetwp-type-search .facetwp-btn, .facetwp-type-search .facetwp-btn.f-reset', function() {
            FWP.autoload();
        });

        var sidebar_height = $('#ti-filter-bar .inner-wrapper-sticky').outerHeight();
        $('.content-area').css('min-height', sidebar_height + 'px');

    });

    $(document).on('ready facetwp-refresh', function() {

        // Reset sub-facets if the main facet is reset
        if (typeof(FWP.facets.content_type) !== 'undefined') {
            if (FWP.facets['content_type'][0] !== 'post') {
                FWP.facets['blog_category'] = [];
            }
            if (FWP.facets['content_type'][0] !== 'resources') {
                FWP.facets['resource_type'] = [];
                FWP.facets['resource_topic'] = [];
            }
            if (FWP.facets['content_type'][0] !== 'product') {
                FWP.facets['product_category'] = [];
            }
        }

        // Scroll to top of search results on page change
        $('html, body').animate({
            scrollTop: $('#main').offset().top - 164
        }, 500);

    });

})(jQuery);

// Loading indicator, first load refresh
jQuery(document).on('facetwp-refresh', function() {
    // Give search results transparency
    jQuery('#content').addClass('ti-loading');
});
jQuery(document).on('facetwp-loaded', function() {
    // Make fully opaque again
    jQuery('#content').removeClass('ti-loading');
});
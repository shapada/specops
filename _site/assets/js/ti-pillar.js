jQuery(document).ready(function($) {
    // Progress bar vars
    var winHeight = $(window).height(), 
    pageHeight = $('.pillar-page').height(),
    progressBar = $('.pillar-menu progress'),
    progressMax, progressValue;

    progressMax = pageHeight - winHeight;
    progressBar.attr('max', progressMax);

    // Scrollspy vars
    var sections = $('.pillar-page > section');

    // Sticky submenu vars
    var menu = $('.pillar-menu'),
    menuHeight = $(menu).height(),
    stickyNavTop = ($('#first-section').offset().top) + ($('#first-section').height());

    // Modal vars
    var lastSect = $('.pillar-page > section').last(),
    lastSectTrigger = ($(lastSect).offset().top) + ($(lastSect).height() / 1.5),
    hasShown = false;

    // Sticky nav, progress bar, and scrollspy functions
    var nav = function() {
        var scrollTop = $(window).scrollTop();

        // Add/remove sticky
        if (scrollTop > stickyNavTop) { 
            $(menu).addClass('fixed');
        } else {
            $(menu).removeClass('fixed'); 
        }

        // Add/remove highlight class based on scroll position
        sections.each(function() {
            var sectTop    = $(this).offset().top - (menuHeight + 2);
            var sectBottom = sectTop + $(this).height();

            if (scrollTop >= sectTop && scrollTop <= sectBottom) {
                var id      = $(this).attr('id');
                var navEl = menu.find('a[href="#' + id+ '"]');
                navEl.parent().addClass('current').siblings().removeClass( 'current' );
            }
        })

        // Change progress bar value based on scroll position
        progressValue = scrollTop;
        progressBar.attr('value', progressValue);
    };

    nav();

    $(window).scroll(throttle(nav, 50)); // throttle nav scroll function
    $(window).scroll(debounce(nav, 50)); // debounce nav scroll function

    // Reset values/measurements for when the window is resized
    var resizeSetValues = function() {
        winHeight = $(window).height();
        pageHeight = $(document).height();

        sections = $('.pillar-page > section');

        menuHeight = $(menu).height();
        stickyNavTop = ($('#first-section').offset().top) + ($('#first-section').height());
      
        progressMax = pageHeight - winHeight;
        progressBar.attr('max', progressMax);
      
        progressValue = $(window).scrollTop();
        progressBar.attr('value', progressValue);

        lastSectTrigger = ($(lastSect).offset().top) + ($(lastSect).height() / 1.5);
    }

    $(window).resize(throttle(resizeSetValues, 150)); // throttle resize function

    // Menu smooth scroll
    $('.pillar-menu a[href^="#"]').not('a[href="#"]').click(function() {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.substr(1) +']');
        if (target.length) {
            $('html, body').animate({
                scrollTop: target.offset().top - menuHeight,
            }, 1000);
            $('.pillar-menu-trigger .burger-trigger-small').removeClass('open');
            $('.pillar-menu-list-wrap').slideUp();
            return false;
        }
    });

    // Modal
	function closeModal() {
		$('.pillar-modal').removeClass('active');
	}

	$('.pillar-modal').on('click', function() {
		closeModal();
	});

	$(document).keyup(function(e) {
		if (e.keyCode == 27) {
			closeModal();
		}
    });

    // Show modal
	function showModal() {
		if ($('.pillar-modal').length && playing == false) {
            var windowBottom   = $(window).scrollTop() + $(window).height();

			if ((windowBottom >= lastSectTrigger) && hasShown == false) {
                setTimeout(function() {
                    $('.pillar-modal').addClass('active');
                    hasShown = true;
                }, 2000);
			}
		}
    }

    $(window).scroll(throttle(showModal, 150)); // throttle scroll function

    // Mobile submenu
    $('.pillar-menu-trigger').click(function() {
        $(this).find('.burger-trigger-small').toggleClass('open');
        $(this).siblings('.pillar-menu-list-wrap').slideToggle();
    });

    $(document).click(function(event) { 
		if (!$(event.target).closest('.pillar-menu').length) {
			if ($('.pillar-menu-trigger .burger-trigger-small').hasClass('open')) {
				$('.pillar-menu-trigger .burger-trigger-small').removeClass('open');
                $('.pillar-menu-list-wrap').slideUp();
			}
		}
	});
});
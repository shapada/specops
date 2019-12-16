// Global variables for menu click/hover
var forceClick = false;
var playing = false;

// Throttle function
function throttle(fn, wait) {
	var time = Date.now();
	return function() {
		if ((time + wait - Date.now()) < 0) {
			fn();
			time = Date.now();
		}
	}
}

// Debounce function
function debounce(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		var later = function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		};
		var callNow = immediate && !timeout;
		clearTimeout(timeout);
		timeout = setTimeout(later, wait);
		if (callNow) func.apply(context, args);
	};
};

jQuery(document).ready(function($) {

	// Menu
	$(document).on('click', '.fs-mobile-trigger, .fs-mobile-trigger + .menu-slide', function(e) {
		e.preventDefault();

		$('.fs-mobile-trigger').toggleClass('open');
		$('html, body').toggleClass('mobile-menu-active');
		$( '.ubermenu' ).ubermenu( 'toggleMenuCollapse' );
		//$('.mobile-nav-container').stop(true, true).slideToggle(200);

		if ($('.fs-mobile-trigger').hasClass('open')) {
			bool = true;
		} else {
			bool = false;
		}
		stopBodyScrolling(bool);

		if (forceClick == false) {
			var $nav = $('#site-navigation');
			var newMenu = $nav.html().replace(/mouseover/g, 'click').replace('ubermenu-active', '').replace('ubermenu-in-transition', '');
			$nav.html('');
			$(newMenu).appendTo($nav);
			$nav.find('.ubermenu-has-submenu-mega').attr('data-ubermenu-trigger', 'click');
			$('#site-navigation .ubermenu').ubermenu();
			forceClick = true;
		}
	});

	function stopBodyScrolling(bool) {
		if (bool === true) {
			document.body.addEventListener('touchmove', freezeVp, false);
		} else {
			document.body.removeEventListener('touchmove', freezeVp, false);
		}
	}
	var freezeVp = function(e) {
		e.preventDefault();
	};	

	$("#mobile-nav > li").find('.sub-menu').parent().children('a').after('<span class="menu-slide"></span>');

	$("#mobile-nav > li .menu-slide").on('click',function(e){
		$(this).toggleClass('open');
		e.preventDefault();
		e.stopPropagation();

		$(this).siblings('.sub-menu').stop(true, true).slideToggle(200);
	});


	$("select").wrap('<div class="styled-select"></div>');

	/*
     |----------------------------------------------------------------
     |  Cookie Notice
     |----------------------------------------------------------------
     */
    if (! Cookies.get('agree_cookie')) {
    	$(".cookie-notice-holder").addClass('is-visible');
    }

    $('#dismissed_cookie_notice').click(function(e) {
        e.preventDefault();
        Cookies.set('agree_cookie', 1, {expires: 365});
        $(".cookie-notice-holder").removeClass('is-visible');
    });

	// Contact Us Form Control
	if($('body').hasClass('page-template-pages_contact-php')) {
		$('#input_5_6').on('change', function(){
			var self = this;
			if($(self).val().indexOf('sales question') > -1 || $(self).val().indexOf('fråga till säljavdelningen') > -1) {
				if($('#field_5_7').css('display') != "block") {
					$('#input_5_7').val($('#input_5_7 option:first').val());
					$('#input_5_7').children('option:last').remove();
				}
				$('#field_5_7').css({'display': 'block'});
			}else {
				$('#field_5_7').css({'display': 'none'});
				$('#input_5_7').append('<option value="Not Applicable">Not Applicable</option>');
				$('#input_5_7').val($('#input_5_7 option:last').val());
			}
		});

		if(window.location.href.indexOf('kontakta-oss') > -1) {
			console.log('this is the swedish contact form');
			$('#gform_submit_button_5').on('click', function(){
				var optionToAppend = '';
				var englishTranslated = '';
				switch($('#input_5_6').val()) {
					case 'Jag har en fråga till säljavdelningen':
						englishTranslated = "I have a sales question";
						optionToAppend = '<option value="' + englishTranslated + '">Jag har en fråga till säljavdelningen</option>';
						break;
					case 'Jag är vill veta mer om partnerskap':
						englishTranslated = "I am interested in partnership opportunities";
                        optionToAppend = '<option value="' + englishTranslated + '">Jag är vill veta mer om partnerskap</option>';
						break;
					case 'Jag vill komma i kontakt med marknadsavdelningen':
						englishTranslated = "Get me in touch with marketing";
                        optionToAppend = '<option value="' + englishTranslated + '">Jag vill komma i kontakt med marknadsavdelningen</option>';
						break;
				}
				$('#input_5_6').append(optionToAppend);
				$('#input_5_6').val(englishTranslated).change();

			});
		}
	}

	// Get search term for header search
	var search_term;
	$(document).on('keyup change', '#ubermenu-nav-main-2-primary .ti-search, #mobile-nav .ti-search', function() {
		search_term = $(this).val();
	});

	// Open search
	$(document).on('click', '#ubermenu-nav-main-2-primary .ti-search-closed .ti-search-icon', function() {
		var navWidth = $('#ubermenu-nav-main-2-primary').outerWidth() - 50 + 'px';
		$('#ubermenu-nav-main-2-primary .ubermenu-item').addClass('ti-fadeout');
		$(this).closest('form').removeClass('ti-search-closed').addClass('ti-search-active');
		$('#ubermenu-nav-main-2-primary .ti-search').css('width', navWidth);
		$('#ubermenu-nav-main-2-primary .ti-search').focus();
	});

	// Submit search
	$(document).on('click', '#ubermenu-nav-main-2-primary .ti-search-active .ti-search-icon, #mobile-nav .ti-search-icon', function() {
		var search_full = '';
		if (window.location.host == 'info.specopssoft.com') {
			var search_full = 'https://specopssoft.com';
		}
		if (typeof(search_term) !== 'undefined' && search_term !== '') {
			window.location.href = search_full + '/search-results/?_keyword=' + search_term;
		}
	});
	$(document).on('keypress', '#ubermenu-nav-main-2-primary .ti-search, #mobile-nav .ti-search', function(e) {
		var search_full = '';
		if (window.location.host == 'info.specopssoft.com') {
			var search_full = 'https://specopssoft.com';
		}
		// If a user hits the enter key
		if (e.which === 13 && typeof(search_term) !== 'undefined' && search_term !== '') {
			e.preventDefault();
			window.location.href = search_full + '/search-results/?_keyword=' + search_term;
		} else if (e.which === 13) {
			e.preventDefault();
		}
	});

	// Close search
	$(document).on('click', '#ubermenu-nav-main-2-primary .ti-search-active .ti-search-close-icon', function() {
		$('#ubermenu-nav-main-2-primary .ubermenu-item').removeClass('ti-fadeout');
		$(this).closest('form').removeClass('ti-search-active').addClass('ti-search-closed');
		$('#ubermenu-nav-main-2-primary .ti-search').removeAttr('style');
	});

	// Blog categories mobile drop-down
	$('.ti-category-label').click(function() {
		$(this).find('.burger-trigger').toggleClass('open');
		$(this).next('.blog-category-lists').toggleClass('ti-active');
	});

	$(document).click(function(event) { 
		if (!$(event.target).closest('.ti-category-label').length) {
			if ($('.blog-category-lists').hasClass('ti-active')) {
				$('.ti-category-label .burger-trigger').removeClass('open');
				$('.blog-category-lists').removeClass('ti-active');
			}
		}
	});

	// Smooth scroll to IDs
	$('a[href^="#"]').not('a[href="#"]').not('.pillar-menu a').click(function() {
		var target = $(this.hash);
		target = target.length ? target : $('[name=' + this.hash.substr(1) +']');
		if (target.length) {
			$('html, body').animate({
				scrollTop: target.offset().top - 10
			}, 1000);
			return false;
		}
	});

	// Auto-hiding sticky header
	var position = 0;
	function stickyHeader() {
		var top_bar = $('header.top-banner');
		var header = $('#masthead');
		var scroll_top = $(this).scrollTop();
		var start_point = top_bar.outerHeight() + header.outerHeight();

		if (scroll_top <= position) {
			if (scroll_top < top_bar.outerHeight()) {
				header.removeClass('fixed-header hidden');
			} else {
				header.removeClass('hidden');
			}
		} else if (scroll_top > position && scroll_top > start_point) {
			header.addClass('fixed-header hidden');
		}
		position = scroll_top;
	}

	$(window).scroll(throttle(stickyHeader, 100)); // throttle scroll function
	$(window).scroll(debounce(stickyHeader, 100)); // debounce scroll function

	/********************************
	 * About page
	 ********************************/

	// About page bio modals
	$('.person .overlay').on('click', function() {
		$(this).closest('.person').find('.bio-mask').addClass('active');
	});
		
	function closeModal() {
		$('.person .bio-mask').removeClass('active');
	}
	
	$('.bio-modal, .bio-mask').on('click', function() {
		closeModal();
	});
	
	$(document).keyup(function(e) {
		if (e.keyCode == 27) {
			closeModal();
		}
	});

	// About page show more for timeline
	$('#highlights .show-more-button').click(function() {
		$(this).hide();
		$('#highlights .more-highlights').css('opacity', 0).slideDown(300).animate({ opacity: 1 }, { queue: false, duration: 300 });
	});

	/********************************
	 * Single support page
	 ********************************/

	//Navigate to different product support
	$('#support-select').on('change', function() {
		window.location = $(this).val();
	});
	// Watch for clicks of the accordion titles
	$( ".accordion .title" ).click( function() {
		// Check if this area is active or not
		if($(this).parent().hasClass("active")){
			// Close our current area
			$(this).parent().removeClass("active");
		}else{
			// Close all open areas
			// Comment out the line below if you want your accordion items to stay open until they are clicked closed
			$(this).closest('.accordion').find('.active').removeClass('active');

			// Open our current accordion area
			$(this).parent().addClass("active");
		}
		var target = $(this);
		$('html,body').animate({
			scrollTop: target.offset().top - 180
		}, 500);
		return false;
	});
	// this is the main call to action for the custom select
	(function() {
		[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
			new SelectFx(el);
		} );
	})();
	$('.cs-options ul li').on('click', function(e){
		e.preventDefault();
		document.location.href = $(this).data('value');
	});

	/********************************
	 * Resources landing page
	 ********************************/

	$('.resource-toggle').on( 'click', function(e) {
		//Prevent page jump
		e.preventDefault();

		//Store message to var
		var $message = $(this).find('.message');

		//Toggle class and list
		$(this).toggleClass( 'open' );
		$('.resource-list').slideToggle(500);

		//Check message and make sure list is hidden if no 'open' class
		if ( $(this).hasClass( 'open' ) ) {
			$message.text( 'Hide Resources' );
		}else{
			$message.text( 'Show Resources' );
			$('.resource-list').hide();
		}
	});

	/********************************
	 * Social sharing buttons
	 ********************************/

	$('.social-sharing-list a.pop').click( function(e) {
		e.preventDefault();
		var width = 720;
		var height = 480;
		var left = (screen.width/2)-(width/2);
		var top = (screen.height/2)-(height/2);
		window.open( $(this).attr('href'), "_blank", 'height='+height+',width='+width+',menubar=no,status=no,location=no,toobar=no,top='+top+',left='+left);
	});

	// YouTube player
	var player, src;
    $('.flex-video button').click(function() {
		var $container = $(this).parent();
		src = $container.attr('data-embed');

		if ($container.hasClass('youtube')) {
			$container.html('<div id="' + src + '"></div>');

			loadPlayer(src);
		} /*else if ($container.hasClass('vimeo')) {
			$container.html('<iframe src="http://player.vimeo.com/video/' + src + '?autoplay=true" frameborder="0" allowfullscreen></iframe>');
		}*/
	});

	function loadPlayer(src) {
		if (typeof(YT) == 'undefined' || typeof(YT.Player) == 'undefined') {
			var tag = document.createElement('script');
			tag.src = "https://www.youtube.com/iframe_api";
			var firstScriptTag = document.getElementsByTagName('script')[0];
			firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

			window.onYouTubePlayerAPIReady = function() {
				onYouTubePlayer(src);
			};

			} else {
				onYouTubePlayer(src);
			}
	}

	function onYouTubePlayer(src) {
		player = new YT.Player(src, {
			height: '360',
			width: '480',
			videoId: src,
			playerVars: { autoplay: 1, rel: 0 },
			events: { 'onStateChange': onPlayerStateChange }
		});
	  }

	function onPlayerStateChange(event) {
		if (event.data == YT.PlayerState.PLAYING && !playing) {
			playing = true;
		} else {
			playing = false;
		}
	}	
});

// Restore menu hover for larger screens
$(window).on('resize', function() {
	if ((forceClick == true) && ($(window).width() >= 768)) {
		var $nav = $('#site-navigation');
		var newMenu = $nav.html().replace(/click/g, 'mouseover').replace('ubermenu-active', '').replace('ubermenu-in-transition', '');
		$nav.html('');
		$(newMenu).appendTo($nav);
		$nav.find('.ubermenu-has-submenu-mega').attr('data-ubermenu-trigger', 'hover_intent');
		$('#site-navigation .ubermenu').ubermenu();
		forceClick = false;
	}
});
jQuery(document).ready(function(e){e(".mobile-trigger").click(function(n){n.preventDefault(),e(this).toggleClass("open"),e(".mobile-nav-container").slideToggle(200)}),e("#mobile-nav > li").find(".sub-menu").parent().children("a").after('<span class="menu-slide"></span>'),e("#mobile-nav > li .menu-slide").on("click",function(n){e(this).toggleClass("open"),n.preventDefault(),e(this).parent().find("> .sub-menu").slideToggle(200)})});
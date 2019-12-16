(function($) {
    var input = $('input[type="search"].search-page'),
    context = $('#content > .accordion > section');
    count = $('.ti-counter');
    count.slideUp(0);

    input.on('input', function() {
        var term = $(this).val();
        context.removeClass('is-hidden').unmark();
        count.removeClass('has-content').text('');
        count.slideDown(200);
        if (term) {
            context.mark(term, {
                separateWordSearch: false,
                done: function(total) {
                    context.filter(':has(mark)').addClass('active').removeClass('is-hidden');
                    context.not(':has(mark)').addClass('is-hidden').removeClass('active');

                    var sections = context.filter(':has(mark)').length;

                    count.addClass('has-content');

                    if (total > 1) {
                        count.text(total + ' matches in ' + sections + ' sections');
                    } else if (total == 1) {
                        count.text(total + ' match in 1 section');
                    } else {
                        count.text('Sorry! No matches.');
                    }
                }
            });
        }
    });
})(jQuery);
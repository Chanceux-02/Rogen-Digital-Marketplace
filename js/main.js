//for scrolling
$(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
        $('#navbar').addClass('top').css('transition', 'all 0.6s ease-in-out');;
        $('#navbar').removeClass('filter');
    } else {
        $('#navbar').addClass('filter').css('transition', 'all 0.6s ease-in-out');;
        $('#navbar').removeClass('top');
    }
});


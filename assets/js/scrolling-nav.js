$(window).scroll(function() {
    if ($(".navbar").offset().top > 30) {
        $(".navbar").addClass("navbar-offset");
    } else {
        $(".navbar").removeClass("navbar-offset");
    }
});
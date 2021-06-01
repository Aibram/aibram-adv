(function($) {
    var $main_window = $(window);
    $main_window.on("load", function() {
        $("#preloader").fadeOut("slow");
    });
    $main_window.on("scroll", function() {
        if ($(this).scrollTop() > 250) {
            $(".back-to-top").fadeIn(200);
        } else {
            $(".back-to-top").fadeOut(200);
        }
    });
    $(".back-to-top").on("click", function() {
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });
    // $(".mobile-menu").slicknav({
    //   prependTo: ".navbar-header",
    //   parentTag: "liner",
    //   allowParentLinks: true,
    //   duplicate: true,
    //   label: "",
    //   closedSymbol: '<i class="lni-chevron-right"></i>',
    //   openedSymbol: '<i class="lni-chevron-down"></i>',
    // });
    $main_window.on("scroll", function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 10) {
            $(".scrolling-navbar").addClass("top-nav-collapse");
        } else {
            $(".scrolling-navbar").removeClass("top-nav-collapse");
        }
    });
    if ($(".counter").length > 0) {
        $(".counterUp").counterUp({ delay: 10, time: 2000 });
    }


    var wow = new WOW({ mobile: false });
    wow.init();
    $('[data-toggle="tooltip"]').tooltip();
    var testiOwl = $("#testimonials");
    testiOwl.owlCarousel({
        autoplay: true,
        margin: 30,
        dots: false,
        autoplayHoverPause: true,
        nav: false,
        loop: true,
        responsiveClass: true,
        rtl: true,
        responsive: { 0: { items: 1 }, 991: { items: 2 } },
    });
    var newproducts = $("#new-products");
    newproducts.owlCarousel({
        autoplay: true,
        nav: true,
        autoplayHoverPause: true,
        smartSpeed: 350,
        dots: false,
        margin: 30,
        loop: true,
        rtl: true,
        navText: [
            '<i class="lni-chevron-left"></i>',
            '<i class="lni-chevron-right"></i>',
        ],
        responsiveClass: true,
        responsive: { 0: { items: 1 }, 575: { items: 2 }, 991: { items: 3 } },
    });
    var categoriesslider = $("#categories-icon-slider");
    categoriesslider.owlCarousel({
        autoplay: true,
        nav: true,
        autoplayHoverPause: true,
        smartSpeed: 350,
        dots: false,
        margin: 30,
        loop: true,
        rtl: true,
        navText: [
            '<i class="lni-chevron-left"></i>',
            '<i class="lni-chevron-right"></i>',
        ],
        responsiveClass: true,
        responsive: { 0: { items: 1 }, 575: { items: 2 }, 991: { items: 5 } },
    });
    var detailsslider = $("#owl-demo");
    detailsslider.owlCarousel({
        autoplay: true,
        nav: false,
        autoplayHoverPause: true,
        smartSpeed: 350,
        dots: true,
        margin: 30,
        loop: true,
        rtl: true,
        autoWidth: false,
        navText: [
            '<i class="lni-chevron-left"></i>',
            '<i class="lni-chevron-right"></i>',
        ],
        responsiveClass: true,
        responsive: { 0: { items: 1 }, 575: { items: 1 }, 991: { items: 1 } },
    });
    var detailsslider = $("#owl-demo2");
    detailsslider.owlCarousel({
        autoplay: false,
        nav: true,
        autoplayHoverPause: true,
        smartSpeed: 350,
        dots: true,
        padding: 50,
        autoWidth: true,
        loop: false,
        rtl: true,
        navText: [
            '<i class="lni-chevron-left"></i>',
            '<i class="lni-chevron-right"></i>',
        ],
        responsiveClass: true,
        responsive: { 0: { items: 3 }, 575: { items: 3 }, 991: { items: 3 } },
    });


    var detailsslider1 = $("#owl-demo3");
    detailsslider1.owlCarousel({
        autoplay: false,
        nav: true,
        autoplayHoverPause: true,
        smartSpeed: 350,
        dots: true,
        padding: 50,
        autoWidth: true,
        loop: false,
        rtl: true,
        navText: [
            '<i class="lni-chevron-left"></i>',
            '<i class="lni-chevron-right"></i>',
        ],
        responsiveClass: true,
        responsive: { 0: { items: 5 }, 575: { items: 5 }, 991: { items: 3 } },
    });

    $('#stars li').on('mouseover', function() {
        var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

        // Now highlight all the stars that's not after the current hovered star
        $(this).parent().children('li.star').each(function(e) {
            if (e < onStar) {
                $(this).addClass('hover');
            } else {
                $(this).removeClass('hover');
            }
        });

    }).on('mouseout', function() {
        $(this).parent().children('li.star').each(function(e) {
            $(this).removeClass('hover');
        });
    });


    /* 2. Action to perform on click */
    $('#stars li').on('click', function() {
        var onStar = parseInt($(this).data('value'), 10); // The star currently selected
        var stars = $(this).parent().children('li.star');

        for (i = 0; i < stars.length; i++) {
            $(stars[i]).removeClass('selected');
        }

        for (i = 0; i < onStar; i++) {
            $(stars[i]).addClass('selected');
        }

    });
    $('.image-popup-no-margins').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        closeBtnInside: false,
        fixedContentPos: true,
        mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
        image: {
            verticalFit: true
        },
        zoom: {
            enabled: true,
            duration: 300 // don't foget to change the duration also in CSS
        }
    });

})(jQuery);
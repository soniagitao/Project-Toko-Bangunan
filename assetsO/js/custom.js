; (function ($) {
    "use strict"
    var nav_offset_top = $('.header_area').height() + 50;
    /*-------------------------------------------------------------------------------
	  Navbar 
    -------------------------------------------------------------------------------*/

    //* Navbar Fixed  
    function navbarFixed() {
        if ($('.header_area').length) {
            $(window).scroll(function () {
                var scroll = $(window).scrollTop();
                if (scroll >= nav_offset_top) {
                    $(".header_area").addClass("navbar_fixed");
                    $('#searchInput').fadeOut();
                } else {
                    $(".header_area").removeClass("navbar_fixed");
                }
            });
        };
    };
    navbarFixed();

    //--------  Testimonial Carousel --------// 
    if ($('.active_testimonial').length) {
        $('.active_testimonial').owlCarousel({
            items: 1,
            loop: true,
            dots: false,
            nav: true,
            margin: 0,
            responsiveClass: true,
            autoplay: 2500,
            slideSpeed: 300,
            paginationSpeed: 500,
            navText: ["<i class='fa fa-long-arrow-left'>","<i class='fa fa-long-arrow-right'>"]
        });
    }

    //-------- Counter js --------//
    $(window).on("load", function () {
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
    });

    //------- Mailchimp js --------//  

    function mailChimp() {
        $('#mc_embed_signup').find('form').ajaxChimp();
    }
    mailChimp();


    $('select').niceSelect();

    /*----------------------------------------------------*/
    /*  Google map js
    /*----------------------------------------------------*/
    // Partner Map
    if (document.getElementById('mapBox')) {
        var map = new google.maps.Map(document.getElementById('mapBox'), {
            zoom: 12,
            center: new google.maps.LatLng(23.81, 90.41),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var marker;
        marker = new google.maps.Marker({
            map: map
        });
    }

})(jQuery)
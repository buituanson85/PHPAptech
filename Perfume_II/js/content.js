(function ($){
    "use strict";

    //  activation of one column of deal product

    $(".deals_carousel")
        .on("changed.owl.carousel initialized.owl.carousel", function (event){
        $(event.target)
            .find(".owl-item")
            .removeClass("last")
            .eq(event.item.index + event.page.size - 1)
            .addClass("last");
    }).owlCarousel({
        autoplay: true,
        loop: true,
        nav: true,
        autoplayTimeout: 5000,
        items : 4,
        dots: false,
        navText : [
            '<i class="fa fa-arrow-left"></i>',
            '<i class="fa fa-arrow-right"></i>',
        ],
        responsiveClass: true,
        responsive: {
            0: {
                items : 1,
            },
            768: {
                items : 2,
            },
            992 : {
                items : 1,
            },
        },
    });

//    count activation
    $("[data-countdown]").each(function (){
        var $this = $(this),
            finalDate = $(this).data("countdown");
        $this.countdown(finalDate, function (event){
            $this.html(
                event.strftime(
                    '<div class="countdown_are"><div class="single_countdown"><div class="countdown_number">%D</div><div class="coundown_title">Days</div></div><div class="single_countdown"><div ' +
                    'class="countdown_number">%H</div><div class="coundown_title">Hours</div></div><div class="single_countdown"><div class="countdown_number">%M</div><div ' +
                    'class="coundown_title">mins</div></div><div class="single_countdown"><div class="countdown_number">%S</div><div class="coundown_title">secs</div> </div></div>'
                )
            )
        });
    });

    // activation of one column of Best seller product
    $(".sidebar_product_column1")
        .on("changed.owl.carousel initialized.owl.carousel", function (event){
            $(event.target)
                .find(".owl-item")
                .removeClass("last")
                .eq(event.item.index + event.page.size - 1)
                .addClass("last");
        }).owlCarousel({
        autoplay: false,
        loop: true,
        nav: true,
        autoplayTimeout: 5000,
        items : 4,
        dots: false,
        navText : [
            '<i class="fa fa-arrow-left"></i>',
            '<i class="fa fa-arrow-right"></i>',
        ],
        responsiveClass: true,
        responsive: {
            0: {
                items : 1,
            },
            768: {
                items : 2,
                margin: 30,
            },
            992 : {
                items : 1,
            },
        },
    });
// Testtimial activation
    $(".testimonial_sidebar_carousel").owlCarousel({
        autoplay: false,
        loop: true,
        nav: true,
        autoplayTimeout: 5000,
        items : 1,
        dots: false,
        navText : [
            '<i class="fa fa-arrow-left"></i>',
            '<i class="fa fa-arrow-right"></i>',
        ],
    });

    //
    $(".product_column3")
        .on("changed.owl.carousel initialized.owl.carousel", function (event){
            $(event.target)
                .find(".owl-item")
                .removeClass("last")
                .eq(event.item.index + event.page.size - 1)
                .addClass("last");
        }).owlCarousel({
        autoplay: false,
        loop: true,
        nav: true,
        autoplayTimeout: 5000,
        items : 4,
        dots: false,
        navText : [
            '<i class="fa fa-arrow-left"></i>',
            '<i class="fa fa-arrow-right"></i>',
        ],
        responsiveClass: true,
        responsive: {
            0: {
                items : 1,
            },
            567: {
                items : 2,
            },
            768: {
                items : 3,
            },
            992 : {
                items : 3,
            },
        },
    });
//    activation of blog section
    $(".blog_column3").owlCarousel({
        autoplay: false,
        loop: true,
        nav: true,
        autoplayTimeout: 5000,
        items : 4,
        dots: false,
        navText : [
            '<i class="fa fa-arrow-left"></i>',
            '<i class="fa fa-arrow-right"></i>',
        ],
        responsiveClass: true,
        responsive: {
            0: {
                items : 1,
            },
            768: {
                items : 2,
            },
            992 : {
                items : 3,
            },
        },
    });
})(jQuery);
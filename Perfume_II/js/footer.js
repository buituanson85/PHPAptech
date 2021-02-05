(function ($){
    "use strict";
    $(".small_product_column1")
        .on("changed.owl.carousel initialized.owl.carousel", function (event){
            $(event.target)
                .find(".owl-item")
                .removeClass("last")
                .eq(event.item.index + event.page.size - 1)
                .addClass("last");
        }).owlCarousel({
        autoplay: false,
        loop: true,
        nav: false,
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
                margin : 15,
            },
            768: {
                items : 3,
            },
        },
    });
    //    activation of blog section

})(jQuery);
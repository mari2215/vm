// (function ($) {
//     $(document).ready(function () {
//         "use strict";

//     // Testimonials carousel
//     $(".testimonial-carousel").owlCarousel({
//         items: 1,
//         autoplay: true,
//         smartSpeed: 1000,
//         dots: true,
//         loop: true,
//         nav: true,
//         navText : [
           
//             '<a style = "transform: rotate(180deg);">→</a>',
//             '<a>→</a>'
//         ]
//     });
//     });

    
// })(jQuery);
(function ($) {
        $(document).ready(function () {
            "use strict";
            $(".custom-carousel").owlCarousel({
                autoWidth: true,
                loop: true
            });
            $(document).ready(function () {
                $(".custom-carousel .item").click(function () {
                $(".custom-carousel .item").not($(this)).removeClass("active");
                $(this).toggleClass("active");
                });
            });
        });
})(jQuery);





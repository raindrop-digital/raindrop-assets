jQuery(document).ready(function($){
    $(".supermums-post-slider").find(".supermums-post-slider-items").slick({
                slidesToShow: 3,
                slidesToScroll: 3,
                autoplaySpeed: 6000,
                autoplay: true,
                infinite: true,
                pauseOnHover: true,
                speed: 800,
                arrows: true,
                dots: true,
                rtl: false,
                responsive: [{
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                }, {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
            }
        }]
    });
});
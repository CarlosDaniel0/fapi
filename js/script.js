$(document).ready(function() {
    $('#autoWidth').lightSlider({
        autoWidth:true,
        auto: true,
        loop:true,
        pauseOnHover: true,
        onSliderLoad: function() {
            $('#autoWidth').removeClass('cS-hidden');
        },
        onBeforeSlide: function (el) {
            $('#current').text(el.getCurrentSlideCount());
        } 
    });  
});

$('.owl-carousel').owlCarousel({
    loop:true,
    margin:0,
    responsiveClass:true,
    autoplay: true,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1,
            nav:false,
        },
        600: {
            items: 2,
            nav: false,
        },
        1000:{
            items:3,
            nav:false,
        }
    }
})
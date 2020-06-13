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

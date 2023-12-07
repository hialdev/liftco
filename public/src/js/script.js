$('#menu-close').click(function (){
    $('.menu').removeClass('active');
})

$('#menu-open').click(function (){
    $('.menu').addClass('active');
})

$('#menu-product-btn').click(function(){
    $('#menu-product-dropdown').fadeToggle();
})

$('#open-floating').click(function(){
    $('#data-floating').toggleClass('d-flex');
    $(this).addClass('d-none');
})

$('#close-floating').click(function(){
    $('#data-floating').removeClass('d-flex');
    $('#open-floating').removeClass('d-none');
})

var elementPosition = $('.menu-box').offset();

$(window).scroll(function(){
    if($(window).scrollTop() > elementPosition.top){
            $('.menu-box').addClass('sticky-al');
    } else {
        $('.menu-box').removeClass('sticky-al');
    }    
});
$(document).ready(function(){
    // Menu Product Nested Toggle
    $('.product-menu-1st').click(function (e) {
        e.stopPropagation();
        $(this).parents('.menu-1st').find('.menu-2nd').toggle();
    })
    $('.product-menu-2nd').click(function () {
        $(this).parents('.menu-2nd').find('.menu-3rd').toggle();
    })
    $('.product-menu-3rd').click(function () {
        $(this).parents('.menu-3rd').find('.menu-last').toggle();
    })
})
const hero = $('.hero-carousel');
hero.owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    items:1,
    dotsContainer:'#hero-dots',
    autoHeight:true
})
$('.next-hero').click(function() {
    hero.trigger('next.owl.carousel');
})
$('.prev-hero').click(function() {
    hero.trigger('prev.owl.carousel', [300]);
})

const item = $('.item-carousel');
item.owlCarousel({
    loop:false,
    margin:10,
    nav:false,
    items:1,
    dotsContainer:'#item-dots',
    autoHeight:true
})
$('.next-item').click(function() {
    item.trigger('next.owl.carousel');
})
$('.prev-item').click(function() {
    item.trigger('prev.owl.carousel', [300]);
})

$('.brand-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    autoplay:true,
    responsive:{
        0:{
            items:2,
        },
        720:{
            items:3,
        },
        930:{
            items:4,
        },
        1020:{
            items:4,
        }
    }
})

$('.client-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    autoplay:true,
    responsive:{
        0:{
            items:2,
        },
        720:{
            items:4,
        },
        930:{
            items:5,
        },
        1020:{
            items:6,
        }
    }
})
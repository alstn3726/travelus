$(document).ready(function() {
    var mySwiper = new Swiper ('.swiper-container', {
        direction: 'horizontal',
        // effect: fade,
        centeredSlides: true,
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false
        }, 
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        }    
    })
});
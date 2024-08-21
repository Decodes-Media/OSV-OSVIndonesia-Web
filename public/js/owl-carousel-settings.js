$(".owl-carousel-1").owlCarousel({
    items: 1,
    slideTransition: 'linear',
    loop: true,
    margin: 20,
    autoplay: true,
    smartSpeed: 5000,
    autoplayTimeout: 8000,
    autoplayHoverPause: true,
    rewind: false,
    stagePadding: 100,
    nav: false,
    navText: ["<div class='nav-btn prev-slide'><ion-icon name='arrow-back-outline'></ion-icon></div>", "<div class='nav-btn next-slide'><ion-icon name='arrow-forward-outline'></ion-icon></div>"],
    responsiveClass: true,
    responsive: {
        0: {
            items: 1,
        },
        575: {
            items: 1,
        },
        768: {
            items: 1,
        },
        992: {
            items: 2,
        }
    }
});

$(".owl-carousel-2").owlCarousel({
    items: 2,
    slideTransition: 'linear',
    loop: true,
    margin: 20,
    autoplay: false,
    smartSpeed: 1500,
    autoplayTimeout: 1500,
    autoplayHoverPause: true,
    rewind: false,
    nav: false,
    navText: ["<div class='nav-btn prev-slide'><ion-icon name='arrow-back-outline'></ion-icon></div>", "<div class='nav-btn next-slide'><ion-icon name='arrow-forward-outline'></ion-icon></div>"],
    responsiveClass: true,
    responsive: {
        0: {
            items: 1,
        },
        575: {
            items: 1,
        },
        768: {
            items: 2,
        },
        992: {
            items: 2,
        }
    }
});
$(".owl-carousel-1").owlCarousel({
    items: 1,
    loop: true,
    nav: true,
    autoplay: true,
    autoplayTimeout: 5000,
    smartSpeed: 5000,
    animateOut: "slideOutDown",
    animateIn: "slideInDown",
    navText: ["<div class='nav-btn prev-slide'><ion-icon name='arrow-up-outline'></ion-icon></div>", "<div class='nav-btn next-slide'><ion-icon name='arrow-down-outline'></ion-icon></div>"],
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
            items: 1,
        }
    }
});

$(".owl-carousel-2").owlCarousel({
    items: 1,
    loop: true,
    nav: true,
    autoplay: true,
    autoplayTimeout: 5000,
    smartSpeed: 5000,
    animateOut: "fadeOut",
    animateIn: "fadeIn",
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
            items: 1,
        }
    }
});

$(".owl-carousel-project-gallery").owlCarousel({
    items: 1,
    loop: true,
    nav: true,
    autoplay: true,
    autoplayTimeout: 5000,
    smartSpeed: 5000,
    animateOut: "fadeOut",
    animateIn: "fadeIn",
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
            items: 1,
        }
    }
});
$(document).ready(function() {
    $('#project').on('shown.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        
        var projectData = button.data('project');

        // DEBUG: Check if projectData is being fetched correctly
        console.log("Project Data:", projectData);

        if (!projectData || !projectData.image || projectData.image.length === 0) {
            console.error('No project data or images available');
            return;
        }

        $('.modal-title').html(
            projectData.name + '<br>' +
            '<span>' +
            projectData.location +
            '</span>'
        );

        var projectGallery = '';
        for (let index = 0; index < projectData.image.length; index++) {
            if (projectData.image[index] != null) {
                projectGallery += '<div class="item">' + 
                    '<img src="' + projectData.image[index] + '" alt="' + projectData.name + ' ' + (index+1) + '" class="img-fluid w-100">' +
                    '</div>';
            }
        }

        // Insert the gallery items into the Owl Carousel
        var $carousel = $('.owl-carousel-project-gallery');
        $carousel.html(projectGallery);

        // Destroy the existing Owl Carousel instance if it exists
        if ($carousel.hasClass('owl-loaded')) {
            $carousel.trigger('destroy.owl.carousel'); // Destroy the current instance
            $carousel.html(projectGallery); // Re-insert items after destroying
        }

        // Reinitialize the carousel
        setTimeout(function() {
            $carousel.owlCarousel({
                items: 1,
                loop: true,
                nav: true,
                autoplay: true,
                autoplayTimeout: 5000,
                smartSpeed: 1000,
                animateOut: "fadeOut",
                animateIn: "fadeIn",
                navText: [
                    "<div class='nav-btn prev-slide'><ion-icon name='arrow-back-outline'></ion-icon></div>", 
                    "<div class='nav-btn next-slide'><ion-icon name='arrow-forward-outline'></ion-icon></div>"
                ],
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
        }, 100); // Added slight delay to ensure modal content is fully visible
    });

    // Optional: Destroy the carousel when the modal is hidden to avoid reinitialization issues
    $('#project').on('hidden.bs.modal', function () {
        $('.owl-carousel-project-gallery').owlCarousel('destroy');
    });
});
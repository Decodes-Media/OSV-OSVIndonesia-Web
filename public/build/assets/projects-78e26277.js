$(document).ready(function(){$("#project").on("shown.bs.modal",function(i){var l=$(i.relatedTarget),e=l.data("project");if(console.log("Project Data:",e),!e||!e.image||e.image.length===0){console.error("No project data or images available");return}$(".modal-title").html(e.name+'<br><span><i class="fa fa-map-pin mr-1"></i>'+e.location+"</span>");var t="";for(let o=0;o<e.image.length;o++)e.image[o]!=null&&(t+='<div class="item"><img src="'+e.image[o]+'" alt="'+e.name+" "+(o+1)+'" class="img-fluid w-100"></div>');var a=$(".owl-carousel-project-gallery");a.html(t),a.hasClass("owl-loaded")&&(a.trigger("destroy.owl.carousel"),a.html(t)),setTimeout(function(){a.owlCarousel({items:1,loop:!0,nav:!0,autoplay:!0,autoplayTimeout:5e3,smartSpeed:1e3,animateOut:"fadeOut",animateIn:"fadeIn",navText:["<div class='nav-btn prev-slide'><ion-icon name='arrow-back-outline'></ion-icon></div>","<div class='nav-btn next-slide'><ion-icon name='arrow-forward-outline'></ion-icon></div>"],responsive:{0:{items:1},575:{items:1},768:{items:1},992:{items:1}}})},100)}),$("#project").on("hidden.bs.modal",function(){$(".owl-carousel-project-gallery").owlCarousel("destroy")})});

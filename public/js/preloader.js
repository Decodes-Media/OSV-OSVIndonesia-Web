document.addEventListener("DOMContentLoaded", function() {
    var preloader = document.getElementById("preloader");
    setTimeout(function() {
        preloader.style.opacity = "0";
        setTimeout(function() {
            preloader.style.display = "none";
        }, 500);
    }, 2000);
});

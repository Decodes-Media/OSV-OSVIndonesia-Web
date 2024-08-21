// AOS
window.onload = function() {
	AOS.init({ duration: 800, once: true });
}

// Sticky Navbar
window.addEventListener("scroll", function() {
	var header = document.querySelector("header");
	header.classList.toggle("sticky", window.scrollY > 0);
})

// SWAL
window.swalSuccess = function(html) {
  swal({title: 'Berhasil!', icon: 'success', content: {
    element:'p', attributes: { innerHTML: html }
  }})
};

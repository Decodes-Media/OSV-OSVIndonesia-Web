// Preloader
document.querySelector('#app').style.opacity = 0;
document.querySelector('#preloader').style.opacity = 1;

document.addEventListener('DOMContentLoaded', () => {
  setTimeout(() => {
    document.querySelector('#preloader').style.opacity = 0;
    document.querySelector('#preloader').setAttribute('aria-busy', false);
    document.querySelector('#app').style.opacity = 1;
  }, 1000);
});
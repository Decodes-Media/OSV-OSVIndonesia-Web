document.addEventListener("DOMContentLoaded",function(){const t=document.querySelectorAll(".project-item"),e=document.getElementById("load-more-btn");let s=5,n=1;function o(){const l=n*s;t.forEach((c,d)=>{d<l?c.style.display="block":c.style.display="none"}),l>=t.length?e.style.display="none":e.style.display="block"}o(),e.addEventListener("click",function(){n++,o()})});

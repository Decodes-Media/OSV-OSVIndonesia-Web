window.onload=function(){AOS.init({duration:800,once:!0})};document.addEventListener("DOMContentLoaded",function(){const e={root:null,rootMargin:"0px",threshold:.4};let t=n=>{n.forEach(r=>{let a=r.target;if(r.isIntersecting){console.log(a),a.classList.add("animating");return}r.boundingClientRect.top>0&&a.classList.remove("animating")})},i=new IntersectionObserver(t,e);document.querySelectorAll(".reveal").forEach(n=>{i.observe(n)});let s=n=>{n.forEach(r=>{let a=r.target;if(a.classList.add("not-fading-up"),r.isIntersecting){a.classList.add("fading-up");return}r.boundingClientRect.top>0&&a.classList.remove("fading-up")})},o=new IntersectionObserver(s,e);document.querySelectorAll(".fadeup").forEach(n=>{o.observe(n)})});let l=[...document.querySelectorAll(".tagline li")],c={rootMargin:"-5%",threshold:0},d=new IntersectionObserver(u,c);function u(e){e.forEach(t=>{t.isIntersecting&&([...t.target.querySelectorAll(".tagline span")].forEach((s,o)=>{setTimeout(()=>{s.classList.add("active")},o*40)}),t.target.children[0].classList.add("active"))})}l.forEach(e=>{let t="";e.children[0].innerText.split("").map(s=>t+=s==""?"<span class='gap'></span>":`<span>${s}</span>`),e.innerHTML=t,d.observe(e)});
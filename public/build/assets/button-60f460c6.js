const o=(t,e=document)=>e.querySelectorAll(t);o(".btn-magnetic").forEach(t=>t.addEventListener("mousemove",function(e){const n=this.getBoundingClientRect(),s=e.clientX-n.left-n.width/2,r=e.clientY-n.top-n.height/2;this.style.transform="translate("+s*.15+"px, "+r*.3+"px)",this.style.transform+="rotate3d("+s*-.1+", "+r*-.3+", 0, 12deg)",this.children[0].style.transform="translate("+s*.025+"px, "+r*.075+"px)"}));o(".btn-magnetic").forEach(t=>t.addEventListener("mouseleave",function(){this.style.transform="translate3d(0px, 0px, 0px)",this.style.transform+="rotate3d(0, 0, 0, 0deg)",this.children[0].style.transform="translate3d(0px, 0px, 0px)"}));
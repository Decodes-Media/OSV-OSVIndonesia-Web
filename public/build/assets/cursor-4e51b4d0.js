$(window).mousemove(function(n){$(".ring").css("transform",`translateX(calc(${n.clientX}px - 1.25rem)) translateY(calc(${n.clientY}px - 1.25rem))`)});

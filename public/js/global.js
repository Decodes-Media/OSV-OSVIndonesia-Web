// AOS
window.onload = function () {
	AOS.init({
		duration: 800,
		once: false
	});
}

// Image Reveal
document.addEventListener("DOMContentLoaded", function () {
	const options = {
		root: null,
		rootMargin: "0px",
		threshold: 0.4
	};

	// IMAGE ANIMATION

	let revealCallback = (entries) => {
		entries.forEach((entry) => {
			let container = entry.target;

			if (entry.isIntersecting) {
				console.log(container);
				container.classList.add("animating");
				return;
			}

			if (entry.boundingClientRect.top > 0) {
				container.classList.remove("animating");
			}
		});
	};

	let revealObserver = new IntersectionObserver(revealCallback, options);

	document.querySelectorAll(".reveal").forEach((reveal) => {
		revealObserver.observe(reveal);
	});

	// TEXT ANIMATION
	let fadeupCallback = (entries) => {
		entries.forEach((entry) => {
			let container = entry.target;
			container.classList.add("not-fading-up");

			if (entry.isIntersecting) {
				container.classList.add("fading-up");
				return;
			}

			if (entry.boundingClientRect.top > 0) {
				container.classList.remove("fading-up");
			}
		});
	};

	let fadeupObserver = new IntersectionObserver(fadeupCallback, options);

	document.querySelectorAll(".fadeup").forEach((fadeup) => {
		fadeupObserver.observe(fadeup);
	});
});


// Text Reveal
let listItems = [...document.querySelectorAll('.tagline li')];

let options = { rootMargin: '-5%', threshold: 0.0 };

let observer = new IntersectionObserver(showItem, options);


function showItem(entries){
    entries.forEach(entry => {
        if(entry.isIntersecting){
            let letters = [...entry.target.querySelectorAll('.tagline span')];
            letters.forEach((letter, idx) => {
                setTimeout(() => {
                    letter.classList.add('active')
                }, idx * 40)
            })
            entry.target.children[0].classList.add('active');
        }
    })
};

listItems.forEach(item => {
    let newString = '';
    let itemText = item.children[0].innerText.split('');
    itemText.map(letter => (newString += letter == '' ? `<span class='gap'></span>` : `<span>${letter}</span>`));
    item.innerHTML = newString; 

    observer.observe(item)
});
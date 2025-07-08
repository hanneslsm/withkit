// src/js/image-reveal.js
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

const figures = document.querySelectorAll('.with-animation-image-reveal');

figures.forEach((figure) => {
	const img = figure.querySelector('img');
	if (!img) return;

	// Bild an Ort, Clip-Pfad verdeckt es vollständig
	gsap.set(img, { clipPath: 'inset(100% 0 0 0)' });

	// Reveal von unten nach oben
	gsap.to(img, {
		clipPath: 'inset(0% 0 0 0)',
		duration: 1,
		ease: 'power2.out',
		scrollTrigger: {
			trigger: figure,
			start: 'bottom 85%',
			toggleActions: 'play none none none',
		},
	});
});

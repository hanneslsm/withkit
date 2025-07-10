/**
 * Image reveal on scroll with a reduced-motion fallback.
 *
 * @see https://greensock.com/docs/v3/Plugins/ScrollTrigger
 */

import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

// Respect the user’s motion preference.
const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

// Register ScrollTrigger only when motion is allowed.
if (!prefersReducedMotion) {
	gsap.registerPlugin(ScrollTrigger);
}

const figures = document.querySelectorAll('.with-animation-image-reveal');

figures.forEach((figure) => {
	const img = figure.querySelector('img');
	if (!img) {
		return;
	}

	if (prefersReducedMotion) {
		// Show the image immediately—no animation, no ScrollTrigger.
		gsap.set(img, { clipPath: 'inset(0% 0 0 0)' });
		return;
	}

	// Initial state: image fully clipped (hidden).
	gsap.set(img, { clipPath: 'inset(100% 0 0 0)' });

	// Reveal animation from bottom to top.
	gsap.to(img, {
		clipPath: 'inset(0% 0 0 0)',
		duration: 1,
		ease: 'power2.out',
		scrollTrigger: {
			trigger: figure,
			start: 'bottom 85%',
			toggleActions: 'play none none none',
			once: true, // guarantees the animation runs only once
		},
	});
});

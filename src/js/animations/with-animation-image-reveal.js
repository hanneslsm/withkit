/**
 * Image reveal on scroll with reduced-motion fallback.
 *
 * @see https://greensock.com/docs/v3/Plugins/ScrollTrigger
 */

import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

const prefersReducedMotion = window.matchMedia(
	'(prefers-reduced-motion: reduce)'
).matches;

if ( ! prefersReducedMotion ) {
	gsap.registerPlugin( ScrollTrigger );
}

const figures = document.querySelectorAll( '.with-animation-image-reveal' );
const isMobile = window.matchMedia( '(max-width: 767px)' ).matches;
const startPos = isMobile ? 'top bottom' : 'bottom 85%'; // fire earlier on small screens

figures.forEach( ( figure ) => {
	const img = figure.querySelector( 'img' );
	if ( ! img ) {
		return;
	}

	if ( prefersReducedMotion ) {
		gsap.set( img, { clipPath: 'inset(0% 0 0 0)' } );
		return;
	}

	// fully clip image at load
	gsap.set( img, { clipPath: 'inset(100% 0 0 0)' } );

	gsap.to( img, {
		clipPath: 'inset(0% 0 0 0)',
		duration: 1,
		ease: 'power2.out',
		scrollTrigger: {
			trigger: figure,
			start: startPos,
			toggleActions: 'play none none none',
			once: true,
		},
	} );
} );

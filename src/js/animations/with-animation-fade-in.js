import { gsap } from 'gsap';

const targets = document.querySelectorAll( '.with-animation-fade-in' );

if ( targets.length > 0 ) {
	const prefersReducedMotion = window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;

	if ( prefersReducedMotion ) {
		// Reveal instantly—no movement, no opacity transition.
		gsap.set( targets, { y: 0, opacity: 1 } );
	} else {
		gsap.fromTo(
			targets,
			{ y: 200, opacity: 0 },
			{ y: 0, opacity: 1, duration: 0.6, ease: 'power1.out' }
		);
	}
}

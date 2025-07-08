import { gsap } from 'gsap';

const targets = document.querySelectorAll( '.with-animation-fade-in' );

if ( targets.length > 0 ) {
	gsap.from( targets, {
		y: 200,
		opacity: 0,
	} );

	gsap.to( targets, {
		y: 0,
		opacity: 1,
		duration: 0.6,
	} );
}

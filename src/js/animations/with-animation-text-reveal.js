/**
 * Word-by-word text reveal with a reduced-motion fallback and screen-reader-friendly markup.
 *
 * Splits each target element’s text into spans, animates the letters unless the
 * user prefers reduced motion, and keeps the original text available for AT.
 */

import { gsap } from 'gsap';

const prefersReducedMotion = window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;
const targets = document.querySelectorAll( '.with-animation-text-reveal' );

targets.forEach( ( el ) => {
	const originalText = el.textContent.trim();
	if ( ! originalText ) {
		return;
	}

	// Build the DOM only when animation is allowed.
	if ( ! prefersReducedMotion ) {
		const words = originalText.split( ' ' );

		el.setAttribute( 'aria-label', originalText ); // Expose full text to screen readers.
		el.innerHTML = words
			.map( ( word ) => {
				const letters = word
					.split( '' )
					.map(
						( char ) =>
							`<span class="with-animation-text-reveal__char" aria-hidden="true">${char}</span>`
					)
					.join( '' );

				// &nbsp; keeps word spacing intact while preventing extra span splits.
				return `<span class="with-animation-text-reveal__word" aria-hidden="true">${letters}&nbsp;</span>`;
			} )
			.join( '' );

		const chars = el.querySelectorAll( '.with-animation-text-reveal__char' );

		gsap.fromTo(
			chars,
			{ y: '100%', opacity: 0 },
			{
				y: '0%',
				opacity: 1,
				stagger: 0.025,
				duration: 0.6,
				ease: 'power3.out',
				delay: 0.3,
			}
		);
	} else {
		// Reduced-motion path: reveal instantly, keep markup unchanged.
		gsap.set( el, { opacity: 1 } );
	}
} );

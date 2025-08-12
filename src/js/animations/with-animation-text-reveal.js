import { gsap } from 'gsap';

const prefersReducedMotion = window.matchMedia(
	'(prefers-reduced-motion: reduce)'
).matches;
const targets = document.querySelectorAll( '.with-animation-text-reveal' );

targets.forEach( ( el ) => {
	const originalText = el.textContent.trim();
	if ( ! originalText ) {
		return;
	}

	if ( prefersReducedMotion ) {
		gsap.set( el, { opacity: 1 } );
		return;
	}

	const words = originalText.split( ' ' );
	const srSpan = `<span class="with-animation-text-reveal__sr">${ originalText }</span>`;
	const wordMarkup = words
		.map( ( word, index ) => {
			const lettersMarkup = [ ...word ]
				.map(
					( char ) =>
						`<span class="with-animation-text-reveal__char" aria-hidden="true">${ char }</span>`
				)
				.join( '' );

			const trailingSpace = index < words.length - 1 ? ' ' : '';

			return `<span class="with-animation-text-reveal__word" aria-hidden="true">${ lettersMarkup }</span>${ trailingSpace }`;
		} )
		.join( '' );

	el.innerHTML = srSpan + wordMarkup;

	const chars = el.querySelectorAll( '.with-animation-text-reveal__char' );

	gsap.to( chars, {
		y: '0%',
		opacity: 1,
		stagger: 0.025,
		duration: 0.6,
		ease: 'power3.out',
		delay: 0.3,
	} );
} );

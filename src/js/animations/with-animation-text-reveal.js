import { gsap } from 'gsap';

const targets = document.querySelectorAll('.with-animation-text-reveal');

targets.forEach((el) => {
	const words = el.textContent.trim().split(' ');

	el.innerHTML = words
		.map((word) => {
			const letters = word
				.split('')
				.map((char) => `<span class="with-animation-text-reveal__char">${char}</span>`)
				.join('');
			return `<span class="with-animation-text-reveal__word">${letters}&nbsp;</span>`;
		})
		.join('');

	const chars = el.querySelectorAll('.with-animation-text-reveal__char');

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
});

import { select, getData, on, inViewPort } from 'lib/dom'
import { throttle } from 'lib/utils'
export default el => {
	const counter = select('.js-count-up', el)
	const speed = 200

	const animate = () => {
		const value = +counter.getAttribute('data-value')
		const data = +counter.innerText

		const time = value / speed
		if (data < value) {
			counter.innerText = Math.ceil(data + time)
			setTimeout(animate, 1)
		} else {
			counter.innerText = value
		}
	}

	if (inViewPort(el)) {
		animate()
	}

	on(
		'scroll',
		throttle(() => {
			if (inViewPort(el)) {
				animate()
			}
		}, 100),
		window
	)
}

import { select } from 'lib/dom'
import Plyr from 'plyr'

export default el => {
	let currentVideo = null

	const videoEl = select('.js-video', el)
	if (!videoEl) {
		return false
	}

	if (currentVideo) {
		currentVideo.destroy()
	}

	currentVideo = new Plyr(videoEl, {
		volume: 0,
		autoplay: true,
		loop: {
			active: true
		},
		hideControls: true,
		tooltips: {
			controls: false
		}
	})
}

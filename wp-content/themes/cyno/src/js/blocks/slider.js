import { select, addClass, getData } from 'lib/dom'
import Swiper from 'swiper/bundle'

export default el => {
	const defaultOption = {}
	const sliderEl = select('.swiper', el)
	let slider = null

	if (sliderEl) {
		const optionEl =
			sliderEl && getData('options', sliderEl)
				? JSON.parse(getData('options', sliderEl))
				: defaultOption

		if (optionEl.pagination) {
			optionEl.pagination = {
				clickable: true,
				el: select('.swiper-pagination', el)
			}
		}

		if (optionEl.navigation) {
			optionEl.navigation = {
				nextEl: select('.swiper-button-next', el),
				prevEl: select('.swiper-button-prev', el)
			}
		}

		optionEl.on = {
			init: function () {
				addClass('swiper-loaded', sliderEl)
			}
		}

		slider = new Swiper(sliderEl, optionEl)
	}
}

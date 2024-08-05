import { select, addClass, removeClass } from 'lib/dom'
// import InfiniteScroll from 'infinite-scroll'

export default el => {
	const paginationEl = select('.pagination')
	const loaderEl = select('.loader')

	// if (paginationEl) {
	// 	const scrollObj = new InfiniteScroll(el, {
	// 		path: '.next.page-numbers',
	// 		append: '.js-content',
	// 		hideNav: '.pagination',
	// 		scrollThreshold: 400,
	// 		loadOnScroll: true,
	// 		history: false
	// 	})

	// 	scrollObj.on('request', function () {
	// 		addClass('is-loading', loaderEl)
	// 	})

	// 	scrollObj.on('append', function () {
	// 		removeClass('is-loading', loaderEl)
	// 	})
	// }
}

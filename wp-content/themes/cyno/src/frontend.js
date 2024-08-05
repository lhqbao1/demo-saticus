import './postcss/frontend.css'
import { selectAll, addClass, hasClass, closest, select } from 'lib/dom'

const blocks = document.querySelectorAll('[data-custom-block]')

const initCustomBlocks = () => {
	if (blocks) {
		blocks.forEach(block => {
			const blockName = block.getAttribute('data-custom-block')
			if (!blockName) {
				return
			}

			require(`./js/blocks/${blockName}.js`).default(block)
		})
	}
}

const initHeaderNavDropdown = () => {
	const headerEl = select('#header')
	if (headerEl) {
		const navDropdownCols = selectAll('.nav-dropdown-col', headerEl)

		if (navDropdownCols) {
			navDropdownCols.forEach(navDropdownCol => {
				const navDropdown = closest('.nav-dropdown', navDropdownCol)
				if (navDropdown && !hasClass('nav-dropdown-full', navDropdown)) {
					addClass('nav-dropdown-full', navDropdown)
				}
			})
		}
	}
}

document.addEventListener('DOMContentLoaded', () => {
	initCustomBlocks()
	initHeaderNavDropdown()
})

export const ItgFooter = function () {
	// Tablet and up constraints
	let footerAnchorContainer = document.getElementById('menu-footer-menu');
	let elementClicked = footerAnchorContainer.querySelectorAll(".menu-item-has-children>a");
	let itgSubmenus = document.querySelector("[class*=sub-menu]");
	let itgSubmenusToggler = document.querySelector(".ItgFooter__toggleBtn");

	elementClicked.forEach(function ($el) {

		$el.addEventListener('click', function () {
			event.preventDefault();
			let itgSubmenus = document.querySelectorAll("[class*=sub-menu]");

			for (var i = 0; i < itgSubmenus.length; i++) {
				itgSubmenus[i].classList.toggle("is-show");
				
			}
			itgSubmenusToggler.classList.add("is-active");
		});
	});

	itgSubmenusToggler.addEventListener('click', function () {
		event.preventDefault();
		let itgSubmenus = document.querySelectorAll("[class*=sub-menu]");
		for (var i = 0; i < itgSubmenus.length; i++) {
			itgSubmenus[i].classList.toggle("is-show");
		}
		itgSubmenusToggler.classList.toggle("is-active");
	});

	// Mobile-only logic
	const menuEntries = document.querySelectorAll('.itgFooter__mobile-flavour .menu-item');
	const subMenuEntries = Array
		.from(
			menuEntries,
			function (menuItem) {
				return menuItem.querySelector('.menu-item-has-children .sub-menu');
			}
		)
		.filter(function (element) {
			return element;
		});

	menuEntries
		.forEach(function (element) {
			element
				.addEventListener('click', function (event) {
					event.preventDefault();
					// Capture clicked element
					const clickedEntrySubMenu = event.target.parentElement.querySelector('.sub-menu');
					const isClickedElementShown = clickedEntrySubMenu.classList.contains('is-show');

					event.target.parentElement.classList.toggle('expanded');

					// Hide all entries
					subMenuEntries.forEach(function (element) {
						element.classList.remove('is-show');
					});
					// Then show/hide clicked one
					if (!isClickedElementShown) {
						clickedEntrySubMenu.classList.add('is-show');
						clickedEntrySubMenu.classList.add('pl-2');
						itgSubmenusToggler.classList.remove("is-active");
					}
				});
		});
};

ItgFooter();


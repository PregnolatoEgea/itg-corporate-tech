/**
* File navigation.js.
*
* Handles toggling the navigation menu for small screens and enables TAB key
* navigation support for dropdown menus.
*/
(function ()
{

	'use strict';

	var mainMenuToggle = document.getElementById('main-menu-toggle');
	var mainMenu = document.getElementById('main-menu');
	var mainMenuList = document.getElementById('main-menu__list');
	var mainMenuClose = document.getElementById('main-menu__close');
	var mainMenuParent = document.querySelectorAll('.main-menu__link');
	var mainMenuBack = document.querySelectorAll('.main-menu__back');
	var resizeTimer;

	// If Mobile, add active class (for transitions)
	// Where el is the DOM element you'd like to test for visibility
	function isHidden(el)
	{
		return (el.offsetParent === null);
	}

	// Encapsulate resizing
	function menuTransition()
	{
		// Add and remove menu active (transition) class
		mainMenu.classList.remove('active');
		if (!isHidden(mainMenuToggle))
		{
			mainMenu.classList.add('active');
		}
		else
		{
			mainMenu.classList.remove('active');
		}
	}

	// Run menuTransition() on resize
	window.addEventListener('resize', function ()
	{
		clearTimeout(resizeTimer);
		resizeTimer = setTimeout(menuTransition, 250);
	});

	// Run menuTransition() on load
	menuTransition();

	// Menu Button Toggle
	mainMenuToggle.addEventListener('click', function (e)
	{
		mainMenu.classList.toggle('is-visible');
		e.preventDefault();
	});

	// Menu Close Toggle
	/*
	mainMenuClose.addEventListener('click', function (e) {
			mainMenu.classList.toggle('is-visible');
			mainMenuList.className = ('main-menu__list');
			e.preventDefault();
	});
	*/

	// Mobile Click Menu Transition
	for (var i = 0; i < mainMenuParent.length; i++)
	{
		mainMenuParent[i].addEventListener('click', function (e)
		{
			var level = this.getAttribute('data-childLevel');
			var parent = this.parentNode;
			var targeturl = this.href;

			//console.log("DEBUG COLONNA il livello è:" + level);

			// Make parent active
			if (level === '1')
			{
				var openItems = document.querySelectorAll('.open');
				if (openItems.length)
				{
					openItems[0].classList.remove('open');
				}
				if (parent.classList)
				{
					parent.classList.add('open');
				}
				else
				{
					parent.className += ' ' + 'open';
				}
			}
			if (level === '2')
			{
				var openItems = document.querySelectorAll('.open');


				if (parent.classList)
				{
					parent.classList.add('open');
				}
				else
				{
					parent.className += ' ' + 'open';
				}
			}

			mainMenuList.className = ('main-menu__list');
			// Add is-active-LEVEL class for each section
			if (mainMenuList.classList)
			{
				mainMenuList.classList.add('is-active-' + level);
			}
			else
			{
				mainMenuList.className += ' ' + 'is-active-' + level;
			}
			e.preventDefault();
		});
	}

	for (var r = 0; r < mainMenuBack.length; r++)
	{
		mainMenuBack[r].addEventListener('click', function (e)
		{

			//add by colonna
			this.parentNode.parentNode.classList.remove('open');

			var level = this.getAttribute('data-childLevel');

			mainMenuList.className = ('main-menu__list');
			// Add is-active-LEVEL class for each section
			if (mainMenuList.classList)
			{
				mainMenuList.classList.add('is-active-' + level);
			}
			else
			{
				mainMenuList.className += ' ' + 'is-active-' + level;
			}
			e.preventDefault();
		});
	}

})();

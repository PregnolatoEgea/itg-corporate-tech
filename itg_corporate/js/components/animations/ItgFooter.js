export const ItgFooter = function ()
{
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
							
      });
    });
    
  itgSubmenusToggler.addEventListener('click', function () {
	  	event.preventDefault();
	  	let itgSubmenus = document.querySelectorAll("[class*=sub-menu]");
				for (var i = 0; i < itgSubmenus.length; i++) {
							    itgSubmenus[i].classList.toggle("is-show");
						} 
		});

}

ItgFooter();



export const ItgOpenPreHeaderBottomSide = function (key) 
{

let ItgTopHeaderLinks = document.querySelectorAll('.itgPreHeader--singleItem');
let ItgBottomMenu = document.querySelectorAll('.itgPreHeader__bottomSide');

const subMenu = document.querySelector('.itgPreHeader__bottomSide');


ItgTopHeaderLinks.forEach(el => {
    el.addEventListener('click', showBottomMenu);
    el.addEventListener('click', addActiveMenu);
    
});

function showBottomMenu(event) {
    event.preventDefault();
				
			
    var menuId = event.currentTarget.getAttribute('data-target');
    var dataIdLinks = (menuId.charAt(0) === '#') ? menuId.slice(1) : menuId;
    var itgPreHeader__bottomSideEl = document.querySelector("div[data-menu-id=" + dataIdLinks + "]");    
				var elems = document.querySelector(".show");
				
				itgPreHeader__bottomSideEl.classList.toggle('show');

				if(elems !==null){
			   elems.classList.remove("show");
			 }

}

function addActiveMenu(e) {
  var elems = document.querySelector(".active");
		
  if(elems !==null){
   elems.classList.remove("active");
  }
  e.target.className = "active";

}
	
}
ItgOpenPreHeaderBottomSide();
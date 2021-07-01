
export const ItgOpenPreHeaderBottomSide = function (key) 
{

function addActiveMenu(e) {
  var elems = document.querySelector(".active");
		
  if(elems !==null){
   elems.classList.remove("active");
  }
  //e.target.className = "active";

}

document.addEventListener('DOMContentLoaded', function () {

  // Get all "navbar-burger" elements
  var $navbarTriggers = Array.prototype.slice.call(document.querySelectorAll('.itgPreHeader--singleItem'), 0);

  // Check if there are any nav burgers
  if ($navbarTriggers.length > 0) {

    // Add a click event on each of them
    $navbarTriggers.forEach(function ($el) {
      $el.addEventListener('click', function () {

        // Get the target from the "data-target" attribute
        var target = $el.dataset.target;
        var $target = document.getElementById(target);

        // Toggle the class on both the "navbar-burger" and the "navbar-menu"
        $el.classList.toggle('is-active');
        $target.classList.toggle('is-active');

      });
    });
  }

});	
	
}
ItgOpenPreHeaderBottomSide();



export const ItgOpenMegaMenu = function (key) 
{

document.addEventListener('DOMContentLoaded', function () {

  // Get all "navbar-burger" elements
  var $navbarTriggers = Array.prototype.slice.call(document.querySelectorAll('.navbar-trigger'), 0);

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


ItgOpenMegaMenu();
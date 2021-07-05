
export const ItgOpenPreHeaderBottomSide = function (key) 
{
  document.addEventListener('DOMContentLoaded', function ()
  {

    // Get all "navbar-burger" elements
    var $navbarTriggers = Array.prototype.slice.call(document.querySelectorAll('.itgPreHeader__leftSide .itgPreHeader--singleItem'), 0);

    //Get all nav-bar bottom side
    var $bottomContent = document.querySelectorAll('.itgPreHeader__bottomSide');

    let priorActive = null;

    // Check if there are any nav burgers
    if ($navbarTriggers.length > 0)
    {
      // Add a click event on each of them
      $navbarTriggers.forEach(function ($el)
      {
        if ($el)
        {
          $el.addEventListener('click', addActiveMenu);
          event.preventDefault();
         
        }
      });

      function addActiveMenu(e)
      {
        // Loop over the nav-triggers
        $navbarTriggers.forEach(function ($el, index)
        {
          if ($bottomContent[index])
          {
            $el.classList.remove("is-active");
            $el.classList.add("is-hide");

            $bottomContent[index].classList.add("is-hide");
            $bottomContent[index].classList.remove("is-active");
          }
        });

        if (priorActive === this)
        {
          this.classList.remove("is-active");
          this.classList.add("is-hide");
          if ($bottomContent[$navbarTriggers.indexOf(this)])
          {
            $bottomContent[$navbarTriggers.indexOf(this)].classList.remove("is-active");
            $bottomContent[$navbarTriggers.indexOf(this)].classList.add("is-hide");
          }
          priorActive = null;
        } else
        {
          this.classList.add("is-active");
          this.classList.remove("is-hide");
          if ($bottomContent[$navbarTriggers.indexOf(this)])
          {
            $bottomContent[$navbarTriggers.indexOf(this)].classList.add("is-active")
            $bottomContent[$navbarTriggers.indexOf(this)].classList.remove("is-hide");
          }
          priorActive = this;
        }
								event.preventDefault();
									

      }
      event.preventDefault();
    }

  });
		 
}
ItgOpenPreHeaderBottomSide();


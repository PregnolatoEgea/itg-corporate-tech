import { ids } from "webpack";

export const ItgOpenMegaMenu = function (key) 
{
  window.addEventListener("load", function ()
  {

    const tabs = Array.from(document.querySelectorAll(".navbar-trigger"));

    const tabContents = document.querySelectorAll(".navbar-dropdown");

    const narrow = document.querySelectorAll(".is-narrow");

    tabs.forEach(function (tab)
    {
      tab.addEventListener("click", switchClass);
      event.preventDefault();
    });

    let priorActive = null;

    function switchClass()
    {
      narrow.forEach(function (tab, index)
      {
        if (tab.classList.contains('is-active'))
        {
          tab.classList.remove('is-active');
        }
      });

      if (narrow[0])
      {
        narrow[0].classList.add('is-active');
      }
      // Loop over the tabs
      tabs.forEach(function (tab, index)
      {
        tab.classList.remove("is-active");
        tabContents[index].classList.add("is-hide");
      });

      if (priorActive === this)
      {
        this.classList.remove("is-active");
        tabContents[tabs.indexOf(this)].classList.add("is-hide");
        priorActive = null;
      } else
      {
        this.classList.add("is-active");
        tabContents[tabs.indexOf(this)].classList.remove("is-hide");
        priorActive = this;
      }
    }

  })
}


ItgOpenMegaMenu();
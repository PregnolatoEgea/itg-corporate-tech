export const ItgOpenMegaMenu = function (key) 
{
  window.addEventListener("load", function ()
  {

    const tabs = Array.from(document.querySelectorAll(".navbar-trigger"));

    const tabContents = document.querySelectorAll(".navbar-dropdown");

    const narrow = document.querySelectorAll('.is-narrow');
    const panes = document.querySelectorAll('.tab-pane');

    let narrowelems = [];

    narrow.forEach(function (elem, index)
    {
      if (elem.classList.contains('active') && elem.classList.contains('is-active'))
      {
        if (!narrowelems.includes(index))
        {
          narrowelems.push(index);
        }
      }
    });

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

        if (tab.classList.contains('active'))
        {
          tab.classList.remove('active');
        }
      });

      panes.forEach(function (pane, index)
      {
        if (pane.classList.contains('active'))
        {
          pane.classList.remove('active');
        }
      });

      for (let i = 0; i < narrowelems.length; i++)
      {
        if (narrow[narrowelems[i]])
        {
          narrow[narrowelems[i]].classList.add('active');
          narrow[narrowelems[i]].classList.add('is-active');
          panes[narrowelems[i]].classList.add('active');
        }
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
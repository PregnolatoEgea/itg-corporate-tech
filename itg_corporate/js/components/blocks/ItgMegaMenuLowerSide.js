
export const ItgMegaMenuLowerSide = function (key) 
{
    document.addEventListener('DOMContentLoaded', function ()
    {

        // Get all "navbar-burger" elements
        var $leftTabs = Array.prototype.slice.call(document.querySelectorAll('.Itg-hero-menu-left-tabs'));

        // Check if there are any nav burgers
        if ($leftTabs.length > 0)
        {

            // Add a click event on each of them
            $leftTabs.forEach(function ($el)
            {
                $el.addEventListener('click', function ()
                {

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
ItgMegaMenuLowerSide();
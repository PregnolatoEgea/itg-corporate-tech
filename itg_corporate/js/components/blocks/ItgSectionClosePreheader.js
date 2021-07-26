export const ItgSectionClosePreheader = function (key)
{
    document.addEventListener('DOMContentLoaded', function ()
    {

        // Get all "navbar-burger" elements
        var $navbarTriggers = Array.prototype.slice.call(document.querySelectorAll('.itgPreHeader__leftSide .itgPreHeader--singleItem'), 0);

        //Get all nav-bar bottom side
        var $bottomContent = document.querySelectorAll('.itgPreHeader__bottomSide');

        var $section = document.querySelector('.ItgLayoutSection');
        var $navbar = document.querySelector('.navbar');

        $navbar.addEventListener('click', closePreheader);

        $section.addEventListener('click', closePreheader);

        function closePreheader()
        {
            $navbarTriggers.forEach(function ($el, $index)
            {
                if ($el.classList.contains('is-active'))
                {
                    $el.classList.remove("is-active");
                    $el.classList.add("is-hide");
                }
            });

            $bottomContent.forEach(function ($el, $index)
            {
                if ($el.classList.contains('is-active'))
                {
                    $el.classList.remove("is-active");
                    $el.classList.add("is-hide");
                }
            });
        }
    });

}
ItgSectionClosePreheader();

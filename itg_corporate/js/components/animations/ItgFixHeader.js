export const ItgFixHeader = function ()
{

function stickyElement(e) {
  
  var header = document.querySelector('.site-header');
  var headerHeight = getComputedStyle(header).height.split('px')[0];
  var navbar = document.querySelector('.site-header');  
  var scrollValue = window.scrollY;
  
  if (scrollValue > headerHeight){
    navbar.classList.add('is-fixed');
    
  } else if (scrollValue < headerHeight){
    navbar.classList.remove('is-fixed');
    
  }

}

window.addEventListener('scroll', stickyElement);
}


ItgFixHeader();
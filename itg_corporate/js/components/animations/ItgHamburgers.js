export const ItgHamburgers = function () {
  let hamburgers = document.querySelectorAll('.hamburger');
  let menuItems = document.querySelectorAll('.itgMainMenu__highlightedItems--single');
  let searchBoxItems = document.querySelectorAll('.itgMainMenu__searchBox');
  let toggles = document.querySelectorAll('.itgMainMenu__toggle');
  let mainMenuSupContainer = document.querySelectorAll('.itgMainMenu__supContainer');
  let mainMenuContainer = document.querySelectorAll('.itgMainMenu__container');
  let mainMenuContainerItems = document.querySelectorAll('.itgMainMenu__container--single');
  let mainSearch = document.getElementById('main_search');
  let searchBox = document.getElementById('itgMainMenu__searchBox');
  let searchBoxClose = document.getElementById('itgMainMenu__searchBox--close');
  let body = document.getElementsByTagName('body')[0];
  for (const hamburger of hamburgers) {
    hamburger.addEventListener('click', function () {
      menuToggler(hamburger)
    })
    /*
    mainSearch.addEventListener('click', function () {
      if(hamburger.classList.contains('is-active')){
        menuToggler(hamburger)
      }
    })
				*/
    function menuToggler(that) {
      that.classList.toggle('is-active');
      that.getElementsByClassName('hamburger-box')[0].classList.toggle('is-active');
      that.getElementsByClassName('hamburger-inner')[0].classList.toggle('is-active');
      for (const toggle of toggles) {
        toggle.classList.toggle('highlighted-are-hide')
      }
      for (const menuItem of menuItems) {
        menuItem.classList.toggle('is-hide')
      }
      for (const searchBoxItem of searchBoxItems) {
        searchBoxItem.classList.toggle('highlighted-are-hide')
      }
      for (const mainMenuContainerItem of mainMenuContainer) {
        mainMenuContainerItem.classList.toggle('is-hide')
      }
      for (const mainMenuSupContainerItem of mainMenuSupContainer) {
        mainMenuSupContainerItem.classList.toggle('is-hide')
      }
    }
  }
  if (window.innerWidth <= 1024) {
    for (const mainMenuContainerSingle of mainMenuContainerItems) {
      mainMenuContainerSingle.style.height = mainMenuContainerSingle.offsetHeight + 'px';
      setTimeout(() => {
        mainMenuContainerSingle.classList.add('is-condensed');
        mainMenuContainerSingle.getElementsByClassName('itgMainMenu__container--primary')[0].addEventListener('click', function (e) {
          e.preventDefault();
          if(!this.parentNode.classList.contains('is-condensed')){
            for (const parentNode of this.offsetParent.getElementsByClassName('itgMainMenu__container--single')) {
              parentNode.classList.add('is-condensed');
            }
          }else{
            for (const parentNode of this.offsetParent.getElementsByClassName('itgMainMenu__container--single')) {
              parentNode.classList.add('is-condensed');
            }
            setTimeout(() => {
              this.parentNode.classList.remove('is-condensed');
            }, 10);
          }
        })
      }, 100);
    }
  }
  /*
  mainSearch.addEventListener('click', function () {
    body.classList.add('search-is-active')

  })
  searchBoxClose.addEventListener('click', function () {
    setTimeout(() => {
      body.classList.remove('search-is-active')
    }, 100);
  })
  */
}

ItgHamburgers();
export const ItgFixHeader = function () {

  let headers = document.querySelectorAll('.itgHeader');
  

  window.onscroll = () => {

    for (const header of headers) {
      let sticky = header.offsetTop;
      let logo = header.querySelector('.itgHeader__leftSide');

      if (window.pageYOffset > sticky) {
        logo.classList.add("hide");
        header.classList.add("stickyHead");
      } else {
        logo.classList.remove("hide");
        header.classList.remove("stickyHead");
      }
    }
  };
}



ItgFixHeader();
export const ItgFixHeader = function ()
{

  let headers = document.querySelectorAll('.itgHeader');

  window.onscroll = () =>
  {

    for (const header of headers)
    {
      let sticky = header.offsetTop;
      let logo = header.querySelector('.itgHeader__leftSide');

      if (window.pageYOffset > sticky)
      {
        logo.classList.add("hide");
        header.classList.add("stickyHead");
      } else
      {
        logo.classList.remove("hide");
        header.classList.remove("stickyHead");
      }
    }
  };
}

export const ItgOpenPreHeaderBottomSide = function (key)
{
  let a = document.getElementById('#itg_a_button_' + key);
  let img = document.getElementById('#itg_a_image_' + key);
  let bottom = document.querySelector('.itgPreHeader__bottomSide');
  if (a.style.color == '#00a9e0') 
  {
    img.style.fill = '#003478';
    a.style.color = '#003478';
    bottom.style.display = 'none';
  }
  else 
  {
    bottom.style.display = 'block';
    a.style.color = '#00a9e0';
    img.style.color = '#00a9e0';
  }
}

export const ItgOpenPreHeaderMenu = function (index)
{
  let li = document.getElementById('#itg_header_tab_' + index);
  let span = document.getElementById('#itg_header_tab_span_' + index);

  if (li.classList.contains('is_active'))
  {
    span.style.color = '#00a9e0';
    li.classList.remove('is_active');
  }
  else
  {
    span.style.color = '#003478';
    li.classList.add('is_active');
  }
}

ItgOpenPreHeaderBottomSide(key);
ItgOpenPreHeaderMenu(index)
ItgFixHeader();
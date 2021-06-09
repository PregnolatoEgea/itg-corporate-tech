export const ItgAccordion = function () {
  const accordion_items = document.querySelectorAll('.itgBlock__ItgAccordion--eyelet');
  for (var i = 0; i < accordion_items.length; i++) {
    accordion_items[i].addEventListener('click', function () {
      this.nextElementSibling.classList.toggle('show');
      this.classList.toggle('active');
      if (this.classList.contains('active')) {
        this.nextElementSibling.style.height = this.nextElementSibling.children[0].clientHeight + 10 + 'px';
      } else {
        this.nextElementSibling.style.height = 0;
      }
    });
  }
};

ItgAccordion();

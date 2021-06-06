import anime from 'animejs/lib/anime.es.js';

export const ItgTabYears = function () {
  Array.from(document.getElementsByClassName('itgBlock-tab-years__list-year')).forEach((button) => {
    button.addEventListener('click', event => {
      // Remove active class from all tabs
      Array.from(document.getElementsByClassName('itgBlock-tab-years__list-year')).forEach((el) => el.classList.remove('active'));
      // Activate only the current tab
      event.target.classList.add('active');
      // Get current year from tab and show its related content
      const year = event.target.dataset.year;
      Array.from(document.getElementsByClassName('itgBlock-tab-years__list-numbers-year')).forEach((number) => {
        number.classList.add('hidden');
        if (year === number.dataset.year) {
          anime({
            targets: '.itgAtom-number',
            opacity: [0, 1],
            translateY: [30, 0],
            delay: anime.stagger(50, {from: 'first'}),
            begin: function(anim) {
              number.classList.remove('hidden');
            },
          });
        }
      });
    });
  });
}

ItgTabYears();
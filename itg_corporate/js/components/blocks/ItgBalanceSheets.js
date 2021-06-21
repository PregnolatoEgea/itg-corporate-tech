import anime from 'animejs/lib/anime.es.js';

export const ItgBalanceSheets = function () {
  let ItgBalanceSheetsBlocks = document.getElementsByClassName('itgBlock-ItgBalanceSheets'); 
  for (const balanceSheetBlock of ItgBalanceSheetsBlocks) {      
    Array.from(balanceSheetBlock.getElementsByClassName("itgBlock-ItgBalanceSheets__tab-selector")).forEach((tab) => {
      tab.addEventListener('click', event => {
        // Remove active class from all tabs
        Array.from(document.getElementsByClassName('itgBlock-ItgBalanceSheets__tab-selector')).forEach((el) => el.classList.remove('is-active'));
        Array.from(document.getElementsByClassName('itgBlock-ItgBalanceSheets__block')).forEach((el) => el.classList.add('hidden'));
        // Activate only the current tab
        event.target.classList.add('is-active');
        // Get current year from tab and show its related content
        const selector = event.target.dataset.balanceselector;
        console.log("selector ", selector);1
        Array.from(document.getElementsByClassName('itgBlock-ItgBalanceSheets__block')).forEach((block) => {
          if (selector === block.dataset.balanceyear || (selector == 'STOCK' && block.dataset.balancestockexchange == 1)) {
            anime({
              targets: block,
              opacity: [0, 1],
              //translateY: [30, 0],
              delay: anime.stagger(50, {from: 'first'}),
              begin: function(anim) {
                block.classList.remove('hidden');
              },
            });
          }
        });
      });
    });                   
  }
}
  
  ItgBalanceSheets();
import anime from 'animejs/lib/anime.es.js';

export const ItgNoticesCommunications = function () {
  let ItgNoticesCommunicationsBlocks = document.getElementsByClassName('itgBlock-ItgNoticesCommunications'); 
  for (const NoticesCommBlock of ItgNoticesCommunicationsBlocks) {      
    Array.from(NoticesCommBlock.getElementsByClassName("itgBlock-ItgNoticesCommunications__tab-selector")).forEach((tab) => {
      tab.addEventListener('click', event => {
        // Remove active class from all tabs
        Array.from(document.getElementsByClassName('itgBlock-ItgNoticesCommunications__tab-selector')).forEach((el) => el.classList.remove('is-active'));
        Array.from(document.getElementsByClassName('itgBlock-ItgNoticesCommunications__block')).forEach((el) => el.classList.add('hidden'));
        // Activate only the current tab
        event.target.classList.add('is-active');
        // Get current year from tab and show its related content
        const selector = event.target.dataset.commselector;
        
        Array.from(document.getElementsByClassName('itgBlock-ItgNoticesCommunications__block')).forEach((block) => {
          if (selector === block.dataset.commyear ) {
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
        event.preventDefault();
        });
      });
    });                   
  }
}
  
  ItgNoticesCommunications();
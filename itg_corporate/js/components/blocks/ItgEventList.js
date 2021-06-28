import anime from 'animejs/lib/anime.es.js';

export const ItgEventList = function () {
  let ItgEventsListBlocks = document.getElementsByClassName('itgBlock-ItgEventList');   

  if(ItgEventsListBlocks.length > 0){

  
    Array.from(document.getElementsByClassName("itgBlock-ItgEventList--center-bottom-arrow-container")).forEach((block) => {
      block.addEventListener('click', event => {
        console.log("event ", event);
        let cardKey = event.target.dataset.cardkey;
        let cardElement = document.getElementById("event-card-"+cardKey);
        Array.from(cardElement.getElementsByClassName('itgBlock-ItgEventList--only-expanded')).forEach((el) => el.classList.toggle('show'));  
        Array.from(cardElement.getElementsByClassName('arrow')).forEach((el) => el.classList.toggle('open'));    
      });
    });
    var yearSelectElement = document.getElementsByClassName("itgBlock-ItgEventList__tab-select-element")[0]

    /*year selection */
    yearSelectElement.addEventListener('change',event => {
      console.log("Event", event.target.value);
      Array.from(document.getElementsByClassName('itgBlock-ItgEventList__block')).forEach((el) => el.classList.add('hidden'));    
      Array.from(document.getElementsByClassName('itgBlock-ItgEventList__tab-selector')).forEach((el) => el.classList.remove('is-active'));
      const selectedYear = event.target.value;
      Array.from(document.getElementsByClassName('itgBlock-ItgEventList__block')).forEach((block) => {
        if (selectedYear === block.dataset.eventyear ) {
          anime({
            targets: block,
            opacity: [0, 1],
            //translateY: [30, 0],
            //delay: anime.stagger(50, {from: 'first'}),
            begin: function(anim) {
              block.classList.remove('hidden');
            },
          });
        }
      });
    });

    /* future past  selection */
    Array.from(document.getElementsByClassName("itgBlock-ItgEventList__tab-selector-time")).forEach((tab) => {
      tab.addEventListener('click', event => {

        //get year value
        var yearSelectElement = document.getElementsByClassName("itgBlock-ItgEventList__tab-select-element")[0]
        let yearValue = yearSelectElement.value;

        //get categry value
        var categoryElement = document.getElementsByClassName("itgBlock-ItgEventList__tab-selector-category is-active")[0]
        let eventcategoryselector = categoryElement ? categoryElement.dataset.eventcategoryselector : false;

        if(event.target.classList.contains("is-active")){ //remove filter
          console.log("remove filter");
          Array.from(document.getElementsByClassName('itgBlock-ItgEventList__block')).forEach((el) => el.classList.add('hidden'));
          Array.from(document.getElementsByClassName('itgBlock-ItgEventList__tab-selector-time')).forEach((el) => el.classList.remove('is-active'));
          Array.from(document.getElementsByClassName('itgBlock-ItgEventList__block')).forEach((block) => {
            if (yearValue === block.dataset.eventyear 
              && (!eventcategoryselector || (eventcategoryselector == block.dataset.eventcategory)) ) {
              anime({
                targets: block,
                opacity: [0, 1],
                begin: function(anim) {
                  block.classList.remove('hidden');
                },
              });
            }
          });
          return;
        }
        //apply filter
        Array.from(document.getElementsByClassName('itgBlock-ItgEventList__block')).forEach((el) => el.classList.add('hidden'));
        Array.from(document.getElementsByClassName('itgBlock-ItgEventList__tab-selector-time')).forEach((el) => el.classList.remove('is-active'));
        event.target.classList.add('is-active');

        let eventtimeselector = event.target.dataset.eventtimeselector;
        
        Array.from(document.getElementsByClassName('itgBlock-ItgEventList__block')).forEach((block) => {
          if (yearValue === block.dataset.eventyear 
            && block.dataset.eventtime == eventtimeselector
            && (!eventcategoryselector || (eventcategoryselector == block.dataset.eventcategory)) ) {
            anime({
              targets: block,
              opacity: [0, 1],
              //translateY: [30, 0],
              //delay: anime.stagger(50, {from: 'first'}),
              begin: function(anim) {
                block.classList.remove('hidden');
              },
            });
          }
        });
      });

    });

    //category selector
    Array.from(document.getElementsByClassName("itgBlock-ItgEventList__tab-selector-category")).forEach((tab) => {
      tab.addEventListener('click', event => {
        //get year value
        var yearSelectElement = document.getElementsByClassName("itgBlock-ItgEventList__tab-select-element")[0]
        let yearValue = yearSelectElement.value;

        //get categry value
        var timeElement = document.getElementsByClassName("itgBlock-ItgEventList__tab-selector-time is-active")[0]
        let eventtimeselector = timeElement ? timeElement.dataset.eventtimeselector : false;

        if(event.target.classList.contains("is-active")){ //remove filter
          console.log("remove filter");
          Array.from(document.getElementsByClassName('itgBlock-ItgEventList__block')).forEach((el) => el.classList.add('hidden'));
          Array.from(document.getElementsByClassName('itgBlock-ItgEventList__tab-selector-category')).forEach((el) => el.classList.remove('is-active'));
          Array.from(document.getElementsByClassName('itgBlock-ItgEventList__block')).forEach((block) => {
            if (yearValue === block.dataset.eventyear
              && (!eventtimeselector || (eventtimeselector == block.dataset.eventtime)) ) {
              anime({
                targets: block,
                opacity: [0, 1],
                begin: function(anim) {
                  block.classList.remove('hidden');
                },
              });
            }
          });
          return;
        }
        //apply filter


        Array.from(document.getElementsByClassName('itgBlock-ItgEventList__block')).forEach((el) => el.classList.add('hidden'));
        Array.from(document.getElementsByClassName('itgBlock-ItgEventList__tab-selector-category')).forEach((el) => el.classList.remove('is-active'));
        event.target.classList.add('is-active');


        let eventcategoryselector = event.target.dataset.eventcategoryselector;
        
        Array.from(document.getElementsByClassName('itgBlock-ItgEventList__block')).forEach((block) => {
          if (yearValue === block.dataset.eventyear 
            && block.dataset.eventcategory == eventcategoryselector
            && (!eventtimeselector || (eventtimeselector == block.dataset.eventtime)) ) {
            anime({
              targets: block,
              opacity: [0, 1],
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
  
ItgEventList();

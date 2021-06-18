export const ItgAnchorsButtonsBar = function () {
  let ItgAnchorsButtonsBarBlocks = document.getElementsByClassName('itgBlock__ItgAnchorsButtonsBar');
  
    var toggleGoUpButton = function() {      
      
      for (const anchorBarBlock of ItgAnchorsButtonsBarBlocks) {
        var anchorBarBlockId = anchorBarBlock.id
        //build go up button id
        var goUpButtonId = anchorBarBlockId.replace("itg_block_", "itg_util_block_") + "_go_up_button";
        var goUpButton = document.getElementById(goUpButtonId);
        //get anchor height
        var anchor = anchorBarBlock.getElementsByClassName("itgBlock__ItgAnchorsButtonsBar__anchor")[0];
        if(!anchor) continue;

        var anchorHeight =  anchor.clientHeight;        
        var anchorBarBlockHeight = anchorBarBlock.clientHeight;

        var rect = anchorBarBlock.getBoundingClientRect();
        var fromTop = rect.top +  (anchorBarBlockHeight / 2 ) + (anchorHeight / 2) ;  //anchor bottom
        
        if(fromTop < 0){
          goUpButton.style.display = "block";
        } else {
          goUpButton.style.display = "none";
        }                       
      }
    };

    toggleGoUpButton();

    window.onscroll = () => toggleGoUpButton();

  }
  
  ItgAnchorsButtonsBar();
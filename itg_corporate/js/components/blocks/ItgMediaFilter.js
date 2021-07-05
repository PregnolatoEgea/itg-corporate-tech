
export const ItgMediaFilter = function () {
  // show/hide tag filter
  let BlocksFilterBtn = document.querySelector('.itg_tagfilterbtn');
  let BlocksFilterDateBtn = document.querySelector('.itg_tagdatefilterbtn');
  
  let BlocksFilterResults = document.querySelector('.itg_tagfilterresults');
  let BlocksFilterDateresults = document.querySelector('.itg_tagdatefilterdateresults');
  
  
  if(BlocksFilterBtn){

   BlocksFilterBtn.onclick = function (event) { 
 
    this.classList.toggle('active');
    BlocksFilterResults.classList.toggle('showtagresults');
    BlocksFilterDateresults.classList.remove('showtagdateresults');
				BlocksFilterDateBtn.classList.remove('active');
    event.preventDefault();
   };
  
  }
  if(BlocksFilterDateBtn){
   BlocksFilterDateBtn.onclick = function (event) { 

    this.classList.toggle('active');
    BlocksFilterDateresults.classList.toggle('showtagdateresults');
    BlocksFilterResults.classList.remove('showtagresults');
    BlocksFilterBtn.classList.remove('active');
    event.preventDefault();
   };
  }
  
 
			
			document.addEventListener("DOMContentLoaded", function(event) { // <-- add this wrapper
				var element = document.querySelectorAll('.itg_columndaterange');
				
				
				    if (element) {
				    
				      element.forEach(function(el, key){
				        
				         el.addEventListener('click', function () {
				            console.log(key);
				         
				            el.classList.toggle("activecolumn");
				            
				             element.forEach(function(ell, els){
				                 if(key !== els) {
				                     ell.classList.remove('activecolumn');
				                 }
				                  console.log(els);
				             });
				         });
				      });
				    }
				});
				

  /*
  document.querySelectorAll(".itg_activecolumn").forEach(element => {
   element.onclick = (e) => {
     const elm = document.getElementsByClassName('itg_activecolumn');
     elm[0].classList.toggle("activerange");
     console.log(elm);
   };
  });
   
  
  var dateFilterParent = document.querySelector(".itg_activecolumn").parentElement;
  
  DateFilterActivator.onclick = function (event) { 
   console.log(dateFilterParent);
   this.classList.toggle('activerange');
   BlocksFilterDateresults.classList.toggle('activerangecol');
   event.preventDefault();
  };
  
  })
  */
  var scrollArrowRight = document.getElementById("scroll-arrow-right");
		var scrollArrowLeft = document.getElementById("scroll-arrow-left");
		
		var rangeselector = document.querySelectorAll(".itg_option_cff");
	
		console.log(rangeselector);
		var slider = rangeselector;
		var currentIndex = -1;
		if(scrollArrowLeft){
		//On load, show the first slide
		loadPage(0);
		
		function loadPage(i) {
		  //Check if index is valid
		  if (slider[i]) {
		    slider[i].removeAttribute('hidden');
		  } else {
		    return;
		  }
		
		  //Hide previous slide
		  if (slider[currentIndex]) {
		    slider[currentIndex].setAttribute('hidden', '');
		  }
		
		  currentIndex = i;
		}
		
		scrollArrowRight.onclick = function() {
		  loadPage(currentIndex + 1);
		}
		
		scrollArrowLeft.onclick = function() {
		  loadPage(currentIndex - 1);
		}
 // form reset 
 function clearForm() {
	   document.getElementById("options").reset();
	}
 

}
}

ItgMediaFilter();


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
    event.preventDefault();
   };
  
  }
  if(BlocksFilterDateBtn){
   BlocksFilterDateBtn.onclick = function (event) { 

    this.classList.toggle('active');
    BlocksFilterDateresults.classList.toggle('showtagdateresults');
    event.preventDefault();
   };
  }
  
  // activate date filter column
 // let DateFilterActivator = document.querySelectorAll('.itg_activecolumn');
  /*
  let dateFilterParent = document.querySelector(".itg_activecolumn").parentElement;
  var dateColelems = document.querySelectorAll(".itg_activecolumn");
  DateFilterActivator.forEach(function (DateFilterActivator) {
  	console.log(dateFilterParent);
  	DateFilterActivator.onclick = function (event) { 
    this.classList.toggle('activerange');
    element.classList.toggleClass(classItem);

    //this.dateFilterParent.classList.toggle('activerangecol');
    event.preventDefault();
   };
   
   
   
  
  document.querySelectorAll(".itg_activecolumn").forEach(element => {
   element.onclick = (e) => {
     const elm = document.getElementsByClassName('itg_activecolumn');
     elm[0].classList.toggle("activerange");
     console.log(elm);
   };
  });
   */
  /*
  var dateFilterParent = document.querySelector(".itg_activecolumn").parentElement;
  
  DateFilterActivator.onclick = function (event) { 
   console.log(dateFilterParent);
   this.classList.toggle('activerange');
   BlocksFilterDateresults.classList.toggle('activerangecol');
   event.preventDefault();
  };
  */
};

ItgMediaFilter();


export const ItgMediaFilter = function () {
  let BlocksFilterBtn = document.querySelector('.itg_tagfilterbtn');
  let BlocksFilterDateBtn = document.querySelector('.itg_tagdatefilterbtn');
  let BlocksFilterResults = document.querySelector('.itg_tagfilterresults');
  BlocksFilterBtn.onclick = function () { 

  this.classList.toogle('active');
 
  BlocksFilterResults.classList.toggle('showtagresults');
  
  };
  
   
};

ItgMediaFilter();

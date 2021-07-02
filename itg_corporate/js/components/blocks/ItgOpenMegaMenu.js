
export const ItgOpenMegaMenu = function (key) 
{
window.addEventListener("load", function() {

const tabs = Array.from(document.querySelectorAll(".navbar-trigger"));

const tabContents = document.querySelectorAll(".navbar-dropdown");

tabs.forEach(function(tab){
  tab.addEventListener("click", switchClass);
  event.preventDefault();
});

let priorActive = null; 

function switchClass() {
  // Loop over the tabs
  tabs.forEach(function(tab, index){
    tab.classList.remove("is-active");            
    tabContents[index].classList.add("is-hide");
  });
  
  if(priorActive === this){
    this.classList.remove("is-active");  
    tabContents[tabs.indexOf(this)].classList.add("is-hide");
    priorActive = null;
  } else {
    this.classList.add("is-active");  
    tabContents[tabs.indexOf(this)].classList.remove("is-hide");  
    priorActive = this;
  }
}

})
}


ItgOpenMegaMenu();
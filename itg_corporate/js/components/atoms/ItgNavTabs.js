export const ItgNavTabs = function () {

document.addEventListener('DOMContentLoaded', function(e){
    var list = document.querySelectorAll('.itg_navtabs a');
    list = Array.prototype.slice.call(list, 0); 
  
    list.forEach(function(el) {
        el.addEventListener('click', function(event){
            e.preventDefault();
            var tab = document.querySelector(el.getAttribute('href'));
            document.querySelector('.itg_navtabs .active').classList.remove('active');
            document.querySelector('.tab-content .active').classList.remove('active');

            el.classList.add('active');
            tab.classList.add('active');
        })
    })
})

}

ItgNavTabs();
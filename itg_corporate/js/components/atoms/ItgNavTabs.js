export const ItgNavTabs = function () {

function initTab(elem){
    document.addEventListener('click', function (e) {
        if (!e.target.matches(elem+' .itg_navtabs span')) return;
        else{
            if(!e.target.classList.contains('active')){
                findActiveElementAndRemoveIt(elem+' .itg_navtabs span');
                findActiveElementAndRemoveIt(elem+' .tab-pane');
                e.target.classList.add('active');  
                setTimeout(function(){                 
                    var panel = document.querySelectorAll(elem+' .tab-pane.'+e.target.dataset.name);
                    Array.prototype.forEach.call(panel, function (el) {
                        el.classList.add('active');
                    });
                }, 200);
            }
        }
    });
}

function findActiveElementAndRemoveIt(elem){
    var elementList = document.querySelectorAll(elem);
    Array.prototype.forEach.call(elementList, function (e) {
        e.classList.remove('active');
    });
}
initTab('.ItgLeftTabs');
}

ItgNavTabs();




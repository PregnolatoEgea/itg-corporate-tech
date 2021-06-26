export const ItgRelatedLaunches12 = function () {

    let RelatedLaunchesContainer = document.querySelectorAll('.itgBlock-relatedLaunchesType12')
    
    for (const singleLaunch of RelatedLaunchesContainer) {
        let items = singleLaunch.querySelectorAll('.itgBlock-relatedLaunchesType12__item-content');
        let max = 0;
        
        for (const item of items) {
            item.style.height = 'auto';
            if (item.scrollHeight > max) {
                max = item.scrollHeight;
            }
        }

        for (const item of items) {
            item.style.height = max + 'px';
        }
        
    }

}

ItgRelatedLaunches12();
window.onresize = ItgRelatedLaunches12;

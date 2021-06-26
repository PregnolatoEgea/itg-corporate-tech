export const ItgMatrix = function () {
    let matrixCategories = document.querySelectorAll('.itgBlock__ItgMatrix--categories')

    for (const singleCategory of matrixCategories) {
        let matrixCategory = singleCategory.querySelectorAll('.itgBlock__ItgMatrix--category')
        let matrixGraphic = singleCategory.parentNode.querySelectorAll('.itgBlock__ItgMatrix--matrix')[0]
        let graphicData = matrixGraphic.querySelectorAll('.itgBlock__ItgMatrix--graphic-datum')
        let graphicHighlight = matrixGraphic.querySelectorAll('.itgBlock__ItgMatrix--graphic-highlight')[0]
        let dataContent = singleCategory.querySelectorAll('[data-content]')
        let popup = singleCategory.parentNode.querySelectorAll('.itgBlock__ItgMatrix--popup')[0]
        let popupTitle = singleCategory.parentNode.querySelectorAll('.itgBlock__ItgMatrix--popup-title')[0]
        let popupContent = singleCategory.parentNode.querySelectorAll('.itgBlock__ItgMatrix--popup-content')[0]
        let popupClose = singleCategory.parentNode.querySelectorAll('.itgBlock__ItgMatrix--popup-close')[0]
        let filterClear = singleCategory.parentNode.querySelectorAll('.itgBlock__ItgMatrix--clear')[0]
        let coordinatesX = []
        let coordinatesY = []

        matrixGraphic.style.height = singleCategory.offsetHeight * 1.5 + 'px'

        for (const category of matrixCategory) {
            let theHeight = 0
            let containerHeight = category.parentNode.offsetHeight
            let label = category.getElementsByClassName('itgBlock__ItgMatrix--label')[0]
            let container = category.getElementsByClassName('itgBlock__ItgMatrix--datum')[0]
            let indexes = category.getElementsByClassName('itgBlock__ItgMatrix--datum-index')
            let categoryMark = category.getAttribute('data-mark')

            for (const index of indexes) {
                theHeight += index.offsetHeight
                container.style.height = theHeight + 24 + 'px'
            }

            label.addEventListener('click', function () {
                wrapperAnimation(container, category)
            })
            category.addEventListener('click', function () {
                if (category.classList.contains('isAnotherContainer')) {
                    wrapperAnimation(container, category)
                }
            })

            function wrapperAnimation(container, category) {
                let allContainers = category.parentNode.getElementsByClassName('itgBlock__ItgMatrix--datum')
                for (const anotherContainer of allContainers) {
                    anotherContainer.classList.remove('is-active');
                    anotherContainer.parentNode.classList.add('isAnotherContainer');
                    anotherContainer.parentNode.style.height = 0 + 'px'
                    anotherContainer.parentNode.getElementsByClassName('itgBlock__ItgMatrix--icon')[0].classList.remove('is-active')
                }

                container.classList.add('is-active');
                container.parentNode.getElementsByClassName('itgBlock__ItgMatrix--icon')[0].classList.add('is-active')
                container.parentNode.classList.remove('isAnotherContainer');
                container.parentNode.style.height = containerHeight - ((32) * (matrixCategory.length - 1)) + 'px'

                for (const graphicDatum of graphicData) {
                    let graphicDatumMark = graphicDatum.getAttribute('data-mark')

                    graphicDatum.classList.remove('inactive');

                    if (graphicDatumMark !== categoryMark) {
                        graphicDatum.classList.add('inactive');
                    }
                }

                filterClear.classList.add('is-active')
            }


        }

        for (const graphicDatum of graphicData) {
            let graphicDataX = graphicDatum.getAttribute('data-x')
            let graphicDataY = graphicDatum.getAttribute('data-y')

            coordinatesX.push(graphicDataX)
            coordinatesY.push(graphicDataY)

            graphicDatum.addEventListener('click', function () {
                popupTitle.innerHTML = this.getAttribute('data-title')
                popupTitle.style.color = this.getAttribute('data-color')
                popupContent.innerHTML = this.getAttribute('data-content')
                popup.classList.add('is-active')
            })
        }

        let maxX = Math.max.apply(null, coordinatesX)
        let minX = Math.min.apply(null, coordinatesX)
        let maxY = Math.max.apply(null, coordinatesY)
        let minY = Math.min.apply(null, coordinatesY)

        graphicHighlight.style.width = 'calc(' + (maxX - minX) + '% + 40px)'
        graphicHighlight.style.height = 'calc(' + (maxY - minY) + '% + 40px)'
        graphicHighlight.style.bottom = 'calc(' + minY + '% - 10px)'
        graphicHighlight.style.left = 'calc(' + minX + '% - 10px)'

        for (const datumContent of dataContent) {
            datumContent.addEventListener('click', function () {
                popupTitle.innerHTML = this.getAttribute('data-title')
                popupTitle.style.color = this.getAttribute('data-color')
                popupContent.innerHTML = this.getAttribute('data-content')
                popup.classList.add('is-active')
            })
        }

        popupClose.addEventListener('click', function () {
            popup.classList.remove('is-active')
        })

        filterClear.addEventListener('click', function () {
            for (const thisContainer of matrixCategory) {
                let allContainers = thisContainer.getElementsByClassName('itgBlock__ItgMatrix--datum')

                for (const datumContainer of allContainers) {
                    datumContainer.classList.remove('is-active');
                }

                thisContainer.classList.remove('isAnotherContainer');
                thisContainer.style.height = 'inherit'
            }
            filterClear.classList.remove('is-active')

            for (const graphicDatum of graphicData) {
                graphicDatum.classList.remove('inactive');
            }
        })
    }

}

ItgMatrix();
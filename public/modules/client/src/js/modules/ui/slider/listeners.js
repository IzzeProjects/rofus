import {startAnimation, cardSelect, startHideFullDescription} from "./cardSlider";

let events = function () {
    Array.from(document.getElementsByClassName('dancer-profile-container'))
        .forEach(function (element) {
            element.addEventListener('click', startAnimation)
        })

    Array.from(document.getElementsByClassName('cardSVGArrow'))
        .forEach(function (element) {
            element.addEventListener('click', cardSelect)
        })

    document.getElementsByClassName("man-info-hide-button")[0]
        .addEventListener('click', startHideFullDescription)
}

export {
    events
}
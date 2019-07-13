import {escClose, toggle} from "./sidebar";

import {startAnimation} from "../slider/cardSlider"

let events = function () {
    Array.from(document.getElementsByClassName('dancer-profile-container'))
        .forEach(function (element) {
            element.addEventListener('click', startAnimation)
        })
    document
        .getElementsByClassName('js-sidebar-open')[0]
        .addEventListener('click', toggle)
    document
        .getElementsByClassName('js-sidebar')[0]
        .addEventListener('keydown', escClose)
    document
        .getElementsByClassName('js-sidebar-close')[0]
        .addEventListener('click', toggle)
}

export {
    events
}
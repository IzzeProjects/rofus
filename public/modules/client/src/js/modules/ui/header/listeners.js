import {startAnimSVG, reverseAnimSVG} from "./header";

let events = function () {
    document
        .getElementsByClassName('js-sidebar-open')[0]
        .addEventListener('mouseover', startAnimSVG)
    document
        .getElementsByClassName('js-sidebar-open')[0]
        .addEventListener('mouseout', reverseAnimSVG)
}

export  {
    events
}
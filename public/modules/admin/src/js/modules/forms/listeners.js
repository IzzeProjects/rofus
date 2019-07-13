import {tabChange} from './events'

let listeners =  function () {
    tabs()
}

let tabs = function () {
    let items = document.querySelectorAll('.js-tab-change')
    for (let i = 0; i < items.length; i++) {
        items[i].addEventListener('click', tabChange)
    }
}

export {
    listeners
}

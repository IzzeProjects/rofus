import {menuToggle} from './events'

let listeners =  function () {
    menuItem()
}

let menuItem = function () {
    let items = document.querySelectorAll('.js-menu-item')
    for (let i = 0; i < items.length; i++) {
        items[i].addEventListener('click', menuToggle)
    }
}

export {
    listeners
}
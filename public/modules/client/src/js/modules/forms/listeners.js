import {logout} from './events'

let listeners = function () {
    formLogout()
};

let formLogout = function () {
    let items = document.querySelectorAll('.js-form-logout')
    for (let i = 0; i < items.length; i++) {
        items[i].addEventListener('click', logout)
    }
}


export {
    listeners
}

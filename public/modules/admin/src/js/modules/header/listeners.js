import {logout} from './events'

let listeners = function () {
    logoutListener()
}

let logoutListener = function () {

    let button = document
        .getElementsByClassName('js-logout')[0]

    if (button)
        button
            .addEventListener('click', logout)
}

export {
    listeners
}

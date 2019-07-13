import {clickOutside} from '../functions'

let listeners = function () {
    openListeners()
    closeListeners()
    modelWrappers()
};

let modelWrappers = function() {
    let modals = document.getElementsByClassName('modal-wrapper')

    for (let i = 0; i < modals.length; i++) {
        modals[i].addEventListener('keydown', escCloseModal)
        modals[i].addEventListener('click', clickOutside)
    }
}

let openListeners =function() {
    let modals = document.getElementsByClassName('js-modal-open')

    for (let i = 0; i < modals.length; i++) {
        modals[i].addEventListener('click', openModal)
    }
}

let closeListeners =function() {
    let modals = document.getElementsByClassName('js-modal-close')

    for (let i = 0; i < modals.length; i++) {
        modals[i].addEventListener('click', closeModal)
    }
}

// let menuClick = function(){
//     let svgMenuButton = document.getElementById("header_menu_svg")
//     svgMenuButton.addEventListener('click', )
// }

let openModal = function () {
    let formIdent = this.dataset.modalOpen
    let form = document.querySelector("[data-form='" + formIdent + "']")
    form.style.display = 'flex'
    form.focus()
}

let closeModal = function () {
    let formIdent = this.dataset.modalClose
    let form = document.querySelector("[data-form='" + formIdent + "']")
    form.style.display = 'none'
}

let escCloseModal = function (e) {
    if (e.key === "Escape") {
        this.style.display = 'none'
    }
}

export {
    listeners, escCloseModal
}
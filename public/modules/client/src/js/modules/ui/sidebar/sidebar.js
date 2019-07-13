let toggle = function () {
    let elem = document
        .getElementsByClassName('js-sidebar')[0]
    elem.style.right = elem.style.right === '0px' ? '-320px' : '0px'
    elem.focus()
}

let escClose = function (e) {
    if (e.key === "Escape") {
        this.style.right = '-320px'
    }
}

export {
    toggle, escClose
}
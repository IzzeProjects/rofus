let clickOutside = function (e) {
    let items = this.getElementsByTagName("*")
    let elem = this
    let needClose = true
    if (e.target === elem) {
        for (var key in items) {
            if (items[key] === e.target) {
                needClose = false
                break
            }
        }
    } else {
        needClose = false
    }
    if (needClose)
        elem.style.display = 'none'
}

export {
    clickOutside
}
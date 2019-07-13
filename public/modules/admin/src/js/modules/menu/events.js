let menuToggle =  function (){
    let id = this.dataset.toggle
    let children = document.querySelector('.js-menu-item-toggle[data-toggle="' + id + '"]');
    children.style.display = children.style.display === 'flex' ? 'none' : 'flex'
}

export {
    menuToggle
}
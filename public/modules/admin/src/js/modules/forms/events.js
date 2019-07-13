
let tabChange = function () {

    let tabTitles = document.querySelectorAll('.content-wrapper__tab');

    for (let i = 0; i < tabTitles.length; i++) {
        tabTitles[i].classList.remove('tab-active')
    }

    this.classList.add('tab-active')

    let tabs = document.querySelectorAll('.content-wrapper__tab-form');
    for (let i = 0; i < tabs.length; i++) {
        tabs[i].style.display = 'none'
    }
    let active = document.querySelectorAll('.content-wrapper__tab-form[data-tab="' + this.dataset.tab + '"]')[0];
    active.style.display = 'block'
}


export {
    tabChange
}

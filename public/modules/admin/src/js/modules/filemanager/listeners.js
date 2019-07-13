import {lfm} from './events'

let listeners =  function () {
    managerOpen()
}

let managerOpen = function () {
    let items = document.querySelectorAll('.js-manager-open')
    for (let i = 0; i < items.length; i++) {
        items[i].addEventListener('click', function () {
            console.log(this);
            console.log(this.nextSibling);
            lfm({type: 'image', prefix: '/laravel-filemanager'}, function(url, path) {
                console.log(url);
                console.log(path);
            });
            console.log(123);
        })
    }
}

export {
    listeners
}

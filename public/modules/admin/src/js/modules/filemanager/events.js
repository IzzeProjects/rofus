let lfm = function (options, cb) {
    let route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
    window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=1200,height=900');
    window.SetUrl = cb;
}


export {
    lfm
}

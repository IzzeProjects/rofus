// Pure JS main file

import {formsModule} from './modules/forms/main'
import {menuModule} from './modules/menu/main'
import {headerModule} from './modules/header/main'
import {filemanagerModule} from './modules/filemanager/main'

let main = function () {
    formsModule()
    menuModule()
    headerModule()
    filemanagerModule()
}

export {main}

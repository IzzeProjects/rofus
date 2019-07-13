// Pure JS main file

import {modalsModule} from './modules/modals/main'
import {uiModule} from './modules/ui/main'

let main = () => {
    // Import modules of a project is here
    modalsModule()
    uiModule()
}

export {main}

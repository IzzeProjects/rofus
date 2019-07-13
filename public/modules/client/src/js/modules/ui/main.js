import {events as header} from './header/listeners'
import {events as sidebar} from './sidebar/listeners'
import {prepareAnimation} from './slider/cardSlider'
import {events as slider} from './slider/listeners'

let uiModule = () => {
    header()
    sidebar()
    prepareAnimation(0)
    slider()
};

export {
    uiModule
}
// Vue main file

import {main} from './moduels'
import {onload} from './modules/onload'
import Select from './components/form/Select'
import MultiSelect from './components/form/MultiSelect'
import File from './components/form/File'
import LoginForm from './components/LoginForm'
import ImageIterator from './components/form/ImageIterator'
import VeeValidate, { Validator } from 'vee-validate';
import ru from 'vee-validate/dist/locale/ru';
import Vue from 'vue'

window.onload = () => {
    main()
    onload()
}

// ----------------------use-section-------------------------------------------->

Vue.use(VeeValidate, {
    classes: true,
    classNames: {
        valid: 'is-valid',
        invalid: 'is-invalid'
    }
});

Validator.localize('ru', ru);

// ----------------------------------------------------------------------------->


// ----------------------component-section-------------------------------------->

Vue.component('select-single', Select);
Vue.component('select-multi', MultiSelect);
Vue.component('login-form', LoginForm);
Vue.component('form-file', File);
Vue.component('image-iterator', ImageIterator);

// ----------------------------------------------------------------------------->


// ---------------------Main-instance-of-Vue------------------------------------>

const app = new Vue({
    el: '#app'
});

// -------------------------Instances-of-Vue------------------------------------>

// ----------------------------------------------------------------------------->






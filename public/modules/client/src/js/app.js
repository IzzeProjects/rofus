// Vue main file

import {main} from './moduels'
import Vue from 'vue'
import LoginForm from './components/forms/LoginForm'
import RegisterForm from './components/forms/RegisterForm'
import CallbackForm from './components/forms/CallbackForm'
import MainCards from './components/MainCards'
import VeeValidate, {Validator} from 'vee-validate';
import ru from 'vee-validate/dist/locale/ru';
import FullDescription from './components/fullDescription/FullDescription'
import VueCarousel from 'vue-carousel';

window.onload = () => {
    main()
}

// ----------------------use-section-------------------------------------------->

Vue.use(VueCarousel);

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

Vue.component('login-form', LoginForm)
Vue.component('register-form', RegisterForm)
Vue.component('callback-form', CallbackForm)
Vue.component('main-cards', MainCards)
Vue.component('full-description', FullDescription)

// ----------------------------------------------------------------------------->


// ---------------------Main-instance-of-Vue------------------------------------>

const app = new Vue({
    el: '#app'
});

// -------------------------Instances-of-Vue------------------------------------>

// ----------------------------------------------------------------------------->






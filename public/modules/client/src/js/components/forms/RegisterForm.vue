<template>
    <div tabindex="0"
         class="modal-wrapper"
         data-form="register"

    >
        <div class="modal-login">
            <div class="modal-wrapper__close js-modal-close" data-modal-close="register"></div>
            <div class="modal-wrapper__title">Регистрация</div>
            <form
                :method="method"
                :action="url"
                @submit.prevent="checkForm"
            >
                <div v-for="error in serverErrors" class="login-wrapper-from__error-container">
                    <div
                        class="modal-wrapper-form__error"
                        v-for="message in error"
                    >
                        {{message}}
                    </div>
                </div>
                <input type="hidden" name="_token" :value="token">
                <div class="modal-wrapper__form">
                    <div class="modal-wrapper-form__group">
                        <label for="register-email" class="required">Email:</label>
                        <input type="text" id="register-email" name="email" class="modal-wrapper-form__input"
                               v-model="email"
                               v-validate="'required|email'"
                               data-vv-as="Email"
                        >
                        <div class="modal-wrapper-form__error">{{ errors.first('email') }}</div>
                    </div>
                    <div class="modal-wrapper-form__group">
                        <label for="register-name">Имя:</label>
                        <input type="text" id="register-name" name="name" class="modal-wrapper-form__input"
                               v-model="name">
                    </div>
                    <div class="modal-wrapper-form__group">
                        <label for="register-password" class="required">Пароль:</label>
                        <input type="password" id="register-password" name="password" class="modal-wrapper-form__input"
                               v-model="password"
                               v-validate="'required'"
                               data-vv-as="Пароль"
                               ref="password">
                        <div class="modal-wrapper-form__error">{{ errors.first('password') }}</div>
                    </div>
                    <div class="modal-wrapper-form__group">
                        <label for="register-password-conf" class="required">Повторите пароль:</label>
                        <input type="password" id="register-password-conf" name="password_confirmation"
                               class="modal-wrapper-form__input"
                               v-model="password_confirmation"
                               v-validate="'required|confirmed:password'"
                               data-vv-as="Повторите пароль">
                        <div class="modal-wrapper-form__error">{{ errors.first('password_confirmation') }}</div>
                    </div>
                    <a href="#" class="modal-wrapper-form__forgot">Забыли пароль ?</a>
                    <button type="submit" class="modal-wrapper-form__button" :disabled="validateResult">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        name: "RegisterForm",
        props: ['url', 'method'],
        data() {
            return {
                email: null,
                name: null,
                password: null,
                password_confirmation: null,
                token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                serverErrors: [],
                validateResult: false
            }
        },
        mounted() {
            const dict = {
                custom: {
                    password_confirmation: {
                        confirmed: () => 'Пароли не совпадают'
                    }
                }
            };
            this.$validator.localize('ru', dict);
            this.$validator.pause()
        },
        methods: {
            checkForm() {
                this.$validator.resume()
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        this.validateResult = result
                        axios({
                            method: this.method,
                            url: this.url,
                            data: {
                                email: this.email,
                                name: this.name,
                                password: this.password,
                                password_confirmation: this.password_confirmation,
                                _token: this._token
                            },
                        })
                            .then(response => {
                                this.validateResult = true
                                window.location.href = response.data.redirect
                            })
                            .catch(error => {
                                this.serverErrors = error.response.data
                            });
                    }
                })
            }
        }
    }
</script>

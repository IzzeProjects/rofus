<template>
    <div tabindex="0"
         class="modal-wrapper"
         data-form="login">
        <div class="modal-login">
            <div class="modal-wrapper__close js-modal-close" data-modal-close="login"></div>
            <div class="modal-wrapper__title">Вход</div>
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
                        <label for="login-email" class="required">Email:</label>
                        <input type="text" id="login-email" name="email" class="modal-wrapper-form__input"
                               v-model="email"
                               v-validate="'required|email'"
                               data-vv-as="Email">
                        <div class="modal-wrapper-form__error">{{ errors.first('email') }}</div>
                    </div>
                    <div class="modal-wrapper-form__group">
                        <label for="login-password" class="required">Пароль:</label>
                        <input type="password" id="login-password" name="password" class="modal-wrapper-form__input"
                               v-model="password"
                               v-validate="'required'"
                               data-vv-as="Пароль">
                        <div class="modal-wrapper-form__error">{{ errors.first('password') }}</div>
                    </div>
                    <button type="submit" class="modal-wrapper-form__button" :disabled="validateResult">Войти</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        name: "LoginForm",
        props: ['url', 'method'],
        data() {
            return {
                email: null,
                password: null,
                token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                serverErrors: [],
                validateResult: false
            }
        },
        mounted() {
            this.$validator.pause()
        },
        methods: {
            checkForm() {
                this.$validator.resume()
                this.$validator.validateAll().then((result) => {
                    this.validateResult = result
                    if (result) {
                        axios({
                            method: this.method,
                            url: this.url,
                            data: {
                                email: this.email,
                                password: this.password,
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

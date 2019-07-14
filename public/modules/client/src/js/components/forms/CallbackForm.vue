<template>
    <div tabindex="0"
         class="modal-wrapper"
         data-form="callback">
        <div class="modal-login">
            <div class="modal-wrapper__close js-modal-close" data-modal-close="callback"></div>
            <div class="modal-wrapper__title">Обратный звонок</div>
            <form
                @submit.prevent="checkForm()"
                :method="method"
                :action="url"
            >
                <div v-for="error in serverErrors" class="login-wrapper-from__error-container">
                    <div
                        class="modal-wrapper-form__error"
                        v-for="message in error"
                    >
                        {{message}}
                    </div>
                </div>

                <div v-show="message.length" class="modal-wrapper-form__success">
                    {{message}}
                </div>
                <input type="hidden" name="_token" :value="token">
                <div class="modal-wrapper__form">
                    <div class="modal-wrapper-form__group">
                        <label for="callback-name" class="required">Имя:</label>
                        <input type="text" id="callback-name" name="name" class="modal-wrapper-form__input"
                               v-model="name"
                               v-validate="'required'"
                               data-vv-as="Имя">
                        <div class="modal-wrapper-form__error">{{ errors.first('name') }}</div>
                    </div>
                    <div class="modal-wrapper-form__group">
                        <label for="callback-email" class="required">Телефон:</label>
                        <input type="text" id="callback-email" name="phone" class="modal-wrapper-form__input"
                               v-model="phone"
                               v-validate="'required'"
                               data-vv-as="Телефон">
                        <div class="modal-wrapper-form__error">{{ errors.first('phone') }}</div>
                    </div>
                    <div class="modal-wrapper-form__group">
                        <label for="callback-password">Email:</label>
                        <input type="text" id="callback-password" name="email" class="modal-wrapper-form__input"
                               v-model="email"
                               v-validate="'email'"
                               data-vv-as="Email">
                        <div class="modal-wrapper-form__error">{{ errors.first('email') }}</div>
                    </div>
                    <button type="submit" class="modal-wrapper-form__button">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        name: "CallbackForm",
        props: ['url', 'method', 'defaultName'],
        data() {
            return {
                name: this.defaultName,
                phone: null,
                email: null,
                token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                serverErrors: [],
                message: ''
            }
        },
        mounted() {
            this.$validator.pause()
        },
        methods: {
            checkForm() {
                this.$validator.resume()
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        axios({
                            method: this.method,
                            url: this.url,
                            data: {
                                name: this.name,
                                phone: this.phone,
                                email: this.email,
                                _token: this._token
                            },
                        })
                            .then(response => {
                                this.message = response.data.message
                                this.$validator.pause()
                                this.name = ''
                                this.phone = ''
                                this.email = ''
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

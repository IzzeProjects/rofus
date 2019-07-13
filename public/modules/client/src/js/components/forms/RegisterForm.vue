<template>
    <div tabindex="0"
         class="modal-wrapper"
         data-form="register"
         @submit="checkForm"
    >
        <div class="modal-login">
            <div class="modal-wrapper__close js-modal-close" data-modal-close="register"></div>
            <div class="modal-wrapper__title">Регистрация</div>
            <form>
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
                    <button type="submit" class="modal-wrapper-form__button">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "RegisterForm",
        props: ['url', 'method'],
        data() {
            return {
                email: null,
                name: null,
                password: null,
                password_confirmation: null
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
        },
        methods: {
            checkForm(e) {
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        console.log('fields are ok');
                        return;
                    }
                    console.log('errors here');
                    e.preventDefault();
                })
            }
        }
    }
</script>

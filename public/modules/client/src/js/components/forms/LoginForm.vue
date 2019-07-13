<template>
    <div tabindex="0"
         class="modal-wrapper"
         data-form="login">
        <div class="modal-login">
            <div class="modal-wrapper__close js-modal-close" data-modal-close="login"></div>
            <div class="modal-wrapper__title">Вход</div>
            <form
                    @submit="checkForm"
            >
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
                    <button type="submit" class="modal-wrapper-form__button">Войти</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "LoginForm",
        props: ['url', 'method'],
        data() {
            return {
                email: null,
                password: null
            }
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

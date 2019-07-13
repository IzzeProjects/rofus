<template>
    <div tabindex="0"
         class="modal-wrapper"
         data-form="callback">
        <div class="modal-login">
            <div class="modal-wrapper__close js-modal-close" data-modal-close="callback"></div>
            <div class="modal-wrapper__title">Обратный звонок</div>
            <form @submit="checkForm">
                <div class="modal-wrapper__form">
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
                        <input type="password" id="callback-password" name="email" class="modal-wrapper-form__input"
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
    export default {
        name: "CallbackForm",
        props: ['url', 'method'],
        data() {
            return {
                phone: null,
                email: null
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

<template>
    <div class="content mod-login">
        <div class="login-wrapper">
            <div class="login-wrapper__title">Admin</div>
            <form :action="route" :method="method" @submit="checkForm">
                <input type="hidden" name="_token" :value="token">
                <div v-for="error in errorsJsonParse" class="login-wrapper-from__error-container">
                    <div
                        class="login-wrapper-from__error"
                        v-for="message in error"
                    >
                        {{message}}
                    </div>
                </div>
                <div class="login-wrapper__from">
                    <div class="login-wrapper-from__group">
                        <label for="email">Почта</label>
                        <input type="text" id="email" name="email"
                               v-model="email"
                               v-validate="'required|email'"
                               data-vv-as="Почта"
                        >
                        <div class="login-wrapper-from__error">{{ errors.first('email') }}</div>
                    </div>
                    <div class="login-wrapper-from__group">
                        <label for="password">Пароль</label>
                        <input type="password" id="password" name="password"
                               v-model="password"
                               v-validate="'required'"
                               data-vv-as="Пароль"
                        >
                        <div class="login-wrapper-from__error">{{ errors.first('password') }}</div>
                    </div>
                    <button type="submit" class="login-wrapper-from__button">Войти</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "LoginForm",
        props: ['method', 'route', 'serverErrors', 'inputs'],
        data() {
            return {
                email: null,
                password: null,
                token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        },
        mounted() {
            this.email = this.inputsJsonParse.email
            this.$validator.pause()
        },
        methods: {
            checkForm(e) {
                this.$validator.resume()
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        return;
                    }
                    e.preventDefault();
                })
            }
        },
        computed: {
            errorsJsonParse: function () {
                return JSON.parse(this.serverErrors)
            },
            inputsJsonParse: function () {
                return JSON.parse(this.inputs)
            }
        }
    }
</script>

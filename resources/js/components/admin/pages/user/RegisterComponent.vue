<template>
    <div class="hold-transition login-page">
        <div class="login-box">
            <div class="card">
                <div class="card-body register-card-body">
                    <p class="login-box-msg">Registrar um novo membro</p>

                    <form @submit.prevent="register">
                        <form-component :user="formData" :errors="errors"></form-component>
                    </form>

                    <router-link class="text-center" :to="{name: 'login'}">Já sou inscrito</router-link>
                </div>
                <!-- /.form-box -->
            </div>
        </div>
    </div>

</template>

<script>
    import FormComponent from "./partials/FormComponent";

    export default {
        data() {
            return {
                formData: {
                    name: '',
                    email: '',
                    password: ''
                },

                errors: []
            }
        },

        methods: {
            register () {
                this.$store.dispatch('register', this.formData)
                    .then(() => {
                        this.$router.push({name: 'admin'})
                    })
                    .catch(error => {
                        this.errors = error
                        this.$snotify.error('Falha ao registrar-se!', 'Opss!!')
                    })
            }
        },

        components: {
            FormComponent
        }
    }
</script>

<style scoped>

</style>

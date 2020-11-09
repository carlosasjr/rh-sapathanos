<template>
    <div class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <b>Atualizar Perfil</b>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <form @submit.prevent="update">
                        <form-component :user="formData" :errors="errors"></form-component>
                    </form>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
    </div>
</template>

<script>
    import FormComponent from "./partials/FormComponent";

    export default {
        computed: {
            formData () {
                return this.$store.state.auth.me
            }
        },

        data () {
            return {
                errors: []
            }
        },

        methods: {
            update () {
                this.$store.dispatch('updateProfile', this.formData)
                    .then(() => {
                        this.$router.push({name: 'admin'})
                        this.$snotify.success('Atualizado com sucesso')
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

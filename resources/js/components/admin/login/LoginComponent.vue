<template>
    <div class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#"><b>Sapathanos </b>M.E</a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Entre para iniciar sua sessão</p>

                    <form @submit.prevent="login">
                        <div class="input-group mb-3">
                            <input v-model="formData.email" type="email" class="form-control" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input v-model="formData.password" type="password" class="form-control" placeholder="Senha">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">
                                        Lembre-me
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    <p class="mb-1">
                        <a href="forgot-password.html">Esquici minha senha</a>
                    </p>
                    <p class="mb-0">
                        <a href="register.html" class="text-center">Registrar um novo membro</a>
                    </p>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return  {
                formData: {
                    email: '',
                    password: ''
                }
            }
        },

        methods: {
            login () {
                this.$store.dispatch('login', this.formData)
                .then(() => {
                    this.$router.push({name: 'admin'})
                })
            }
        }
    }
</script>

<style scoped>

</style>

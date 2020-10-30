<template>
    <div>
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light justify-content-between ">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <router-link class="nav-link" :to="{name: 'admin.employees'}">
                            Funcionários
                    </router-link>
                </li>
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" @click.prevent="logout" class="nav-link">Logout</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
    </div>
</template>

<script>
    export default {

        methods : {
            logout () {
                this.$store.dispatch('logout')
                    .then(() => this.$router.push({name: 'login'}))
            }
        }

    }
</script>

<style scoped>

</style>

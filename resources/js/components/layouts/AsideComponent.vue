<template>
    <div>
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="/images/rh.png"
                     alt="Sapathanos"
                     class="brand-image img-circle elevation-3"
                     style="opacity: .8">
                <span class="brand-text font-weight-light">Spathanos</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <!--<img src="#" class="img-circle elevation-2" alt="User Image">-->
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ getUserAuth }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <router-link class="nav-link" :to="{name: 'admin'}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                 </p>
                            </router-link>
                        </li>

                        <li class="nav-item">
                            <router-link class="nav-link" :to="{name: 'admin.employees'}">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Funcionários
                                </p>
                            </router-link>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
    </div>
</template>

<script>
    export default {
        computed: {
            getUserAuth () {
                return this.$store.state.auth.me.name
            }
        }
    }
</script>

<style scoped>

</style>

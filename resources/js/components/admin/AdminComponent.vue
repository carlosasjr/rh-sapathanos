<template>
    <div>
        <div class="wrapper">
            <nav-bar-component></nav-bar-component>
            <aside-component></aside-component>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">
                    <router-view></router-view>
                </section>
                <!-- /.content -->
            </div>

            <footer-component></footer-component>
            <!-- /.content-wrapper -->
        </div>

    </div>
</template>

<script>
    import NavBarComponent from "../layouts/NavBarComponent";
    import AsideComponent from "../layouts/AsideComponent";
    import FooterComponent from "../layouts/FooterComponent";
    export default {
        components : {
            NavBarComponent,
            AsideComponent,
            FooterComponent
        }
    }
</script>

<style scoped>

</style>

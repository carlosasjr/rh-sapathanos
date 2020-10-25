<template>
    <div class="preloader" v-show="preloader">
        <img src="/images/load.gif" alt="Carregando...">
    </div>
</template>

<script>
    export default {
        computed: {
            preloader () {
                return this.$store.state.preloader.loading
            }
        }
    }
</script>

<style scoped>
    .preloader {
        background: #000;
        position: absolute;
        z-index: 9999;
        opacity: .2;
        width: 100%;
        height: 100%;
        text-align: center;
        padding: 15% 0;
    }

    .preloader img {
        max-width: 100%;
    }
</style>

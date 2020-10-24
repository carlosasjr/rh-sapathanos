<template>
    <div>
        <ul class="nav bg-dark">
            <li class="nav-item">
                <router-link class="nav-link" :to="{name: 'admin.employees'}">Funcionários</router-link>
            </li>
        </ul>

        <router-view></router-view>
    </div>
</template>

<script>
    export default {

    }
</script>

<style scoped>

</style>

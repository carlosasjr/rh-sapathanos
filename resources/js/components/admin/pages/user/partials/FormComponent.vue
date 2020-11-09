<template>
    <div>
        <div :class="['form-group', {'has-error' : errors.name}]">
            <input v-model="user.name" type="text" class="form-control" placeholder="Nome">
            <div v-if="errors.name">{{ errors.name[0] }}</div>
        </div>

        <div :class="['form-group', {'has-error' : errors.email}]">
            <input v-model="user.email" type="email" class="form-control" placeholder="Email">
            <div v-if="errors.email">{{ errors.email[0] }}</div>
        </div>
        <div :class="['form-group', {'has-error' : errors.password}]">
            <input v-model="user.password" type="password" class="form-control" placeholder="Senha">
            <div v-if="errors.password">{{ errors.password[0] }}</div>
        </div>
        <div class="row">
            <!-- /.col -->
            <div class="col">
                <button type="submit" class="btn btn-primary btn-block">Salvar</button>
            </div>
            <!-- /.col -->
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user', 'errors']
    }
</script>

<style scoped>
    .has-error {
        color: red
    }

    .has-error input {
        border: 1px solid red;
    }
</style>

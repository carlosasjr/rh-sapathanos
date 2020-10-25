<template>
    <div>
        <h1>Alterar Funcionário</h1>
        <form-component
            :updating="true"
            :employee="this.employee"

        ></form-component>
    </div>
</template>

<script>
    import FormComponent from "./partials/FormComponent";
    export default {
        props: {
          id : {
              required: true
          }
        },

        created () {
            this.getEmployee()
        },

        data () {
            return {
                employee : {}
            }
        },

        methods: {
           getEmployee() {
               this.$store.dispatch('getEmployee', this.id)
               .then(response => this.employee = response)
               .catch(error => {
                   this.$snotify.error('Falha ao localizar o registro', 'Opps!')
                   this.$router.push({name: 'admin.employees'})
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

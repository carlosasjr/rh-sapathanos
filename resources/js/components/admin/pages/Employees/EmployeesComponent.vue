<template>
    <div>
        <h1>Gestão de Funcionários</h1>

        <div class="d-flex justify-content-between">
            <div class="col-6">
                <router-link class="btn btn-primary" :to="{name: 'admin.employees.create'}">Adicionar</router-link>
            </div>

            <div class="col-6">
                <a href="#" @click.prevent="confirmHolerite" class="btn btn-success">Gerar Folha de Pagamento</a>
            </div>
        </div>

        <table class="table table-dark">
            <thead>
                <tr>
                    <th with="150">Foto</th>
                    <th>#id</th>
                    <th>Nome</th>
                    <th with="200">Ações</th>
                </tr>
            </thead>

            <tbody>
                <tr v-for="employee in employees.data" :key="employee.id">
                    <td>
                        <div v-if="employee.image">
                            <img :src="[`/storage/employees/${employee.image}`]" :alt="employee.name" class="img-list">
                        </div>
                    </td>
                    <td>{{ employee.id }}</td>
                    <td>{{ employee.name }}</td>
                    <td>
                        <router-link class="btn btn-info" :to="{name: 'admin.employees.edit', params: {id: employee.id }}">Editar</router-link>
                        <button @click.prevent="confirmation(employee)" class="btn btn-danger">Excluir</button>
                        <a href="#" @click.prevent="printFile(employee)" class="btn btn-primary">Ficha</a>
                    </td>
                </tr>
            </tbody>
        </table>

        <paginationComponent
            :pagination="employees"
            :offset="10"
            @paginate="loadEmplooyes">
        </paginationComponent>

    </div>
</template>

<script>
    import paginationComponent from "../../../layouts/paginationComponent";
    export default {
        created() {
            this.loadEmplooyes(1)
        },

        data () {
            return  {
                search: ''
            }
        },

        computed: {
            employees () {
               return this.$store.state.employees.items
            },

            params () {
                return {
                    page: 1,
                    filter: this.search
                }
            }
        },

        methods : {
           loadEmplooyes (page) {
               this.$store.dispatch('loadEmplooyes', {...this.params, page});
           },

            confirmation (employee) {
                this.$snotify.error(`Deseja realmente deletar a categoria ${employee.name}`,
                    'Deletar?', {
                        timeout: 10000,
                        showProgressBar: true,
                        pauseOnHover: true,
                        position: "centerCenter",
                        closeOnClick: true,
                        buttons: [
                            {
                                text: 'Não', action: null
                            },
                            {
                                text: 'Sim', action: (value) => {
                                    this.destroy(employee), this.$snotify.remove(value.id)
                                }
                            }
                        ]
                    })
            },

            destroy (employee) {
               this.$store.dispatch('destroyEmployee', employee)
                .then(response => {
                    this.$snotify.success('Registro deletado com sucesso!!')
                    this.loadEmplooyes(1);
                })
                .catch(error => {
                    this.$snotify.error('Falha ao deletar', 'Opps!!')
                })
            },

            printFile (employee) {
               this.$store.dispatch('printFile', employee)
            },

            confirmHolerite() {
                this.$snotify.confirm(`Deseja realmente gerar a folha de pagamento?`,
                    'Confirma?', {
                        timeout: 10000,
                        showProgressBar: true,
                        pauseOnHover: true,
                        position: "centerCenter",
                        closeOnClick: true,
                        buttons: [
                            {
                                text: 'Não', action: null
                            },
                            {
                                text: 'Sim', action: (value) => {
                                    this.sendHolerite()
                                    this.$snotify.remove(value.id)
                                }
                            }
                        ]
                    })
            },

            sendHolerite () {
               this.$store.dispatch('sendHolerite')
                .then(() => this.$snotify.success('Folha de pagamento gerada com sucesso!'))
                .catch(() => this.$snotify.error('Falha ao gerar folha de pagamento..', 'Opss..'))

            }
        },

        components: {
            paginationComponent
        }

    }
</script>

<style scoped>
 .img-list {
     max-width: 55px;
 }

 table {
     margin-top: 5px
 }
</style>

<template>
    <div>
        <form class="form" @submit.prevent="onSubmit" enctype="multipart/form-data">
            <div class="card  card-outline card-info">
                <div class="card-header">
                    <div class="card-title">
                        Identificação
                        <small>Dados pessoais</small>
                    </div>
                </div>

                <div class="card-body">
                    <div :class="['form-group', {'has-error' : errors.name}]">
                        <input v-model="employee.name"
                               type="text" class="form-control" placeholder="Nome do Funcionário">
                        <div v-if="errors.name">{{ errors.name[0] }}</div>
                    </div>

                    <div :class="['form-group', {'has-error' : errors.email}]">
                        <input v-model="employee.email"
                               type="email" class="form-control" placeholder="E-mail">
                        <div v-if="errors.email">{{ errors.email[0] }}</div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div :class="['form-group', {'has-error' : errors.cpf}]">
                                <input v-model="employee.cpf"
                                       type="text" class="form-control" placeholder="CPF">
                                <div v-if="errors.cpf">{{ errors.cpf[0] }}</div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div :class="['form-group', {'has-error' : errors.name}]">
                                <input v-model="employee.rg"
                                       type="text" class="form-control" placeholder="RG:">
                                <div v-if="errors.rg">{{ errors.rg[0] }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div :class="['form-group', {'has-error' : errors.date_birth}]">
                                <label>Data de Aniversário</label>
                                <input v-model="employee.date_birth"
                                       type="date" class="form-control" placeholder="Data de Nascimento">
                                <div v-if="errors.date_birth">{{ errors.date_birth[0] }}</div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div :class="['form-group', {'has-error' : errors.cellphone}]">
                                <input v-model="employee.cellphone"
                                       type="text" class="form-control" placeholder="Celular">
                                <div v-if="errors.cellphone">{{ errors.cellphone[0] }}</div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div :class="['form-group', {'has-error' : errors.telephone}]">
                                <input v-model="employee.telephone"
                                       type="text" class="form-control" placeholder="Telefone:">
                                <div v-if="errors.telephone">{{ errors.telephone[0] }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div :class="['form-group', {'has-error' : errors.marital_status}]">
                                <select v-model="employee.marital_status" class="form-control">
                                    <option value="">Escolha um Estado Civil</option>
                                    <option value="Solteiro">Solteiro</option>
                                    <option value="Casado">Casado</option>
                                    <option value="Separado">Separado</option>
                                    <option value="Viúvo">Viúvo</option>

                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div :class="['form-group', {'has-error' : errors.partner}]">
                                <input v-model="employee.partner"
                                       type="text" class="form-control" placeholder="Conjuge">
                                <div v-if="errors.partner">{{ errors.partner[0] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <div class="card car-outline card-info">
                <div class="card-header">
                    <div class="card-title">
                        Outras Informações
                    </div>
                </div>

                <div class="card-body">
                    <div :class="['form-group', {'has-error' : errors.observation}]">
                        <textarea class="form-control" v-model="employee.observation" cols="30" rows="10" placeholder="Outras informações do funcionário"></textarea>
                        <div v-if="errors.observation">{{ errors.observation[0] }}</div>
                    </div>
                </div>
            </div>

            <br>

            <div class="card car-outline card-info">
                <div class="card-header">
                    <div class="card-title">
                        Foto do Funcionário
                    </div>
                </div>

                <div class="card-body">
                    <div :class="['form-group', {'has-error' : errors.image}]">

                    </div>
                </div>
            </div>

            <br>
            <div class="card car-outline card-info">
                <div class="card-header">
                    <div class="card-title">
                        Para uso da empresa
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div :class="['form-group', {'has-error' : errors.admission}]">
                                <label>Admissão</label>
                                <input v-model="employee.admission"
                                       type="date" class="form-control">
                                <div v-if="errors.admission">{{ errors.admission[0] }}</div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div :class="['form-group', {'has-error' : errors.resignation}]">
                                <label>Demissão</label>
                                <input v-model="employee.resignation"
                                       type="date" class="form-control">
                                <div v-if="errors.resignation">{{ errors.resignation[0] }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div :class="['form-group', {'has-error' : errors.salary}]">
                                <input v-model="employee.salary"
                                       type="text" class="form-control" placeholder="Salário">
                                <div v-if="errors.salary">{{ errors.salary[0] }}</div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div :class="['form-group', {'has-error' : errors.hours}]">
                                <input v-model="employee.hours"
                                       type="text" class="form-control" placeholder="Horas">
                                <div v-if="errors.hours">{{ errors.hours[0] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <button class="btn btn-primary" type="submit">Salvar</button>
        </form>
    </div>
</template>

<script>

    export default {
        props: {
            updating: {
              required: false,
              type: Boolean,
              default: false
            },

            employee: {
                required: false,
                type: Object | Array,
                default: () => ({
                    name: '',
                    email: '',
                    cpf: '',
                    rg: '',
                    date_birth: '',
                    cellphone: '',
                    telephone: '',
                    partner: '',
                    marital_status: '',
                    observation: '',
                    image: '',
                    admission: '',
                    resignation: '',
                    salary: '',
                    hours: '',
                    user_id: 1
                })
            }
        },


        data() {
            return {
                errors: []
            }
        },


        methods: {
            onSubmit() {
                const action = this.updating ? 'updateEmployee' : 'saveEmployee'

                this.$store.dispatch(action, this.employee)
                    .then(response => {
                        this.$snotify.success('Registro salvo com sucesso!!', 'Sucesso!')
                        this.$router.push({name: 'admin.employees'})
                    })
            }
        }
    }
</script>

<style scoped>

</style>

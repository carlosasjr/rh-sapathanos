<template>
    <div>
        <form class="form" @submit.prevent="onSubmit">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="card-title">
                        Foto do Funcionário
                    </div>
                </div>

                <div class="card-body">
                    <div :class="['form-group', {'has-error' : errors.image}]">
                        <div v-if="errors.image">{{ errors.image[0] }}</div>
                        <div v-if="imagePreview" class="text-center">
                            <img :src="imagePreview" class="image-preview">
                            <br>
                            <button class="btn btn-danger" @click.prevent="removePreviewImage">Remover</button>
                        </div>

                        <div v-else>
                            <input type="file" @change="onImageChange" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <div class="card card-secondary">
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
                                       v-mask="'###.###.###-##'"
                                       type="text" class="form-control" placeholder="CPF">
                                <div v-if="errors.cpf">{{ errors.cpf[0] }}</div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div :class="['form-group', {'has-error' : errors.name}]">
                                <input v-model="employee.rg"
                                       v-mask="'##.###.###-#'"
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
                                <label></label>
                                <input v-model="employee.cellphone"
                                       v-mask="'(##) #####-####'"
                                       type="text" class="form-control" placeholder="Celular">
                                <div v-if="errors.cellphone">{{ errors.cellphone[0] }}</div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div :class="['form-group', {'has-error' : errors.telephone}]">
                                <label></label>
                                <input v-model="employee.telephone"
                                       v-mask="'(##) ####-####'"
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


                    <div class="row">
                        <div class="col-12 col-sm-9">
                            <div :class="['form-group', {'has-error' : errors.street}]">
                                <input v-model="employee.street" type="text" class="form-control" placeholder="Rua">
                                <div v-if="errors.street">{{ errors.street[0] }}</div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-3">
                            <div :class="['form-group', {'has-error' : errors.number}]">
                                <input v-model="employee.number" type="text" class="form-control" placeholder="Numero">
                                <div v-if="errors.number">{{ errors.number[0] }}</div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div :class="['form-group', {'has-error' : errors.district}]">
                                <input v-model="employee.district" type="text" class="form-control"
                                       placeholder="Bairro">
                                <div v-if="errors.district">{{ errors.district[0] }}</div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6">
                            <div :class="['form-group', {'has-error' : errors.complement}]">
                                <input v-model="employee.complement" type="text" class="form-control"
                                       placeholder="Complemento">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <div :class="['form-group', {'has-error' : errors.country}]">
                                <input v-model="employee.country" type="text" class="form-control"
                                       placeholder="País">
                            </div>
                        </div>

                        <div class="col-12 col-sm-2">
                            <div :class="['form-group', {'has-error' : errors.state}]">
                                <input v-model="employee.state" type="text" class="form-control"
                                       placeholder="UF">
                            </div>
                        </div>


                        <div class="col-12 col-sm-6">
                            <div :class="['form-group', {'has-error' : errors.city}]">
                                <input v-model="employee.city" type="text" class="form-control"
                                       placeholder="Cidade">
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
                        <textarea class="form-control" v-model="employee.observation" cols="30" rows="10"
                                  placeholder="Outras informações do funcionário"></textarea>
                        <div v-if="errors.observation">{{ errors.observation[0] }}</div>
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
                                <vue-numeric currency="R$"
                                             separator="."
                                             :precision="2"
                                             v-model="employee.salary" class="form-control"></vue-numeric>
                                <div v-if="errors.salary">{{ errors.salary[0] }}</div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div :class="['form-group', {'has-error' : errors.hours}]">
                                <input v-model="employee.hours"
                                       v-mask="'##:##:##'"
                                       type="text" class="form-control" placeholder="Horas">
                                <div v-if="errors.hours">{{ errors.hours[0] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <div class="card car-outline card-danger">
                <div class="card-header">
                    <div class="card-title">
                        Anexar Documentos
                    </div>
                </div>

                <div class="card-body">
                    <div class="large-12 medium-12 small-12 filezone">
                        <input class="files_upload" type="file" id="files" ref="files" multiple @change="handleFiles"/>
                        <p>
                            Solte seus arquivos aqui <br>ou clique para pesquisar
                        </p>
                    </div>

                    <div v-for="(file, key) in files" class="file-listing">
                        <img class="preview" v-bind:ref="'preview'+parseInt(key)"/>
                        {{ file.name }}
                        <div class="success-container" v-if="file.id > 0">
                            Sucesso
                        </div>
                        <div class="remove-container" v-else>
                            <a class="remove" v-on:click="removeFile(key)">Remover</a>
                        </div>
                    </div>

                    <hr>

                    <ul class="list-group">
                        <li class="list-group-item" v-for="(document, index) in employee.employee_documents"
                            :key="index">
                            <a :href="`storage/${document.file}`" download>{{ document.name }}</a>
                        </li>
                    </ul>
                </div>
            </div>

            <br>

            <button class="btn btn-primary" type="submit">Salvar</button>
            <br>
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
                    admission: '',
                    resignation: '',
                    salary: '',
                    hours: '',
                    street: '',
                    number: '',
                    district: '',
                    complement: '',
                    cep: '',
                    city: '',
                    state: '',
                    country: '',
                    user_id: 1
                })
            }
        },


        data() {
            return {
                errors: {},
                image: null,
                imagePreview: null,
                files: []
            }
        },

        methods: {
            serialize(object) {
                const formData = new FormData();

                Object.entries(object).forEach(([key, value]) => {
                    if (value != null) {
                        formData.append(key, value);
                    }
                });

                if (this.image) {
                    formData.append('image', this.image)
                }

                if (this.files.length > 0) {
                    for (var i = 0; i < this.files.length; i++) {
                        formData.append('files[]', this.files[i])
                    }
                }

                return formData
            },


            onImageChange(e) {
                let files = e.target.files || e.dataTransfer.files

                if (!files.length)
                    return

                this.image = files[0]

                this.previewImage(this.image)
            },

            previewImage(file) {
                let reader = new FileReader()
                reader.onload = (e) => {
                    this.imagePreview = e.target.result
                }

                reader.readAsDataURL(file)
            },

            removePreviewImage() {
                this.imagePreview = null
                this.image = null
            },

            handleFiles(e) {
                let files = e.target.files || e.dataTransfer.files

                if (!files.length)
                    return

                for (var i = 0; i < files.length; i++) {
                    this.files.push(files[i]);
                }

                this.getImagePreviews();
            },

            getImagePreviews() {
                for (let i = 0; i < this.files.length; i++) {
                    if (/\.(jpe?g|png|gif)$/i.test(this.files[i].name)) {
                        let reader = new FileReader();
                        reader.addEventListener("load", function () {
                            this.$refs['preview' + parseInt(i)][0].src = reader.result;
                        }.bind(this), false);
                        reader.readAsDataURL(this.files[i]);
                    } else {
                        this.$nextTick(function () {
                            this.$refs['preview' + parseInt(i)][0].src = '/images/generic.png';
                        });
                    }
                }
            },


            removeFile(key) {
                this.files.splice(key, 1);
                this.getImagePreviews();
            },


            onSubmit() {
                const action = this.updating ? 'updateEmployee' : 'saveEmployee'

                this.$store.dispatch(action, this.serialize(this.employee))
                    .then(response => {
                        this.reset()
                        this.$snotify.success('Registro salvo com sucesso!!', 'Sucesso!')
                        this.$router.push({name: 'admin.employees'})
                    })
                    .catch(error => {
                        this.$snotify.error('Falha ao cadastrar', 'Opps!')
                        this.errors = error;
                    })
            },

            reset() {
                this.errors = []
                this.imagePreview = null
                this.image = null
            }
        }
    }
</script>

<style scoped>
    .has-error {
        color: red
    }

    .has-error input {
        border: 1px solid red;
    }

    .image-preview {
        max-width: 89px;
    }

    .files_upload {
        opacity: 0;
        width: 100%;
        height: 200px;
        position: absolute;
        cursor: pointer;
    }

    .filezone {
        outline: 2px dashed grey;
        outline-offset: -10px;
        background: #ccc;
        color: dimgray;
        padding: 10px 10px;
        min-height: 200px;
        position: relative;
        cursor: pointer;
    }

    .filezone:hover {
        background: #c0c0c0;
    }

    .filezone p {
        font-size: 1.2em;
        text-align: center;
        padding: 50px 50px 50px 50px;
    }

    div.file-listing img {
        max-width: 90%;
    }

    div.file-listing {
        margin: auto;
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    div.file-listing img {
        height: 100px;
    }

    div.success-container {
        text-align: center;
        color: green;
    }

    div.remove-container {
        text-align: center;
    }

    div.remove-container a {
        color: red;
        cursor: pointer;
    }

</style>

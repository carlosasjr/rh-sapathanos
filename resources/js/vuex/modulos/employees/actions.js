import axios from "axios";

const CONFIGS = {
    headers : {
        'content-type' : 'multipart/form-data'
    }
}

const actions = {
    loadEmplooyes(context, params) {
        context.commit('CHANGE_PRELOADER', true)

        axios.get('/api/v1/employees', {params})
            .then(response => context.commit('LOAD_EMPLOOYES', response.data))
            .catch(error => console.log(error))
            .finally(() => context.commit('CHANGE_PRELOADER', false))
    },

    saveEmployee(context, dataForm) {
        context.commit('CHANGE_PRELOADER', true)
        return new Promise((resolve, reject) => {
            axios.post('/api/v1/employees', dataForm, CONFIGS)
                .then(response => resolve(response.data))
                .catch(error => reject(error.response.data.errors))
                .finally(() => context.commit('CHANGE_PRELOADER', false))
        })
    },


    updateEmployee (context, formData) {
        context.commit('CHANGE_PRELOADER', true)

        formData.append('_method', 'PUT')

        return new Promise((resolve, reject) => {
            axios.post(`/api/v1/employees/${formData.get('id')}`, formData)
                .then(response => resolve(response.data))
                .catch(error => {
                    console.log(error)
                    context.commit('CHANGE_PRELOADER', false)
                    reject(error.response.data.errors)
                })
                .finally (() => context.commit('CHANGE_PRELOADER', false))
        })
    },

    destroyEmployee(context, employee) {
        context.commit('CHANGE_PRELOADER', true)

        return new Promise((resolve, reject) => {
            axios.delete(`/api/v1/employees/${employee.id}`)
                .then(response => resolve())
                .catch(error => reject(error.response.data.errors))
        })
    },

    getEmployee(context, id) {
        context.commit('CHANGE_PRELOADER', true)

        return new Promise((resolve, reject) => {
            axios.get(`/api/v1/employees/${id}`)
                .then(response => resolve(response.data))
                .catch(error => reject(error) )
                .finally (() => context.commit('CHANGE_PRELOADER', false))
        })
    },

    printFile(context, employee) {
        context.commit('CHANGE_PRELOADER', true)

        axios({
            url: `/api/v1/employee-file/${employee.id}`,
            method: 'GET',
            responseType: 'blob', // important
        }).then((response) => {
            const url = window.URL.createObjectURL(new Blob([response.data]));
            const link = document.createElement('a');
            link.href = url;
            link.setAttribute('download', `${employee.name}.pdf`);
            document.body.appendChild(link);
            link.click();
        });

        context.commit('CHANGE_PRELOADER', false)
    },

    sendHolerite (context) {
        context.commit('CHANGE_PRELOADER', true)

        return new Promise((resolve, reject) => {
            axios.get('/api/v1/employee-sendmail')
                .then(response => resolve())
                .catch(error => reject(error) )
                .finally (() => context.commit('CHANGE_PRELOADER', false))
        })
    }


}

export default actions

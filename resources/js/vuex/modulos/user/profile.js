import {NAME_TOKEN} from "../../../config/configs";

export default {
    actions: {
        register (context, user) {
            context.commit('CHANGE_PRELOADER', true)

            return new Promise((resolve, reject) => {
                axios.post('/api/register', user)
                    .then(response => {
                        context.commit('AUTH_USER_OK', response.data.user)

                        const token = response.data.token
                        window.axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
                        localStorage.setItem(NAME_TOKEN, token)

                        resolve()
                    })
                    .catch(error => {
                        reject(error.response.data.errors)
                    })
                    .finally(() => context.commit('CHANGE_PRELOADER', false))
            })
        },

        updateProfile (context, user) {
            context.commit('CHANGE_PRELOADER', true)

            return new Promise((resolve, reject) => {
                axios.put('/api/update-profile', user)
                    .then(response => {
                        context.commit('AUTH_USER_OK', response.data)

                        resolve()
                    })
                    .catch(error => {
                        reject(error.response.data.errors)
                    })
                    .finally(() => context.commit('CHANGE_PRELOADER', false))
            })

        }
    }
}

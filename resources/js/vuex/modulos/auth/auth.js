import {NAME_TOKEN} from '../../../config/configs'

export default {
    state: {
        me: {},
        authenticated: false
    },

    mutations: {
        AUTH_USER_OK (state, user) {
            state.authenticated = true
            state.me = user
        }
    },

    actions: {
        login (context, params) {
            context.commit('CHANGE_PRELOADER', true)
            return axios.post('/api/login', params)
                .then(response => {
                    context.commit('AUTH_USER_OK', response.data.user)

                   localStorage.setItem(NAME_TOKEN, response.data.token)

                })
                .catch(error => console.log(error))
                .finally(() =>    context.commit('CHANGE_PRELOADER', false))
        },

        checkLogin (context) {


            return new Promise((resolve, reject) => {
                const token = localStorage.getItem(NAME_TOKEN)

                if (!token) {
                    return reject()
                }

                axios.get('/api/me')
                    .then(response => {
                        context.commit('AUTH_USER_OK', response.data.user)
                        resolve()
                    })
                    .catch(() => {
                        reject()
                    })


            })
        },
    }
}

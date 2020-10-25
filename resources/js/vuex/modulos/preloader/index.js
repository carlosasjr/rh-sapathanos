export  default  {
    state: {
        loading: false
    },

    mutations: {
        CHANGE_PRELOADER (state, status) {
            state.loading = status
        }
    }
}

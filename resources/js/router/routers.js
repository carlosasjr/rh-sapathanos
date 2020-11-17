import Vue from 'vue'
import VueRouter from 'vue-router'
import store from "../vuex/store";
import routes from "./routers.map"

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes
})

router.beforeEach((to, from, next) => {
    if (to.meta.auth && !store.state.auth.authenticated) {
        store.commit('CHANGE_URL_BACK', to.name)
        return router.push({name: 'login'})
    }

    if (to.matched.some(record => record.meta.auth) && !store.state.auth.authenticated ) {
        store.commit('CHANGE_URL_BACK', to.name)
        return router.push({name: 'login'})
    }

    if (to.meta.hasOwnProperty('auth') && !to.meta.auth && store.state.auth.authenticated) {
        return router.push({name: 'admin'})
    }

    next()
})

export default router

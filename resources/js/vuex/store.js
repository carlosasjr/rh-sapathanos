import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

Vue.use(Vuex)

import employees from "./modulos/employees";
import preloader from "./modulos/preloader"
import auth from "./modulos/auth/auth";
import profile from "./modulos/user/profile"

export default  new Vuex.Store({
    modules: {
        auth,
        profile,
        employees,
        preloader
    }
})

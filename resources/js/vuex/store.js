import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

Vue.use(Vuex)

import employees from "./modulos/employees";
import preloader from "./modulos/preloader"

export default  new Vuex.Store({
    modules: {
        employees,
        preloader
    }
})

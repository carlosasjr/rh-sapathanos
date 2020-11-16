import Vue from 'vue'
import VueRouter from 'vue-router'
import store from "../vuex/store";

import AdminComponent from "../components/admin/AdminComponent";
import EmployeesComponent from "../components/admin/pages/Employees/EmployeesComponent";
import DashBoardComponent from "../components/admin/pages/DashBoardComponent";
import CreateEmployeeComponent from "../components/admin/pages/Employees/CreateEmployeeComponent";
import UpdateEmployeeComponent from "../components/admin/pages/Employees/UpdateEmployeeComponent";
import LoginComponent from "../components/admin/login/LoginComponent";
import RegisterComponent from "../components/admin/pages/user/RegisterComponent";
import ProfileComponent from "../components/admin/pages/user/ProfileComponent";


Vue.use(VueRouter)

const routes = [
    {path: '/login', component: LoginComponent, name: 'login', meta: {auth: false} },
    {path: '/register', component: RegisterComponent, name: 'register', meta: {auth: false} },

    {path: '/', component: AdminComponent,
        meta: {auth: true},
        children: [
            {path: '', component: DashBoardComponent, name: 'admin'},
            {path: 'update-profile', component: ProfileComponent, name: 'profile'},
            {path: 'employees', component: EmployeesComponent, name: 'admin.employees'},
            {path: 'employees/create', component: CreateEmployeeComponent, name: 'admin.employees.create'},
            {path: 'employees/:id/edit', component: UpdateEmployeeComponent, name: 'admin.employees.edit', props: true},
        ]
    }
]

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

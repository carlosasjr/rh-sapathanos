import Vue from 'vue'
import VueRouter from 'vue-router'
import AdminComponent from "../components/admin/AdminComponent";
import EmployeesComponent from "../components/admin/pages/Employees/EmployeesComponent";


Vue.use(VueRouter)

const routes = [
    {path: '/admin', component: AdminComponent,
        children: [
            {path: '', component: EmployeesComponent, name: 'admin.employees'}
        ]

    }
]

export default new VueRouter({
    routes
})

import Vue from 'vue'
import VueRouter from 'vue-router'
import AdminComponent from "../components/admin/AdminComponent";
import EmployeesComponent from "../components/admin/pages/Employees/EmployeesComponent";
import DashBoardComponent from "../components/admin/pages/DashBoardComponent";
import CreateEmployeeComponent from "../components/admin/pages/Employees/CreateEmployeeComponent";
import UpdateEmployeeComponent from "../components/admin/pages/Employees/UpdateEmployeeComponent";


Vue.use(VueRouter)

const routes = [
    {path: '/admin', component: AdminComponent,
        children: [
            {path: '', component: DashBoardComponent, name: 'admin'},
            {path: 'employees', component: EmployeesComponent, name: 'admin.employees'},
            {path: 'employees/create', component: CreateEmployeeComponent, name: 'admin.employees.create'},
            {path: 'employees/:id/edit', component: UpdateEmployeeComponent, name: 'admin.employees.edit', props: true},
        ]
    }
]

export default new VueRouter({
    routes
})

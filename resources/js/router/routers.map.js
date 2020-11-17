import AdminComponent from "../components/admin/AdminComponent";
import EmployeesComponent from "../components/admin/pages/Employees/EmployeesComponent";
import DashBoardComponent from "../components/admin/pages/DashBoardComponent";
import CreateEmployeeComponent from "../components/admin/pages/Employees/CreateEmployeeComponent";
import UpdateEmployeeComponent from "../components/admin/pages/Employees/UpdateEmployeeComponent";
import LoginComponent from "../components/admin/login/LoginComponent";
import RegisterComponent from "../components/admin/pages/user/RegisterComponent";
import ProfileComponent from "../components/admin/pages/user/ProfileComponent";


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

export default routes

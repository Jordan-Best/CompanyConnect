import Vue from 'vue';
import VueRouter from 'vue-router';
import companyList from '../company/companyList';
import employeeList from '../employee/employeeList.vue';
import editCompany from '../company/editCompany.vue';
import login from '../login/login.vue';

Vue.use(VueRouter);

const routes = [
    {
        path: '/Login',
        name: 'Login',
        component: login
    },
    {
        path: '/CompanyList',
        name: 'CompanyList',
        component: companyList
    },
    {
        path: '/EmployeeList',
        name: 'EmployeeList',
        component: employeeList
    },
    {
        path: '/EditCompany/:id',
        name: 'EditCompany',
        component: editCompany,
    }
];

const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
});

export default router;


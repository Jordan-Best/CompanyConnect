require('./bootstrap');

import Vue from 'vue'
import App from './vue/app.vue'
import router from './vue/router'
import login from './vue/login/login.vue'
import employeeList from './vue/employee/employeeList.vue'
import companyList from './vue/company/companyList.vue'
import company from './vue/company/company.vue'
import('../css/app.css');

const app = new Vue({
    el: '#app',
    router: router,
    components: {App, login, employeeList, companyList, company}
});
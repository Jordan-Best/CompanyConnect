<template>
    <div class='bg-white dark:bg-gray-800 max-h-screen container'>
        <div class="flex md:flex-row space-x-2 max-w-40 self-center">
            <div>
                <router-link to="/Login">Login</router-link>
            </div>
            <div>
                <router-link to="/CompanyList">Companies</router-link>
            </div>
            <div>
                <router-link to="/EmployeeList">Employees</router-link>
            </div>
        </div>
        <div class="container">
            <router-view></router-view>
        </div>
        
    </div>
</template>
<script>
import('../../css/app.css');
import('../../css/output.css');
export default {

}
</script>
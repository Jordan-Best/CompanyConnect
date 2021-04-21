<template>
<div>
        <div class="flex container">
        <h1 class="mt-10 self-center">Employees</h1>
        </div>
        <table>
            <tr>
                <th>Edit</th>
                <th>Company</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
            <tr v-for="(employee, index) in employees" :key="index">
                <td>+</td>
                <td>{{employee.Company}}</td>
                <td>{{employee.FirstName}}</td>
                <td>{{employee.LastName}}</td>
                <td>{{employee.Email}}</td>
                <td>{{employee.Phone}}</td>
            </tr>
        </table>
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
        <div>
        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
            <a  href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50" 
            v-for="(link, index) in pageInfo.links" :key="index" v-on:click="getPage(link.label)">
                {{link.label}}
            </a>
        </nav>
        </div>
        <div>
            <p class="text-sm text-gray-700">
                Showing
                <span class="font-medium">{{pageInfo.current_page}}</span>
                to
                <span class="font-medium">{{pageInfo.per_page}}</span>
                of
                <span class="font-medium">{{pageInfo.last_page}}</span>
                results
            </p>
        </div>
    </div>
</div>
</template>
<script>
export default {
    components: {

    },
    data() {
        return {
            employees: [],
            pageInfo: {}
        }
    },
    methods: {
        getPage(page){
            axios.get('api/employee?page=' + page).then((response) =>{
                console.log('getPage', response.data);
                this.pageInfo = response.data;
                this.employees = response.data.data
            }).catch((error) => {
                console.log('Error', error);
            })
        },
        getCompanyName(id){
            axios.get('api/company/' + id).then((response) => {
                console.log('response', response.data.Name);
                return response.data.Name;
            }).catch((error) => {
                console.log('Error', error);
            })
        }
    },
    created(){
        this.getPage(1);
    }
}
</script>
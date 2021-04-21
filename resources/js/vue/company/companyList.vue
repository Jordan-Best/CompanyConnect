<template>
    <div>
        <div class="flex container">
        <h1 class="mt-10 self-center">Companies</h1>
        </div>
        <table>
            <tr>
                <th>Edit</th>
                <th>Name</th>
                <th>Email</th>
                <th>Website</th>
                <th>Logo</th>
            </tr>
            <tr v-for="(company, index) in companies" :key="index">
                <td>
                    <button v-on:click="editCompany(company.id)">+</button>
                </td>
                <td>{{company.Name}}</td>
                <td>{{company.Email}}</td>
                <td>{{company.Website}}</td>
                <td>{{company.Logo}}</td>
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
import company from './company.vue'
export default {
    components: {
        company: company
    },
  data(){
      return {
    companies: [],
    pageInfo: {},
    showModal: false
      }
  },
  methods: {
    getCompanies() {
      axios.get("api/company").then((response) => {
          console.log('response', response.data);
          this.pageInfo = response.data;
        this.companies = response.data.data;
      }).catch((error) => {
          console.log('Error', error);
      });
    },
    getPage(page){
        axios.get('api/company?page=' + page).then((response) =>{
            console.log('getPage', response.data);
            this.pageInfo = response.data;
            this.companies = response.data.data
        }).catch((error) => {
            console.log('Error', error);
        })
    },
    editCompany(id){
        console.log('id', id);
        this.$router.push({ name: 'EditCompany', params: { id } })
    }
  },
  computed: {

  },
    created(){
    this.getPage(1);
    }
};
</script>
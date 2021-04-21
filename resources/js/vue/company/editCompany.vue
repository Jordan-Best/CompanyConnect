<template>
    <div>
        <div class="my-5 max-w-s mx-52" >
            <label class="w-1/3">Name:</label>
            <input class="bg-gray-100" type="text" v-model="company.Name"/>
        </div>
        <div class="my-5 max-w-s mx-52" >
            <label class="w-1/3">Email:</label>
            <input class="bg-gray-100" type="text" v-model="company.Email"/>
        </div>
        <div class="my-5 max-w-s mx-52" >
            <label class="w-1/3">Website:</label>
            <input class="bg-gray-100" type="text" v-model="company.Website"/>
        </div>
        <div class="my-5 max-w-s mx-52" >
            <label class="w-1/3">Logo:</label>
            <input class="bg-gray-100" type="text" v-model="company.Logo"/>
        </div>
        <div class="my-5 max-w-s mx-52" >
            <button class="border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50" v-on:click="saveCompany">Save</button>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            companyId: null,
            company: {}
        }
    },
    methods:{
        getCompany(id){
            console.log('getCompanyByid', id);
            axios.get('api/company/'+ id).then((response) =>{
                this.company = response.data;
            }).catch((error) => {
                console.log('Error', error);
            })
        },
        saveCompany(){
            console.log("Company", this.company)
        }
    },
    created(){
        console.log('params', this.$route.params);
        this.getCompany(this.$route.params.id);
    }
}
</script>
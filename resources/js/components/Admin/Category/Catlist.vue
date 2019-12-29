<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h3>Category List</h3>
                        </div>
                        <div class="card-tools">
                            <button class="btn btn-primary">
                                <router-link to="/addCategory" style="color: white; text-decoration: none">Add Category</router-link>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Category Name</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(category,index) in getallCategory" :key="category.id">
                                <td>{{index+1}}</td>
                                <td>{{category.cat_name}}</td>
                                <td>{{category.created_at | timeformate}}</td>
                                <td>
                                    <router-link :to="`/editCategory/${category.id}`">Edit</router-link>
                                    <a href="" @click.prevent="deleteCategory(category.id)">Delete</a>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Catlist",

        mounted(){
            this.$store.dispatch("allCategory")
        },
        computed:{
            getallCategory(){
               return  this.$store.getters.getCategeory
            }
        },
        methods:{
            deleteCategory(id){
                axios.get("/category/" + id)
                    .then(()=>{
                        this.$store.dispatch("allCategory")
                        Toast.fire({
                            icon: 'success',
                            title: 'Category delted successfully'
                        })
                    })
            }
        }
    }
</script>

<style scoped>

</style>

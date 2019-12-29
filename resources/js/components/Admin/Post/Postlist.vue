<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h3>Post List</h3>
                        </div>
                        <div class="card-tools">
                            <button class="btn btn-primary">
                                <router-link to="/addPost" style="color: white; text-decoration: none">Add Post</router-link>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>SL</th>
<!--                                <th>Username</th>-->
                                <th>Name</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Photo</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(post,index) in getallPost" :key="post.id">
                                <td>{{index+1}}</td>
<!--                                <td>{{post.name}}</td>-->
                                <td v-if="post.user">{{post.user.name}}</td>
                                <td>{{post.title| sortlength(20,"---")}}</td>
                                <td>{{post.description | sortlength(20,"....")}}</td>
                                <td><img :src="post.photo" alt="" width="40" height="50"></td>
                                <td>{{post.created_at | timeformate}}</td>
                                <td>
                                    <router-link :to="`/editPost/${post.id}`">Edit</router-link>
                                    <a href="" @click.prevent="deletePost(post.id)">Delete</a>
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
        name: "Postlist",

        mounted(){
            this.$store.dispatch("allPost")
        },
        computed:{
            getallPost(){
               return  this.$store.getters.getPost
            }
        },
        methods:{
            deletePost(id){
                axios.get("/post/" + id)
                    .then(()=>{
                        this.$store.dispatch("allPost")
                        Toast.fire({
                            icon: 'success',
                            title: 'Post delted successfully'
                        })
                    })
            }
        }
    }
</script>

<style scoped>

</style>

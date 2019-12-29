<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" style="background: #00f169">
                        <div class="card-title" >
                            <h3>Edit Post</h3>
                        </div>
                    </div>
                    <form role="form" @submit.prevent="updatePost()">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Edit Post</label>
                                <input type="text" v-model="form.name" name="name" class="form-control" :class="{ 'is-invalid': form.errors.has('cat_name') }">

                                <has-error :form="form" field="name"></has-error>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button
                                type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Postedit",
        mounted(){
            axios.get(`/editPost/${this.$route.params.postid}`)
                .then((response)=>{
                    this.form.fill(response.data.post)
                })
        },
        data(){
            return{
                form: new Form({
                    name:"",

                })
            }

        },
        methods:{
            updatePost(){
                this.form.post(`/updatePost/${this.$route.params.postid}`)
                    .then((response)=>{
                        this.$router.push('/post')

                        Toast.fire({
                            icon: 'success',
                            title: 'Post updated successfully'
                        })
                    })

            }

        }
    }
</script>

<style scoped>

</style>

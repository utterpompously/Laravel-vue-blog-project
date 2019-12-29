<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" style="background: #00f169">
                        <div class="card-title" >
                            <h3>Add New Post</h3>
                        </div>
                    </div>

                    <form role="form" @click.prevent="addPost()">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Add New Post</label>
                                <input type="text" v-model="form.cat_name" name="cat_name" class="form-control" :class="{ 'is-invalid': form.errors.has('cat_name') }" placeholder="Add New Category">

                                <has-error :form="form" field="cat_name"></has-error>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button
                               type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                    <div class="preview">
                        <p>title:{{form.cat_name}} </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "Postadd",
        data(){
            return{
                form: new Form({
                    cat_name:""
                })
            }

        },
        methods:{
            addPost(){
                this.form.post('/addPost')
                    .then((response)=>{
                        this.$router.push('/post')

                        Toast.fire({
                            icon: 'success',
                            title: 'Post added successfully'
                        })
                    })



            }

        }
    }
</script>

<style scoped>

</style>

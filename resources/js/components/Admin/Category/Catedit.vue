<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" style="background: #00f169">
                        <div class="card-title" >
                            <h3>Edit Category</h3>
                        </div>
                    </div>
                    <form role="form" @submit.prevent="updateCategory()">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Edit Category</label>
                                <input type="text" v-model="form.cat_name" name="cat_name" class="form-control" :class="{ 'is-invalid': form.errors.has('cat_name') }">

                                <has-error :form="form" field="cat_name"></has-error>
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
        name: "Catedit",
        mounted(){
            axios.get(`/editCategory/${this.$route.params.categoryid}`)
                .then((response)=>{
                    this.form.fill(response.data.category)
                })
        },
        data(){
            return{
                form: new Form({
                    cat_name:""
                })
            }

        },
        methods:{
            updateCategory(){
                this.form.post(`/updateCategory/${this.$route.params.categoryid}`)
                    .then((response)=>{
                        this.$router.push('/category')

                        Toast.fire({
                            icon: 'success',
                            title: 'Category updated successfully'
                        })
                    })



            }

        }
    }
</script>

<style scoped>

</style>

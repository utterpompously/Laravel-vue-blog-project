<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" style="background: #00f169">
                        <div class="card-title" >
                            <h3>Add New Category</h3>
                        </div>
                    </div>

                    <form role="form" @click.prevent="addCategory()">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Add New Category</label>
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
        name: "Catadd",
        data(){
            return{
                form: new Form({
                    cat_name:""
                })
            }

        },
        methods:{
            addCategory(){
                this.form.post('/addCategory')
                    .then((response)=>{
                        this.$router.push('/category')

                        Toast.fire({
                            icon: 'success',
                            title: 'Category added successfully'
                        })
                    })



            }
            // post:function(){
            //     this.$http.post('add-category',{
            //         title:this.cat_name
            //     }).then(function(data){
            //         console.log(data);
            // });
            //}
        }
    }
</script>

<style scoped>

</style>

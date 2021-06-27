<template>
     <div class="main-content-wrap sidenav-open d-flex flex-column">
    <div class="main-content">
                <div class="breadcrumb">
                    <h1>Product</h1>
                    <ul>
                       
                <li><router-link to="/dashboard/home">Home </router-link></li>
                        <li>Edit Product </li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
             
            
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <h4> Edit Product Page </h4>
                        <p> </p>
                        <div class="card mb-5">
                            <div class="card-body">
                                
                                <div class="d-flex flex-column">
                                    <form  >
                                    <div class="form-group">
                                        <label for=""> Name </label>
                                        <input class="form-control" :class="{'is-danger':errors.name}" required v-model="inputdata.name" type="text" placeholder="Enter product name" />
                                        <small v-if="errors.name" class="has-text-danger">{{ errors.name[0] }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label for=""> Description </label>
                                        <input class="form-control" :class="{'is-danger': errors.description}" required v-model="inputdata.description" type="text" placeholder="Enter description" />
                                        <small v-if="errors.description" class="has-text-danger">{{ errors.description[0] }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label for=""> Price </label>
                                        <input class="form-control" :class="{'is-danger': errors.price}" required v-model="inputdata.price" type="number" placeholder="Enter price" />
                                        <small v-if="errors.price" class="has-text-danger">{{ errors.price[0] }}</small>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for=""> image upload</label>
                                        <input class="form-control" :class="{'is-danger': errors.image}" required @change="uploadFile" type="file"  />
                                        <small v-if="errors.image" class="has-text-danger">{{ errors.image[0] }}</small>
                                    </div> -->
                                  
                                    <button type="submit" @click.prevent="submitForm" class="btn btn-primary pd-x-20"> Submit </button>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>

              
    </div>
    </div>
</template>

<script>
    export default {
        data(){
           return{
             attachment : '',
             
             form : new FormData,
            inputdata:{
                name : '',
                description : ' ',
                price : ' ',
            },
            errors: {},
           }

        },
        methods:{
            uploadFile(e){
                let selectedFile = e.target.files[0];
                this.attachment = selectedFile
            }, 
            
            submitForm(){
        
                //  const config = { headers: {'Content-Type' : 'multipart/form-data'}};
                
                   axios.put(`/api/product/update/${this.inputdata.id}`, this.inputdata )
                 .then(response =>{
                     console.log( response )
                     if(this.$store.state.user.user_type == 'admin'){
                         this.$router.replace('/dashboard/all-products');
                     }else{
                         this.$router.replace('/dashboard/my-products');
                     }
                    
                 })
                 .catch(error => {
                    //  this.errors = error.response.data.errors
                 })
            },
            getProduct(){
                axios.get(`/api/product/show/${this.$route.params.product_id}`)
                .then(response => {
                     this.inputdata = response.data.data
                })
                .catch( error => {
                    console.log( error)
                });
            },

        },

        mounted() {
            this.getProduct();
        }
    }
</script>

<style scoped>
    .has-text-danger{
        color: red;
    }
    .is-danger{
        border: 2px solid red;
        border-radius: 4px;
    }
    
</style>
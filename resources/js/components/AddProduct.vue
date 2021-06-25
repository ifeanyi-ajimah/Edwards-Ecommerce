<template>
     <div class="main-content-wrap sidenav-open d-flex flex-column">
    <div class="main-content">
                <div class="breadcrumb">
                    <h1>Product</h1>
                    <ul>
                       <li><router-link to="/dashboard/home">Home </router-link></li>
                        <li>Add Product </li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
             
            
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <h4> Add Product Page </h4>
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
                                    <div class="form-group">
                                        <label for=""> image upload</label>
                                        <input class="form-control" :class="{'is-danger': errors.image}" required @change="uploadFile" type="file"  />
                                        <small v-if="errors.image" class="has-text-danger">{{ errors.image[0] }}</small>
                                    </div>
                                  
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
                 this.form.append('image', this.attachment);
                 this.form.append('name', this.inputdata.name)
                 this.form.append('description', this.inputdata.description)
                 this.form.append('price', this.inputdata.price)

                 const config = { headers: {'Content-Type' : 'multipart/form-data'}};
                 axios.post('/api/product/store', this.form, config )
                 .then(response =>{
                     console.log( response.data )
                     this.inputdata.name = " ";
                     this.inputdata.description = " ";
                     this.inputdata.price = " ";
                     this.attachment = ""
                     this.errors = ""
                     alert("Submited");
                 })
                 .catch(error => {
                     this.errors = error.response.data.errors
                 })
            },

        },

        mounted() {
            
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
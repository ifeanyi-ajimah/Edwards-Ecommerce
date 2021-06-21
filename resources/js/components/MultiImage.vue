<template>
     <div class="main-content-wrap sidenav-open d-flex flex-column">
    <div class="main-content">
                <div class="breadcrumb">
                    <h1>Layouts</h1>
                    <ul>
                        <li><a href="href">Forms</a></li>
                        <li>Form Layouts</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
             
            
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <h4> Region Form . test single and multi image upload. </h4>
                        <p> </p>
                        <div class="card mb-5">
                            <div class="card-body">
                                
                                <div class="d-flex flex-column">
                                    <form  >
                                    <div class="form-group">
                                        <label for=""> Name </label>
                                        <input class="form-control" :class="{'is-danger':errors.name}" required v-model="inputdata.name" type="text" placeholder="Enter region name" />
                                        <small v-if="errors.name" class="has-text-danger">{{ errors.name[0] }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label for=""> Description </label>
                                        <input class="form-control" :class="{'is-danger': errors.description}" required v-model="inputdata.description" type="text" placeholder="Enter description" />
                                        <small v-if="errors.description" class="has-text-danger">{{ errors.description[0] }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label for=""> single file upload</label>
                                        <input class="form-control" :class="{'is-danger': errors.image}" required @change="singleFile" type="file"  />
                                        <small v-if="errors.image" class="has-text-danger">{{ errors.image[0] }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label for=""> multiple file upload</label>
                                        <input class="form-control" required @change="multipleFiles" multiple type="file"  />
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
             multiAttachment: [],
             form : new FormData,
            inputdata:{
                name : '',
                description : ' ',
            },
            errors: {},

           }

        },
        methods:{
            singleFile(e){
                let selectedFile = e.target.files[0];
                this.attachment = selectedFile
            }, 
            multipleFiles(e){
                let multiFile = e.target.files;
                if( !multiFile.length){
                    return false;
                }
                for( let i = 0; i< multiFile.length; i ++  ){
                    this.multiAttachment.push( multiFile[i]);
                }
                console.log( this.multiAttachment);

            },
            submitForm(){
                 this.form.append('image', this.attachment);

                 for( let i = 0; i< this.multiAttachment.length; i++){
                    this.form.append('images[]', this.multiAttachment[i]);
                 }
                 this.form.append('name', this.inputdata.name)
                 this.form.append('description', this.inputdata.description)

                 const config = { headers: {'Content-Type' : 'multipart/form-data'}};
                 axios.post('/api/user/region', this.form, config )
                 .then(response =>{
                     console.log( response.data )
                     this.inputdata = ' '
                     this.attachment = ' '
                     this.multiAttachment = ''
                     this.errors = ' '
                     alert( " Submited");
            
                 })
                 .catch(error => {
                     this.errors = error.response.data.errors
                 })
            },

        },

        mounted() {
            console.log('Component mounted.')
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
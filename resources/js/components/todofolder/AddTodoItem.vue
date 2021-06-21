<template>
     <div class="">
    <div class="">
               
                <!-- <div class="separator-breadcrumb border-top"></div> -->
             
            
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <!-- <h4> Region Form . test single and multi image upload. </h4> -->
                        <p> </p>
                        <div class="card mb-5">
                            <div class="card-body">
                                
                                <div class="d-flex flex-column">
                                    <form  >
                                    <div class="form-group d-flex justify-content-start ">
                                        
                                        <input class="form-control" :class="{'is-danger':error.name}" v-model="item.name"   type="text" placeholder="Enter item" />
                                        <small v-if="error.name" class="has-text-danger">{{ error.name[0] }}</small>
                                        
                                        <button class="btn  pd-x-20 ml-1" @click.prevent="addItem" :class="[ item.name != 0  ? 'btn-primary' : 'inactive']" > <i class="nav-icon i-Add-Window"></i> </button>
                                        
                                    </div>
                                  
                                    <!-- <button type="submit"  class="btn btn-primary pd-x-20"> Submit </button> -->
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
             item:{
                 name : " "
             },
             error : { },
           }

        },
        methods:{
            addItem(){
                axios.post('/api/todo/store', this.item)
                .then( response => {
                    if( response.status == 200 ){
                        
                        this.item.name = ' '
                        this.error = ''
                        this.$emit('item-added');
                    }
                })
                .catch( error => {
                    this.error = error.response.data.errors
                });
            }

        },

        mounted() {
            
        }
    }
</script>

<style scoped >
    .plus{
        font-size: 20px;
        font-weight: bold;
    }
    .active{
        color: #00CE25;
    }
    .inactive{
        color: #999999;
    }
    .has-text-danger{
        color: red;
    }
    .is-danger{
        border: 2px solid red;
        border-radius: 4px;
    }
</style>

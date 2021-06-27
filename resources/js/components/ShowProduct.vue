<template>
     <div class="main-content-wrap sidenav-open d-flex flex-column">
    <div class="main-content">
                <div class="breadcrumb">
                    <h1> <router-link to="/admin/home" > Home </router-link> </h1>
                    <ul>
                        <li><router-link to="/admin/todo" >Product  </router-link></li>
                        <li> Show  </li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
             
            
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <h4> Detail of product : {{product.name}}  </h4>
                        <p> </p>
                        <div class="card mb-5">
                            <div class="card-body">

                                <ul class="list-group list-group-flush">
                                <li class="list-group-item" > <img class="img-circle" :src="product.image" width="300px"  alt=""> </li>
                                <li class="list-group-item"> Name : {{product.name}}</li>
                                <li class="list-group-item"> Detail : {{product.description}}</li>
                                <li class="list-group-item"> Vendor : {{product.user.name}}</li>
                                <li class="list-group-item"> Price : {{product.price}}</li>
                                <li class="list-group-item"> Status : {{ product.status ? 'Active' : 'Not Active'}}</li>
                                <li class="list-group-item"> Created at : {{ product.created_at ? product.created_at : null }}</li>
                                <li class="list-group-item"> Updated at :  {{ product.updated_at ? product.updated_at : null }} </li>
                                <li class="list-group-item"> <a @click.prevent="goBack" class="badge badge-primary text-white">  Return Back  </a> </li>
                                </ul>
        
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
            product : {}
           }

        },
        methods:{
            getProduct(){
                axios.get(`/api/product/show/${this.$route.params.product_id}`)
                .then(response => {
                    
                    // console.log(response.data.data )
                     this.product = response.data.data
                })
                .catch( error => {
                    console.log( error)
                });
            },
            goBack(){
                 if(this.$store.state.user.user_type == 'admin'){
                         this.$router.replace('/dashboard/all-products');
                     }else{
                         this.$router.replace('/dashboard/my-products');
                     }
            }
        
        },

        mounted() {
            this.getProduct();
        }
    }
</script>

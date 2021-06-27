<template>
     <div class="main-content-wrap sidenav-open d-flex flex-column">
    <div class="main-content">
                <div class="breadcrumb">
                    <h1> All Products</h1>
                    <ul>
                       
                    <li><router-link to="/dashboard/home">Home </router-link></li>
                        <li>View Product </li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>

                <div class="row justify-content-center mt-12">
                    <div class="col-md-8">
                        <!-- <h4> Region Form . test single and multi image upload. </h4> -->
                        <p> </p>
                        <div class="card mb-5">
                            
                            <div class="card-body">
                                <input class=" ml-8 mb-4" placeholder="Searching" v-model="searchquery" type="text">
                               <ul class="list-group">

                                <li v-for="(item, index) in pageOfItems" :key="index"  class="list-group-item d-flex justify-content-between align-items-center" >
                                
                                     <div>
                                         <span> <img class="img-circle" :src="item.image" width="45px" height="45px" alt=""></span>
                                         <span> {{item.name }} </span>
                                     </div>
                                     <div>
                                         
                                     <span   class="showFile "> <router-link :to="`/dashboard/product/${item.id}`"> <i  class="nav-icon i-Magnifi-Glass-"></i> </router-link>  </span>
                                     <span   class="editFile "> <router-link :to="`/dashboard/edit/product/${item.id}`"> <i class="nav-icon i-Edit"></i> </router-link>  </span>
                                    <span  @click="deleteItem(index,item.id)" class="deletefile "> <i class="nav-icon i-Delete-File"></i>  </span>
                                     </div>
                                </li>
                                
                                </ul>
                                
                            </div>

                            <div class="card-footer pb-0 pt-3">
                                <jw-pagination :pageSize=5 :items="products" @changePage="onChangePage"></jw-pagination>
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
              products:{},
              pageOfItems: [],
              searchquery: '',
           }

        },
        computed:{
           
               }, 

        methods:{
              onChangePage(pageOfItems) {
                this.pageOfItems = pageOfItems;
            },

            deleteItem(index, id){
                let willdelete = confirm("Want to delete?");
                if (willdelete) {
                axios.delete('/api/product/delete/' + id )
                .then(response => {
                    if(response.status == 200){
                        this.getProducts();
                          this.products.splice(index,1);
                    }
                })
                .catch(error => {
                    console.log(error)
                })

                }

            },
            searchQuery1(value){
                axios.get(`/api/product/search/${value}`)
                .then(response => {
                    console.log( response.data.data.length )
                    
                        if( response.data.data.length > 0 ){
                            this.products = response.data.data
                        }else{
                            this.getProducts();
                        }
                })
                .catch(error =>{

                })
             },

             getProducts(){
               axios.get('/api/product/products')
               .then(response => {
                    // console.log(response.data.data)
                   this.products = response.data.data
               })
               .catch(error => {
                   console.log(error)
               })
           },
        
        },
        watch:{
            searchquery(){
                if(this.searchquery.length > 0){
                    
                     this.searchQuery1(this.searchquery);
                }else{
                    this.getProducts();
                }
            }, 
        },

        mounted() {
        this.getProducts();
        }
    }
</script>
<style scoped>

.deletefile{
    font-weight: bold;
    font-size: 20px;
    color: red;
}
.showFile{
    font-weight: bold;
    font-size: 20px;
    color: green;
}
.editFile{
    font-weight: bold;
    font-size: 20px;
    color: blue;
}
    
</style>
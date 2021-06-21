<template>
     <div class="">
    <div class="">
            
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <!-- <h4> Region Form . test single and multi image upload. </h4> -->
                        <p> </p>
                        <div class="card mb-5">
                            
                            <div class="card-body">
                                <input class=" ml-8 mb-4" placeholder="Searching" v-model="searchquery" type="text">
                               <ul class="list-group">

                                <li v-for="(item, index) in pageOfItems" :key="index"  class="list-group-item d-flex justify-content-between align-items-center" >
                                    <input type="checkbox" @change="updateCheck(item)" v-model="item.completed" >
                                    <span :class="[ item.completed ? 'completed' : '', 'itemText'  ]" > {{item.name }} </span>
                                     <span   class="showFile "> <router-link :to="`/admin/todo/${item.id}`"> <i  class="nav-icon i-Magnifi-Glass-"></i> </router-link>  </span>
                                     <span   class="editFile "> <router-link :to="`/admin/edit/todo/${item.id}`"> <i class="nav-icon i-Edit"></i> </router-link>  </span>
                                    <span  @click="deleteItem(item.id)" class="deletefile "> <i class="nav-icon i-Delete-File"></i>  </span>
                                </li>
                                
                                </ul>
                                
                            </div>

                            <div class="card-footer pb-0 pt-3">
                                <jw-pagination :pageSize=5 :items="theItems" @changePage="onChangePage"></jw-pagination>
                            </div>
                        </div>
                    </div>
                </div>

              
    </div>
    </div>
</template>

<script>


    export default {
         props : ['items'],
        components:{
            
        },
        data(){
           return{
              pageOfItems: [],
              searchquery: '',
           }

        },
        computed:{
            // theItems :{
            //      get: function () {
            //         return this.items
            //     },
            // },
             theItems: function () {
                return this.items
                }
        }, 

        methods:{
              onChangePage(pageOfItems) {
                this.pageOfItems = pageOfItems;
            },

            updateCheck(item){
                let yee = item
                axios.put('/api/todo/update/' + item.id , item )
                .then(response => {
                    if( response.status == 200 ){
                        console.log(yee )
                         console.log(response.data )
                         this.$emit('item-changed');
                    }
                })
                .catch(error =>{

                })
            },
          
            deleteItem(id){
                axios.delete('/api/todo/delete/' + id )
                .then(response => {
                    if(response.status == 200){
                        this.$emit('item-changed');
                    }
                })
                .catch(error => {
                    console.log(error)
                })
            },
            searchQuery1(value){
                // console.log(  value )

                axios.get(`/api/todo/search/${value}`)
                .then(response => {
                    console.log( response.data.response.data.length )

                    // if(response.status == 200){
                        if( response.data.response.data.length > 0 ){
                            this.items = response.data.response.data
                        }else{
                            this.theItems = this.items
                        }
                        
                    // }
                 
                })
                .catch(error =>{

                })

             }

        },
        watch:{

            searchquery(){
                
                if(this.searchquery.length > 0){
                     this.searchQuery1(this.searchquery);
                }else{
                    this.theItems = this.items
                }
            }, 

           
        },

        mounted() {
        
        }
    }
</script>
<style scoped>
.completed{
    text-decoration: line-through;
    color: #999999
}
.itemText{
    width: 100%;
    margin-left: 20px;
    font-weight: bold;
    font-size: 20px;
}
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
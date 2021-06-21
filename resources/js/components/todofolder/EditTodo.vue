<template>
     <div class="main-content-wrap sidenav-open d-flex flex-column">
    <div class="main-content">
                <div class="breadcrumb">
                    <h1> <router-link to="/admin/home" > Home </router-link> </h1>
                    <ul>
                         <li><router-link to="/admin/todo" >TODOS </router-link></li>
                        <li> Edit  </li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
             
            
                <div class="row">
                    <div class="col-md-6">
                        
                        <p> </p>
                        <div class="card mb-5">
                            <div class="card-body">
                                
                                <div class="d-flex flex-column">
                                    <form  >
                                    <div class="form-group">
                                        <label for=""> Name </label>
                                        <input class="form-control"  type="text" v-model="todo.name" />
                                    </div>
                 
                                    <button type="submit" @click.prevent="updateTodo"  class="btn btn-primary pd-x-20"> Submit </button>
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
             todo: {}

           }

        },
        methods:{
               getTodoItem(){
                axios.get(`/api/todo/show/${this.$route.params.todo_id}`)
                .then(response => {
                    
                    // console.log(response.data.response.todo )
                     this.todo = response.data.response.todo
                })
                .catch( error => {
                    console.log( error)
                });
            },
            updateTodo(){
                axios.put(`/api/todo/edit/${this.todo.id}`, {name: this.todo.name } )
                .then(response => {
                    if(response.status == 200){
                          console.log( response )
                        //   alert("Done");
                          setTimeout(()=> { 
                              
                              this.$router.push('/admin/todo');
                               }, 1000);
                          
                    }
                  
                })
                .catch(error => {

                })
            }
            

        },

        mounted() {
            this.getTodoItem();
        }
    }
</script>

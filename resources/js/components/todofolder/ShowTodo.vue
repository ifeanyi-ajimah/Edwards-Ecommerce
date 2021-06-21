<template>
     <div class="main-content-wrap sidenav-open d-flex flex-column">
    <div class="main-content">
                <div class="breadcrumb">
                    <h1> <router-link to="/admin/home" > Home </router-link> </h1>
                    <ul>
                        <li><router-link to="/admin/todo" >TODOS </router-link></li>
                        <li> Show  </li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
             
            
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <h4> Detail of this todo : {{todo.name}}  </h4>
                        <p> </p>
                        <div class="card mb-5">
                            <div class="card-body">

                                <ul class="list-group list-group-flush">
                                <li class="list-group-item"> Name : {{todo.name}}</li>
                                <li class="list-group-item"> Completed : {{ todo.completed ? 'Completed' : 'Not Done'}}</li>
                                <li class="list-group-item"> Completed at : {{ todo.completed_at ? todo.completed_at : null }}</li>
                                <li class="list-group-item"> Updated at :  {{ todo.updated_at ? todo.updated_at : null }} </li>
                                <li class="list-group-item"> <router-link to="/admin/todo"> <span  class="badge badge-primary"> Return Back</span> </router-link> </li>
                                </ul>
                             <!--                                 
                                <div class="d-flex flex-column">
                                    <form  >
                                    <div class="form-group">
                                        <label for=""> Name </label>
                                        <input class="form-control"  type="text" placeholder="Enter region name" />
                                    </div>
                                    <div class="form-group">
                                        <label for=""> Description </label>
                                        <input class="form-control"  type="text" placeholder="Enter description" />
                                    </div>
                                    
                                    <button type="submit"  class="btn btn-primary pd-x-20"> Submit </button>
                                    </form>
                                </div> -->
                                
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
            todo : {}
           }

        },
        methods:{
            getTodoItem(){
                axios.get(`/api/todo/show/${this.$route.params.todo_id}`)
                .then(response => {
                    
                    console.log(response.data.response.todo )
                     this.todo = response.data.response.todo
                })
                .catch( error => {
                    console.log( error)
                });
            }
            

        },

        mounted() {
            this.getTodoItem();
        }
    }
</script>

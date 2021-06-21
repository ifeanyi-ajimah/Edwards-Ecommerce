<template>
    <div>
        <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
        </nav>
    </div>
</template>

<script>
    export default {
        data(){
           return{
             todoArray : { }
           }
        },
        methods:{
            getTodoList(){
               axios.get('/api/todo/items')
               .then(response => {
                    console.log(response.data.response.todos)
                   this.todoArray = response.data.response.todos.data
               })
               .catch(error => {
                   console.log(error)
               })
           },

        },
        computed:{
            currentPage:{
                get(){
                    return  this.todoArray.current_page 
                }
            },
            lastPage:{
                get(){
                    return this.todoArray.last_page
                }
            }
        },

        created() {
            this.getTodoList();
        
        }
    }
</script>

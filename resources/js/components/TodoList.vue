<template>
     <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="main-content ">
                    <div class="breadcrumb">
                            <h1> <router-link to="/admin/home" > Home </router-link> </h1>
                        <ul>
                            <li><a href="#">Todo List</a></li>
                            <li> Todo list</li>
                        </ul>
                    </div>
                    <div class="separator-breadcrumb border-top"></div>
                
                    <add-todo-item  @item-added="reloadList" > </add-todo-item>

                    <list-view :items="todos"  @item-changed="reloadList"> </list-view>
        </div>
    </div>
</template>

<script>

import addTodoItem from './todofolder/AddTodoItem.vue'
import listView from './todofolder/ListView.vue'
    export default {
        components :{
            addTodoItem,
            listView
        }, 

        data(){

           return {
               todos : [],
            }

        },
        methods:{
           getTodoList(){
               axios.get('/api/todo/items')
               .then(response => {
                    console.log(response.data.response.todos)
                   this.todos = response.data.response.todos
               })
               .catch(error => {
                   console.log(error)
               })
           },
           reloadList(){
               this.getTodoList();
               console.log("done")
           }

        },

        created() {
            this.getTodoList();
        }
    }
</script>

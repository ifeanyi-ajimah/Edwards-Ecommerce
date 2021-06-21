import Adminhome from './components/AdminHome.vue'
import External from './external/External.vue'
import Adminhomemain from './components/AdminHomeMain.vue'
import Todo from './components/TodoList.vue'
import ShowTodo from './components/todofolder/ShowTodo.vue'
import EditTodo from './components/todofolder/EditTodo.vue'
import MultiImage from './components/MultiImage.vue'
import Login from './external/Login.vue'
import Register from './external/Register.vue'
import FatherComponent from './components/slots/FatherComponent.vue'
import WatcherComponent from './components/watcher/Watch.vue'

import Shop from './external/ShopHome.vue'



export const routes = [
    
    {
    path: '/',   component: External,
    children:[
        {path: '', name : 'home', component: Login },
        {path: 'login', name: 'login', component: Login},
        {path: 'admin', name: 'adminlogin', component: Login},
        {path: 'register', name: 'register', component: Register},
        {path: 'shophome', name: 'shophome', component: Shop},
    ]
    },

    {
        path: '/admin', name: 'admin', component : Adminhome,
        meta:{
            requiresAuth: true
        },
        children:[
            //  {path: '/', name : 'adminlogin', component: Login },
            {path: 'home', name: 'adminhome', component: Adminhomemain},
            {path: 'multiimage', name: 'admin.multiimage', component: MultiImage},
            {path: 'todo', name: 'todo', component: Todo},
            {path: 'todo/:todo_id', component: ShowTodo },
            {path: 'edit/todo/:todo_id', component: EditTodo },
            {path: 'father-slot', name:'father.slot', component: FatherComponent },
            {path: 'watcher', name:'watcher', component: WatcherComponent }

        ],
       
    }
   

];





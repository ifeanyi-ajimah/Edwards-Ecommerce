/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import {routes} from './routes'
import VueRouter from 'vue-router'
// import Vuex from 'vuex'
import store from './store'



import Axios from 'axios'
Vue.prototype.$http = Axios;
const token = localStorage.getItem('access_token')
if (token) {
  Vue.prototype.$http.defaults.headers.common['Authorization'] = token
}


import JwPagination from 'jw-vue-pagination';
Vue.component('jw-pagination', JwPagination);

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);



Vue.use(VueRouter);




const router  = new VueRouter({
    mode:'history',
    routes,
});

// router.beforeEach((to, from, next) => {
//     const requiresAuth = to.matched.some(record => record.meta.requiresAuth);
//     const currentUser = store.state.status;
//       alert(store.state.status)
//     //  console.log(store.state.test.place)
//     //  console.log(store.state.user.name)
     
//     if(requiresAuth && !currentUser){
//         alert("not logged in")
//         next('/login');
//     }else if(to.path == '/login' && currentUser){
//         // alert(currentUser)
//         // alert(store.state.test.word)
//         console.log(store.state.user)
//         next('/admin/home');
//     }else{
//         next();
//     }
// });

router.beforeEach((to, from, next) => {
    if(to.matched.some(record => record.meta.requiresAuth)) {
      if (store.getters.isLoggedIn) {
          // alert( store.getters.isLoggedIn);
        next()
        return
      }
      // alert( "nahh");
      next('/login')
    } else {
      next()
    }
  })

// initialize(store, router);
const app = new Vue({
    el: '#app',
    router,
    store
});
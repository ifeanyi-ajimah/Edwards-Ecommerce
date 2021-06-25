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

Vue.use(VueRouter);

const router  = new VueRouter({
    mode:'history',
    routes,
});


router.beforeEach((to, from, next) => {
    if(to.matched.some(record => record.meta.requiresAuth)) {
      if (store.getters.isLoggedIn) {
          
        next()
        return
      }
      
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
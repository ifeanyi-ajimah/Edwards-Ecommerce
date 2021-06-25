import axios from "axios";

import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

let cartFromLocalStorage = JSON.parse(window.localStorage.getItem('cart')) ;

const store = new Vuex.Store({
    state:{
           cart: cartFromLocalStorage ? cartFromLocalStorage : [] ,
           //sigin
            status: '',
            loginError : '',
            token: localStorage.getItem('access_token') || '',
            user : {},
            currentUser: {},
            },

            getters : {
                // isLoggedIn: state => 1 , //!!state.token,
                isLoggedIn: state => {
                    return state.token ? 1 : 0
                  },
                authStatus: state => state.status,

                cartTotal: (state) => {
                  let sum = 0 ;
                  state.cart.forEach( (item) =>{
                   sum += ( item.price * item.productQty)
                  });
                  return sum;
                }, 
            
                },

            mutations:{
               
                auth_request(state){
                    state.status = 'loading'
                  },
                auth_success(state, payload){
                    state.status = 'success'
                    state.token = payload.access_token
                    state.user = payload.user
                  },
                  auth_error(state){
                    state.status = 'error'
                  },
                  auth_error_message(state,payload){
                    state.loginError = payload
                  },
                setuser(state, payload){
                    state.user = payload
                },
                setcurrentuser(state, payload){
                    state.currentUser = payload.user
                },
                logout(state){
                    state.status = 'false'
                    state.user = ''
                    state.currentUser = ''
                    state.token = ''
                },
                //cart 
                addtocart(state, item){
                  let found = state.cart.find( product => 
                    product.id  == item.id
                  );
                  if( found ){
                    found.productQty++;
                  }else{
                  item.productQty = 1
                  state.cart.push(item);
                  }
                  this.commit('savePersistentData'); // call the savePersistentData function 
                },
                savePersistentData(state){
                  window.localStorage.setItem('cart', JSON.stringify(state.cart) );
                },
            
                removeFromCart(state, item){
                  let index = state.cart.indexOf(item);
                  state.cart.splice(index, 1);
                  this.commit('savePersistentData'); // call the savePersistentData function 
                }, 
            
        
            },
            actions : {

            login({commit}, user){
                return new Promise((resolve, reject) => {
                  commit('auth_request')
                  axios({url: '/api/user/login', data: user, method: 'POST' })
                  .then(resp => {
                      console.log( resp )
                      if( resp.data.user){
                        const token = resp.data.access_token
                        const user = resp.data.user
                        console.log( user )
                        localStorage.setItem('access_token', token)
                        axios.defaults.headers.common['Authorization'] = token
                        commit('auth_success', resp.data)
                        commit('setcurrentuser', resp.data)
                        commit('auth_error_message'," ")
                       // window.location.replace("/admin/home")
                        resolve(resp)
                      }
                   
                  })
                  .catch(error => {
                      commit('auth_error')
                      commit('auth_error_message', error.response.data.error )
                      console.log(error.response.data.error)
                      reject(error)
                    
                  })
                })
            },


            getcurrentuser({commit} ){
                axios.get('/api/user/user')
                .then(response => {
                //    alert( response )
                     commit('setuser', response.data );
                });

            },

            logout({commit}){
                return new Promise((resolve, reject) => {
                  commit('logout')
                  localStorage.removeItem('access_token')
                  localStorage.removeItem('loggedIn')
                //   window.localStorage.removeItem('access_token');
                  delete axios.defaults.headers.common['Authorization']
                  resolve()
                })
              }

            }


  })

  export default store;



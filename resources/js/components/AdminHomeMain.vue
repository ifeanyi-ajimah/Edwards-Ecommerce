<template>
       <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1 class="mr-2">Welcome  {{ name }} </h1>
                    <ul>
                        
                       <li><router-link to="/dashboard/home">Home </router-link></li>
                        <li> home </li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>

                <div v-if="$store.state.user.user_type == 'admin' " class="row mb-4">
                    <div class="col-md-3 col-lg-3">
                        <router-link to="/dashboard/all-users">
                        <div class="card mb-4 o-hidden">
                            <div class="card-body ul-card__widget-chart">
                                <div class="ul-widget__chart-info">
                                    <h5 class="heading">All Users </h5>
                                    <div class="ul-widget__chart-number">
                                        <!-- <h2 class="t-font-boldest">$1000</h2><small class="text-muted">46% compared to last year</small> -->
                                    </div>
                                </div>
                                <div id="basicArea-chart"></div>
                            </div>
                        </div>
                        </router-link>
                    </div>
                    <div class="col-md-3 col-lg-3">
                        <router-link to="/dashboard/all-products">
                        <div class="card mb-4 o-hidden">
                            <div class="card-body ul-card__widget-chart">
                                <div class="ul-widget__chart-info">
                                    <h5 class="heading">All Products </h5>
                                    <div class="ul-widget__chart-number">
                                        <!-- <h2 class="t-font-boldest">$500</h2><small class="text-muted">46% compared to last year</small> -->
                                    </div>
                                </div>
                                <div id="basicArea-chart2"></div>
                            </div>
                        </div>
                        </router-link>
                    </div>
                    <div class="col-md-3 col-lg-3">
                        <router-link to="/dashboard/all-orders">
                        <div class="card mb-4 o-hidden">
                            <div class="card-body ul-card__widget-chart">
                                <div class="ul-widget__chart-info">
                                    <h5 class="heading">All Orders </h5>
                                    <div class="ul-widget__chart-number">
                                        <!-- <h2 class="t-font-boldest"> 4,909</h2><small class="text-muted">46% compared to last year</small> -->
                                    </div>
                                </div>
                                <div id="basicArea-chart3"></div>
                            </div>
                        </div>
                        </router-link>

                    </div>
                </div> 


    
                <div v-if="$store.state.user.user_type == 'vendor' " class="row mb-4">
                    <div class="col-md-3 col-lg-3">
                        
                        <div class="card mb-4 o-hidden">
                            <div class="card-body ul-card__widget-chart">
                                <div class="ul-widget__chart-info">
                                    <h5 class="heading"> Name : {{ $store.state.user.name }}  </h5>
                                    <div class="ul-widget__chart-number">
                                        <!-- <h2 class="t-font-boldest">$1000</h2><small class="text-muted">46% compared to last year</small> -->
                                    </div>
                                </div>
                                <div id="basicArea-chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3">
                        <router-link to="/dashboard/my-products">
                        <div class="card mb-4 o-hidden">
                            <div class="card-body ul-card__widget-chart">
                                <div class="ul-widget__chart-info">
                                    <h5 class="heading">My Products </h5>
                                    <div class="ul-widget__chart-number">
                                        <!-- <h2 class="t-font-boldest">$500</h2><small class="text-muted">46% compared to last year</small> -->
                                    </div>
                                </div>
                                <div id="basicArea-chart2"></div>
                            </div>
                        </div>
                        </router-link>
                    </div>
                    <div class="col-md-3 col-lg-3">
                        <router-link to="/dashboard/my-orders">
                        <div class="card mb-4 o-hidden">
                            <div class="card-body ul-card__widget-chart">
                                <div class="ul-widget__chart-info">
                                    <h5 class="heading">My Orders </h5>
                                    <div class="ul-widget__chart-number">
                                        <!-- <h2 class="t-font-boldest"> 4,909</h2><small class="text-muted">46% compared to last year</small> -->
                                    </div>
                                </div>
                                <div id="basicArea-chart3"></div>
                            </div>
                        </div>
                        </router-link>

                    </div>
                </div> 


                
        <div v-if="$store.state.user.user_type == 'customer' " class="container  pt-5">
          <div class="row">
              <div class="col-md-9 ">
                <span class="mb-5">   Check Out</span>
                <div class="checkoutListXX">
                    <ul class="checkoutList">
                       
                        <li class="list-products" v-for="(cart, index) in this.$store.state.cart " :key="index">
                         <div class="inner-modal">
                            
                            <span class="modal-image"> <img :src="cart.image" alt=""> </span>
                            <span> {{ cart.name }} 
                                <br> {{  toNaira( cart.price ) }}   <br> Quantity:  {{ cart.productQty }} </span>
                                <span class="float-right" @click="$store.commit('removeFromCart', cart )"> <b> X</b> </span>
                                
                         </div>
                    </li>
                    </ul>
                </div>
              

              </div>
              <div class="col-md-3">
                  <span class="mb-5"> Total Price </span> <br>
                  <span> {{  toNaira( $store.getters.cartTotal ) }} </span>
                  <br>
                  <button class="btn btn-primary my-3"> click to pay </button>
              </div>
          </div>
   
      </div>



            </div>
          
            <!-- fotter end -->
        </div>
</template>

<script>

    export default {
        name : 'adminHomeMain',

        data(){
            return{
                name: ''
            }
        },

        mounted() {
          this.getUser();
        },
        methods:{
            getUser(){
                axios.get('/api/user').then( response => {
                console.log( response )
                this.name = response.data.email
            });
            },
              toNaira(value) {
      const val = new Intl.NumberFormat().format(value);
      return "₦" + val;
    },

        }
    }
</script>

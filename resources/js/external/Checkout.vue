<template>
    <div id="portfolio" class="container-fluid text-center bg-grey">
            <h2>Checkout </h2><br>
            <h4>Our Checkout page </h4>
  <div class="row text-left px-3 slideanimXX">

      <div class="container  pt-5">
          <div class="row">
              <div class="col-md-9 ">
                <span class="mb-5">   Check Out</span>
                <div class="checkoutListXX">
                    <ul class="checkoutList">
                       
                        <li class="list-products" v-for="(cart, index) in this.$store.state.cart " :key="index">
                         <div class="inner-modal">
                            
                            <span class="modal-image"> <img :src="cart.image" alt=""> </span>
                            <span> {{ cart.name }} 
                                <br> {{  toNaira( cart.price ) }} <br> Quantity:  {{ cart.productQty }} </span>
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

              </div>
          </div>
      </div>
</div>
            <h4> Kindly <router-link to="/login" style="color:  #f4511e"> LOGIN </router-link> to continue or <router-link to="/user-signup" style="color:  #f4511e" > SIGN UP AS A CUSTOMER </router-link> to complete your purchase.  </h4>
  </div>
</template>

<script>
export default {
    
    methods:{
        toNaira(value) {
      const val = new Intl.NumberFormat().format(value);
      return "₦" + val;
    },

    }
}
</script>

<style>

</style>
<template>
<div>
<div id="portfolio" class="container-fluid text-center bg-grey">
  <h2>Shop </h2><br>
  <h4>Our Shop</h4>
  <div class="row text-left px-3 slideanimXX">

    <div v-for="(product, index) in products" :key="index" class="col-sm-3">
      <div class="thumbnail">
        <img :src="product.image" alt="Paris" style="max-height:150px " >
        <div class="d-flex justify-content-between ">
        <span class="ml-4"><strong>{{product.name}}</strong></span>
        <span class="mx-4">{{  toNaira(product.price) }} </span>
        </div>
        <div class="d-flex justify-content-between ">
         <span class="ml-4 mt-4"> {{ product.description.substring(0,8)+".." }} </span>
         <span class="mx-4 mt-4"> <button class="btn btn-sm" @click.prevent="addToCart(product)"> AddToCart </button></span>
        </div>
      </div>-
    </div>


  </div><br>
</div>





</div>
  
</template>

<script>
export default {
  data(){
    return{
      products:{}
    }
  },
  methods:{
      addToCart(product){
            $('#shopModal').modal('show');
            // console.log(product);
          this.$store.commit('addtocart', product);
      },
      getProducts(){
          axios.get('/api/products')
          .then(response => {
              console.log(response.data.response.products)
              this.products = response.data.response.products
          })
          .catch(error => {
              console.log(error)
          })
      },
      toNaira(value) {
      const val = new Intl.NumberFormat().format(value);
      return "₦" + val;
    },
  },
    mounted(){
      this.getProducts();
    }
}
</script>

<style scoped>

</style>



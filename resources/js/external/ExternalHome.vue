<template>

<!-- <body   id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60"> -->
<div id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <router-link class="navbar-brand" to="/"> R&E SHOP </router-link>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon bg-white" ></span>
    <span class="navbar-toggler-icon bg-white" ></span>
    <span class="navbar-toggler-icon bg-white" ></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <div class="d-flex justify-content-lg-between">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <router-link to="/" class="nav-link" >Home <span class="sr-only">(current)</span></router-link>
      </li>
      <li class="nav-item">
        <router-link to="/#about" class="nav-link" >About </router-link>
      </li>
      <li class="nav-item">
           <router-link to="/#services" class="nav-link" >Services </router-link>
      </li>
      <li class="nav-item">
        <router-link to="/shop" class="nav-link" >Shop</router-link>
      </li>
       <li class="nav-item">
        <router-link to="/contact" class="nav-link">Contact </router-link>
       </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <strong>Reg/Login </strong>
        </a>
        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
          <router-link to="vendor-signup" class="dropdown-item" >Vendor Sign Up</router-link>
          <router-link to="user-signup" class="dropdown-item" > Customer Sign Up</router-link>
          <router-link  to="login" class="dropdown-item" > Login </router-link>
        </div>
      </li>
    </ul>

     <ul class="navbar-nav mx-4">
      <li class="nav-item ">
        <button  data-toggle="modal" data-target="#shopModal" class="nav-link mx-4 text-dark" > CART <span class="sr-only"> </span></button>
      </li>
      </ul>
      </div>
  </div>
</nav>   

<router-view> </router-view>


<!-- Modal -->
<div class="modal fade" id="shopModal" tabindex="-1" role="dialog" aria-labelledby="shopModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="shopModalLabel"> R&E Shop </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="modal-body">
                <ul>
                    <li class="list-products" v-for="(cart, index) in this.$store.state.cart " :key="index">
                         <div class="inner-modal">
                            
                            <span class="modal-image"> <img :src="cart.image" width="45px" height="45px" alt=""> </span>
                            <span> {{ cart.name }} 
                                <br> {{ cart.price  }} <br> Quantity:  {{ cart.productQty }} </span>
                                <span class="float-right" @click="$store.commit('removeFromCart', cart )"> <b> X</b> </span>
                         </div>
                    </li>
                </ul>
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Continue Shoping </button>
        <router-link to="/checkout" type="button" class="btn btn-primary"> Checkout </router-link>
      </div>
    </div>
  </div>
</div>



<!-- Image of location/map -->
<img src="/images/shopimg.jpg" class="w3-image w3-greyscale-min" style="width:100%">

<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p> Reiss Shop <a href="https://reissshop.com" title="Visit reiss shop">www.reissshop.com</a></p>
</footer>




</div>
</template>

<script>
export default {

}
</script>

 <style >
  body {
    font: 400 15px Lato, sans-serif;
    line-height: 1.8;
    color: #818181;
  }
  .submit-btn{
    background-color: #f4511e;
  }
  h2 {
    font-size: 24px;
    text-transform: uppercase;
    color: #303030;
    font-weight: 600;
    margin-bottom: 30px;
  }
  h4 {
    font-size: 19px;
    line-height: 1.375em;
    color: #303030;
    font-weight: 400;
    margin-bottom: 30px;
  }  
  .jumbotron {
    background-color: #f4511e;
    color: #fff;
    padding: 100px 25px;
    font-family: Montserrat, sans-serif;
  }
  .container-fluid {
    padding: 60px 50px;
  }
  .bg-grey {
    background-color: #f6f6f6;
  }
  .logo-small {
    color: #f4511e;
    font-size: 50px;
  }
  .logo {
    color: #f4511e;
    font-size: 200px;
  }
  .thumbnail {
    padding: 0 0 15px 0;
    border: none;
    border-radius: 0;
  }
  .thumbnail img {
    width: 100%;
    height: 100%;
    margin-bottom: 10px;
  }
  .carousel-control.right, .carousel-control.left {
    background-image: none;
    color: #f4511e;
  }
  .carousel-indicators li {
    border-color: #f4511e;
  }
  .carousel-indicators li.active {
    background-color: #f4511e;
  }
  .item h4 {
    font-size: 19px;
    line-height: 1.375em;
    font-weight: 400;
    font-style: italic;
    margin: 70px 0;
  }
  .item span {
    font-style: normal;
  }
  .panel {
    border: 1px solid #f4511e; 
    border-radius:0 !important;
    transition: box-shadow 0.5s;
  }
  .panel:hover {
    box-shadow: 5px 0px 40px rgba(0,0,0, .2);
  }
  .panel-footer .btn:hover {
    border: 1px solid #f4511e;
    background-color: #fff !important;
    color: #f4511e;
  }
  .panel-heading {
    color: #fff !important;
    background-color: #f4511e !important;
    padding: 25px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
    border-bottom-left-radius: 0px;
    border-bottom-right-radius: 0px;
  }
  .panel-footer {
    background-color: white !important;
  }
  .panel-footer h3 {
    font-size: 32px;
  }
  .panel-footer h4 {
    color: #aaa;
    font-size: 14px;
  }
  .panel-footer .btn {
    margin: 15px 0;
    background-color: #f4511e;
    color: #fff;
  }
  .navbar {
    margin-bottom: 0;
    background-color: #f4511e;
    z-index: 9999;
    border: 0;
    font-size: 12px !important;
    line-height: 1.42857143 !important;
    letter-spacing: 2px;
    border-radius: 0;
    font-family: Montserrat, sans-serif;
  }
  .navbar li a, .navbar .navbar-brand {
    color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
    color: #f4511e !important;
    background-color: #fff !important;
  }
  .navbar-default .navbar-toggle {
    border-color: transparent;
    color: #fff !important;
  }
  footer .glyphicon {
    font-size: 20px;
    margin-bottom: 20px;
    color: #f4511e;
  }
   .is-error{
        border: 2px solid red;
        border-radius: 4px;
    }
  .slideanim {visibility:hidden;}
  .slide {
    animation-name: slide;
    -webkit-animation-name: slide;
    animation-duration: 1s;
    -webkit-animation-duration: 1s;
    visibility: visible;
  }
  @keyframes slide {
    0% {
      opacity: 0;
      transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      transform: translateY(0%);
    }
  }
  @-webkit-keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
    .btn-lg {
      width: 100%;
      margin-bottom: 35px;
    }
  }
  @media screen and (max-width: 480px) {
    .logo {
      font-size: 150px;
    }
  }
   /* modal */

   
ul .list-products {
    list-style-type: none;
    display: block;
    justify-content: left;
    text-align: left;
}

ul .list-products span{
     display: block;
     margin-bottom: 2px;
      align-content: left;
}
.modal-image{
    max-width: 70px;
}
.inner-modal{
    display: flex;
}
.inner-modal span{
  margin-right: 30px;
  padding: 10px;
}
 
ul li .inner-modal span.float-right{
     cursor: pointer;
}



  </style>









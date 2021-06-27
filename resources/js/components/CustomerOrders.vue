<template>
    <div class="main-content-wrap sidenav-open d-flex flex-column">
    <div class="main-content">
        <div class="breadcrumb">
            <h1> Order history </h1>
            <ul>
                <li><router-link to="/dashboard/home">Home </router-link></li>
                <li>Customer Order History  </li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <div class="row justify-content-center mt-12">
            <div class="col-md-10">
                <div class="card mb-5">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col"> Product image</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Vendor</th>
                                <th scope="col">Customer Name </th>
                                <th scope="col">Order id </th>
                                <th scope="col">Quantity </th>
                                <th scope="col">Request Date  </th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr v-for="(order, index) in orders " :key="index">
                                <th scope="row">{{ index+1 }}</th>
                                <td> <img class="img-circle" :src="order.product.image" width="45px" height="45px" alt=""> </td>
                                <td> {{ order.product.name }} </td>
                                <td> {{ order.vendor_name }} </td>
                                <td> {{ order.user.name }} </td>
                                <td> {{ order.order_id }} </td>
                                <td> {{ order.quantity }} </td>
                                <td> {{ order.created_at }} </td>
                                
                                </tr>
                                        <!-- 'product_id', 'product_name', 'image','vendor_id','user_id','quantity','order_id' -->

                            </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            orders:{},
        }
    },
    methods:{
       getOrders(){
               axios.get('/api/order/customer-orders')
               .then(response => {
                    console.log(response.data.data)
                   this.orders = response.data.data
               })
               .catch(error => {
                   console.log(error)
               })
           },
    },
    mounted(){
        this.getOrders();
    }

}
</script>

<style>

</style>



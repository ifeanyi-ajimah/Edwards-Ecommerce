import Adminhome from './components/AdminHome.vue'

import Adminhomemain from './components/AdminHomeMain.vue'



import AddProduct from './components/AddProduct.vue'
import MyProducts from './components/MyProducts.vue'
import ShowProduct from './components/ShowProduct.vue'
import EditProduct from './components/EditProduct.vue'
import MyOrders from './components/MyOrders.vue'
import AllProducts from './components/AllProducts.vue'
import CustomerOrders from './components/CustomerOrders.vue'



import External from './external/ExternalHome.vue'
import Home1 from './external/Home1.vue'
import Shop from './external/Shop.vue'
import Contact from './external/Contact.vue'
import VendorSignUp from './external/VendorSignUp.vue'
import UserSignUp from './external/UserSignUp.vue'
import GeneralLogin from './external/GeneralLogin.vue'
import Checkout from './external/Checkout.vue'

export const routes = [
    
    {
    path: '/',   component: External,
    children:[
        {path: '', name : 'home', component: Home1 },
        {path: 'shop', name: 'shop', component: Shop},
        {path: 'contact', name: 'contact', component: Contact},
        {path: 'vendor-signup', name: 'vendorsignup', component: VendorSignUp},
        {path: 'user-signup', name: 'usersignup', component: UserSignUp},
        {path: 'login', name: 'login', component: GeneralLogin},
        {path: 'checkout', name: 'checkout', component: Checkout},

    ]
    },

    {
        path: '/dashboard', name: 'dashboard', component : Adminhome,
        meta:{
            requiresAuth: true
        },
        children:[
            {path: 'home', name: 'dashboardhome', component: Adminhomemain},

            {path: 'add-product', name: 'add.product', component: AddProduct},
            {path: 'my-products', name: 'my.products', component: MyProducts},
            {path: 'product/:product_id', component: ShowProduct },
            {path: 'edit/product/:product_id', component: EditProduct },
            {path: 'my-orders', name: 'myorders', component: MyOrders},
            {path: 'all-product', name: 'all.product', component: AllProducts},
            {path: 'customer-orders', name: 'customer.orders', component: CustomerOrders},


        ],
       
    },
    
   

];





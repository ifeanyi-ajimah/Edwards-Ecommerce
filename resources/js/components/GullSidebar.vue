<template>
     <div class="side-content-wrap">
            <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
                <ul class="navigation-left">
                   
                    <li class="nav-item" ><router-link :to="{ name: 'dashboardhome'}" class="nav-item-hold" ><i class="nav-icon i-File-Horizontal-Text"></i><span class="nav-text"> Home </span></router-link>
                        <div class="triangle"></div>
                    </li>
                    <li v-if="$store.state.user.user_type == 'vendor' " class="nav-item" ><router-link to="/dashboard/add-product" class="nav-item-hold" href="#"><i class="nav-icon i-File-Horizontal-Text"></i><span class="nav-text">Add Product </span></router-link>
                        <div class="triangle"></div>
                    </li>
                    <li v-if="$store.state.user.user_type == 'vendor' " class="nav-item" ><router-link to="/dashboard/my-products" class="nav-item-hold" ><i class="nav-icon i-File-Horizontal-Text"></i><span class="nav-text">My Products </span></router-link>
                        <div class="triangle"></div>
                    </li>
                    <li v-if="$store.state.user.user_type == 'vendor' " class="nav-item" ><router-link to="/dashboard/my-orders" class="nav-item-hold" ><i class="nav-icon i-File-Horizontal-Text"></i><span class="nav-text">My Orders </span></router-link>
                        <div class="triangle"></div>
                    </li>
                    <li v-if="$store.state.user.user_type == 'customer' " class="nav-item" ><router-link to="/dashboard/customer-orders" class="nav-item-hold" ><i class="nav-icon i-File-Horizontal-Text"></i><span class="nav-text">My Orders (customer)</span></router-link>
                        <div class="triangle"></div>
                    </li>
                    <li v-if="$store.state.user.user_type == 'admin' " class="nav-item" Xdata-item="forms"><a class="nav-item-hold" href="#"><i class="nav-icon i-File-Horizontal-Text"></i><span class="nav-text">All Vendors</span></a>
                        <div class="triangle"></div>
                    </li>
                    <li v-if="$store.state.user.user_type == 'admin' " class="nav-item"><a class="nav-item-hold" href="datatables.html"><i class="nav-icon i-File-Horizontal-Text"></i><span class="nav-text">All Products </span></a>
                        <div class="triangle"></div>
                    </li>
                    <li v-if="$store.state.user.user_type == 'admin' " class="nav-item active" ><a class="nav-item-hold" href="#"><i class="nav-icon i-Double-Tap"></i><span class="nav-text">All Orders </span></a>
                        <div class="triangle"></div>
                    </li>
                   
                </ul>
            </div>
           
            <div class="sidebar-overlay"></div>
     </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

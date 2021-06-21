<template>
    <div class="app-admin-wrap layout-sidebar-large" >

            <Navbar></Navbar>
            <Sidebar> </Sidebar>
             <!-- <router-view/> -->
             <transition name="slide-fade">
             <router-view class="view"/>
             </transition>
             <SearchUi> </SearchUi>
            <Footer1> </Footer1>

    </div>
</template>

<script>

    import Navbar from './GullNavbar.vue'
    import Sidebar from './GullSidebar.vue'
    import Footer1 from './GullAdminFooter.vue'
    import SearchUi from './SearchUI.vue'

    export default {
      name : 'Adminhome',

        created() {
           axios.defaults.headers.common["Authorization"] = "Bearer " + localStorage.getItem("access_token")
          this.$store.dispatch('getcurrentuser')
        
        },
        computed:{
            currenUser:{
              get(){
                return $this.$store.state.user
              }
            }
        },

        components:{
            Navbar,
            Sidebar,
            Footer1,
            SearchUi
        }

    }
</script>

<style scoped>

.slide-fade-enter-active {
  transition: all .3s ease;
}

.slide-fade-leave-active {
  transition: all .3s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}

.slide-fade-enter, .slide-fade-leave-to{
  transform: translateX(10px);
  opacity: 0;
}


</style>













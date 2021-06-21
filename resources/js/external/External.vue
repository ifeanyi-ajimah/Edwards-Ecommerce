<template>
    <div class="containerXX external ">
        
          <!-- <router-view> </router-view> -->
            <transition name="slide-fade">

             <router-view class="view"/>
             
             </transition>
          
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style scoped >

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



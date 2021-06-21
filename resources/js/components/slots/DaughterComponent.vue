<template>
    <div class="container">
        <h1> This is the daughter component </h1>
        <slot :description = "description" :greet = "greetingMethod" /> 
    </div>
</template>

<script>
    export default {
        data(){
            return{
                description : 'this is from the child component. use v-slot to receive data from a child slot. slot-scope'
            }
        },
        mounted() {
        
        }, 
        methods:{
            greetingMethod(){
                alert('Hello. this is from the child component ');
            }

        }
    }
</script>

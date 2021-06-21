<template>
     <div class="main-content-wrap sidenav-open d-flex flex-column">
    <div class="main-content">

                <div class="breadcrumb">
                    <h1>Layouts</h1>
                    <ul>
                        <li><a href="href">Forms</a></li>
                        <li>Form Layouts</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>

             <sonComponent>

                 <h1 slot="title"> This is from the father component</h1> 
                 <p slot="text"> {{title}}  </p> <br>

                 <div slot="header1">
                     <h3> this is the title </h3>
                     <p> this is a paragraph </p>
                 </div>
                 <div slot="fields1">
                     <input type="text" placeholder="name" required />
                     <input type="password" placeholder="password" required />
                 </div>
                 <div slot="controls1">
                     <button @click="handleSubmit"> Submit </button>
                 </div>
                 <div slot="controls1">

                 </div>

             </sonComponent>



              
    </div>

        <daughterComponent v-slot="{description, greet}"> 
            <h3> Hello from slot </h3>
            <button @click="pressMe"> Press me </button> <br>
            {{description}}
            <br>
            <button @click="greet"> Button for child component </button>
            
        </daughterComponent>


    </div>
</template>

<script>
    import sonComponent from './SonComponent.vue'
    import daughterComponent from './DaughterComponent.vue'

    export default {
        components:{
            sonComponent,
            daughterComponent
        }, 

        data(){
           return{
             title : 'Dynamic data and methods must be declared in the parent component '

           }

        },
        methods:{
            pressMe(){
                alert('method should come from parent or root component when using slots');
            }

        },

        mounted() {
        
        }
    }
</script>

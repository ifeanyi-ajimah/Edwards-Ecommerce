<template>
    
    <div>
        <slot name="title"> this is default property that ll show if nothing is placed within the parent slot  </slot>

        <h2> second deading </h2>
        <slot name="text"> </slot>

        <form>
            <div id="form-header">
                <slot name="header1"> </slot>
            </div>
            <div id="form-fields">
                <slot name="fields1"> </slot>
            </div>
            <div id="form-controls">
                <slot name="controls1"> </slot>
            </div>
            <div id="useful-links">
                <ul>
                    <li> <a href="#">Link 1 </a> </li>
                    <li> <a href="#">Link 2 </a> </li>
                    <li> <a href="#">Link 3 </a> </li>
                    <li> <a href="#">Link 4 </a> </li>
                </ul>
            </div>
        </form>

    </div>

</template>

<script>
    export default {
        data(){
           return{
             

           }

        },
        methods:{
            

        },

        mounted() {
        
        }
    }
</script>


<style scoped >
h1,h2{
    text-align: center;
}
p{
    text-align: center;
}
form{
    width:100%;
    max-width:960px;
    margin: 0 auto;
}

#useful-links ul{
    padding: 0;
}
#useful-links li{
    display:inline-block;
    margin-right: 10px;
}

form > div{
    padding:20px;
    background:#eee;
    margin: 20px 0;
}

#form-header{
    background: #ddd;
    border: 1px solid #bbb;
}

</style>
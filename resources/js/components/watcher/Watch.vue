<template>
     <div class="main-content-wrap sidenav-open d-flex flex-column">
    <div class="main-content">
                <div class="breadcrumb">
                    <h1>Home</h1>
                    <ul>
                        <li><a href="#">Watcher</a></li>
                        <li> Watchers </li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
             
                        <h4> Watcher provides a generic way to react to data changes in an input field or element of a component.  </h4>
                        <h4> This is most useful when you want to perform asynchronous or expensive operations in response to changing data  </h4>
                        <h4 class="font-weight-bold"> Notice that we always use the input data model or changing data as the name of the watcher function  </h4>
            
                <div class="row">
                    <div class="col-md-6">
                        <p> </p>
                        <div class="card mb-5">
                            <div class="card-body">
                                
                                <div class="d-flex flex-column">
                                    <form  >
                                    <div class="form-group">
                                        <label for=""> Name </label>
                                        <input class="form-control" v-model="question"  type="text" placeholder="Enter question" />
                                        <p> {{ answer }}</p>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for=""> Description </label>
                                        <input class="form-control"  type="text" placeholder="Enter description" />
                                    </div>
                                    <button type="submit"  class="btn btn-primary pd-x-20"> Submit </button> -->

                                    </form>
                                </div>
                                
                            </div>

                            
                        </div>
                    </div>
                </div>

                <hr>
                <h1> Example 2 On watchers </h1>
                
                <div class="row">
                    <div class="col-md-6">
                        <p> </p>
                        <div class="card mb-5">
                            <div class="card-body">
                                
                                <div class="d-flex flex-column">
                                    <!-- <form  >
                                    <div class="form-group">
                                        <label for=""> Name </label>
                                        <input class="form-control" v-model="question"  type="text" placeholder="Enter question" />
                                        <p> {{ answer }}</p>
                                    </div>

                                    </form> -->
                                    {{ counter }} <br>
                                    <button @click="counter++"> Press me </button> 
                                    <br> <br>
                                    <input v-model="someText" type="text">
                                </div>
                                
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
            question : '',
             answer: ' ',
            counter: 0,
            someText : ''
           }

        },
        watch:{
            question: function (newQuestion, oldQuestion) {
                console.log(`oldinput ${oldQuestion}, newinput ${newQuestion}`)
                this.answer = 'Waiting for you to stop typing...'
                
                 this.debouncedGetAnswer()
             },

             counter(newVal , oldVal){
                 console.log( `old value ${oldVal}, new value ${newVal}`)
             },
             someText(){
                 this.updateCounter();
             },
            //  someText : "updateCounter", // alternatively you can call a method like a string when using watchers and it works. 

            // someText:{
            //     handler: 'updateCounter',
            //     immediate:true,
            // }, 
            //we can use handler and immediate to call a watcher function once a component is loaded.

        }, 

        methods:{
            getAnswer(){
                if(this.question.indexOf('?') === -1 ){
                    this.answer = "add a question mark if you are done asking your question"
                    return 
                }
                this.answer = "thinking..."

                //perform axios call 
            },
            updateCounter(){
                this.counter++;
            }

        },

        created: function () {
        this.debouncedGetAnswer = _.debounce(this.getAnswer, 500)
        },
    }
</script>

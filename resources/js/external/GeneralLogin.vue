<template>
  <div>
      
<div id="pricing" class="container-fluid">
  <div class="text-center">
    <h2> Login </h2>
    <h4> Kindly Enter your details to login. </h4>
  </div>

  <div class="row slideanimXX justify-content-center">
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Login</h1>
        </div>
        <div class="panel-body">
                <form>
                  <div class="text-danger text-sm mb-4" v-if="errorMessage"> {{ errorMessage }} </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" v-model="loginData.email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input v-model="loginData.password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>

                    <input type="submit" @click.prevent="login" :disabled="form_submitting" class="btn submit-btn" :value="form_submitting ? 'Loggin in ...' : 'Submit' "/> 
                </form>
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
        loginData:{
            email : '',
            password: '',
        },
        errorMessage: '',
        form_submitting: false
    }
  },
  methods:{
     login(){ 
       this.form_submitting = true
        this.$store.dispatch('login', this.$data.loginData)
        .then( ()=> {
           this.form_submitting = false
          this.$router.replace('dashboard/home');
        })
        .catch( error => {
               this.form_submitting = false
              alert( this.$store.state.loginError )
            
        })
    },
  }

}
</script>

<style>

</style>



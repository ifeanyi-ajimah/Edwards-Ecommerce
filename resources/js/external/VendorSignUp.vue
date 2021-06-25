<template>
  <div>
      
<div id="pricing" class="container-fluid">
  <div class="text-center">
    <h2> Vendor Sign Up </h2>
    <h4> Kindly Enter your details to sign up as a Vendor. </h4>
  </div>

  <div class="row slideanimXX justify-content-center">
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Register  </h1>
        </div>
        <div class="panel-body">
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Name  </label>
                        <input type="text" :class="{'is-error':error.name}" v-model="formData.name"  class="form-control px-3" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
                        <small v-if="error.name" class="text-danger">{{ error.name[0] }}</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email </label>
                        <input type="email" :class="{'is-error':error.email}" v-model="formData.email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small v-if="error.email" class="text-danger">{{ error.email[0] }}</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone </label>
                        <input type="text" :class="{'is-error':error.phone}" v-model="formData.phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter phone">
                        <small v-if="error.phone" class="text-danger">{{ error.phone[0] }}</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" :class="{'is-error':error.password}" v-model="formData.password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        <small v-if="error.password" class="text-danger">{{ error.password[0] }}</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"> Confirm Password</label>
                        <input type="password" :class="{'is-error':error.password_confirmation}" v-model="formData.password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="Password Confirmation">
                        <small v-if="error.password_confirmation" class="text-danger">{{ error.password_confirmation[0] }}</small>
                    </div>
                    
                    <input type="submit" @click.prevent="addNewUser" :disabled="form_submitting" class="btn submit-btn" :value="form_submitting ? 'Saving data...' : 'Submit' "/> 
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
       formData:{
            name : '',
            email : '',
            phone : '',
            user_type:'vendor',
            password : '',
            password_confirmation : '',
          },
      error : {},
      form_submitting: false,
    }
  },
  methods:{

      addNewUser(){
         this.form_submitting = true 
        axios.post('/api/user/new/signup', this.formData)
        .then( response => {
            if( response.status == 201 ){
                this.form_submitting = false
                this.formData = ' '
                this.error = ''
                alert("saved");
                this.$router.replace('login');
            }
        })
        .catch( error => {
          console.log(error.response.data.message[0])
            this.error = error.response.data.message[0]
             this.form_submitting = false 
        });
        }

  }

}
</script>

<style>

</style>



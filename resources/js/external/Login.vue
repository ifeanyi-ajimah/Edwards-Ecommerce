<template>
    <div class="auth-layout-wrap" style="background-image: url(/gull/dist-assets/images/photo-wide-4.jpg)">
    <div class="auth-content">
        <div class="card o-hidden">
            <div class="row">
                <div class="col-md-6">
                    <div class="p-4">
                        <div class="auth-logo text-center mb-4"><img src="/gull/dist-assets/images/logo.png" alt=""></div>
                        <h1 class="mb-3 text-18"> {{tester.word}} </h1>
                        <!-- <div v-if="isLoggedIn" class="mb-3 text-3 text-success">
                            logged In
                        </div> -->
                        <form>
                            <div class="text-danger text-sm mb-4" v-if="errorMessage"> {{ errorMessage }} </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input v-model="loginData.email" class="form-control form-control-rounded" id="email" type="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input v-model="loginData.password" class="form-control form-control-rounded" id="password" type="password">
                            </div>
                            <button @click.prevent="login" class="btn btn-rounded btn-primary btn-block mt-2">Sign In</button>
                        </form>
                        <div class="d-flex justify-content-between">
                            <div class="mt-3 text-center"><a class="text-muted" href="forgot.html">
                                <u>Register </u></a></div>
                               <div class="mt-3 text-center"><a class="text-muted" href="forgot.html">
                                <u>Forgot Password?</u></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center" style="background-size: cover;background-image: url(/gull/dist-assets/images/photo-long-3.jpg)">
                    <div class="pr-3 auth-right"><a class="btn btn-rounded btn-outline-primary btn-outline-email btn-block btn-icon-text" href="signup.html"><i class="i-Mail-with-At-Sign"></i> Sign up with Email</a><a class="btn btn-rounded btn-outline-google btn-block btn-icon-text"><i class="i-Google-Plus"></i> Sign up with Google</a><a class="btn btn-rounded btn-block btn-icon-text btn-outline-facebook"><i class="i-Facebook-2"></i> Sign up with Facebook</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

</template>

<script>
    // axios.defaults.baseURL = "http://localhost:8000/"
    // baseURL = "http://localhost:8000/"

    export default {
        name: 'login',
        data(){
            return{   
           // isLoggedIn : localStorage.getItem('loggedIn') == 'true',

         loginData:{
               email : '',
               password: '',
            },
            errorMessage: ''
            
            }
        },
        computed:{
            tester:{
                get(){
                    return this.$store.state.test
                }
            }
        },
    
        methods:{

            login(){
                
                this.$store.dispatch('login', this.$data.loginData)
                .then( ()=> {
                  this.$router.replace('admin/home');
                })
                .catch( error => {
                      alert( this.$store.state.loginError )
                    
                })
            },

            loginB(){
            
                axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.post('/api/login', this.$data.loginData)
                    .then(response2 => {
                        // localStorage.setItem('loggedIn', 'true');
                        // this.isLoggedIn = true;
                         this.$router.replace('admin/home');
                    }).catch( error =>{
                        console.log( error )
                        // const key = Object.keys(error.response.data.errors)[0]
                        // this.errorMessage = error.response.data.errors[key][0]
                    })
                });
            },

             loginwithSanctum(){
            axios.get('/sanctum/csrf-cookie').then(response => {

                this.$store.dispatch('login', this.$data.loginData)
                .then( ()=> {
                 this.$router.replace('admin/home');
                })
                .catch( (error) => {
                    console.log(error);
                })
            });

            },

        },

        mounted() {
        console.log('Login Component mounted.')
    
        },
    }
</script>

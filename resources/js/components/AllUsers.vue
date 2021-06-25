<template>
    <div class="main-content-wrap sidenav-open d-flex flex-column">
    <div class="main-content">
        <div class="breadcrumb">
            <h1> All Users </h1>
            <ul>
                <li><router-link to="/dashboard/home">Home </router-link></li>
                <li>View Users </li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <div class="row justify-content-center mt-12">
            <div class="col-md-8">
                <div class="card mb-5">
                    <div class="card-body">
                        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">PHONE</th>
      <th scope="col">USER TYPE</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="(user, index) in users" :key="index">
      <th scope="row"> {{ index+1 }}</th>
      <td>{{user.name}}</td>
      <td>{{user.email}}</td>
      <td > {{user.phone}} </td>
      <td> <span :class="user.user_type === 'admin' ? 'badge  ' : ' ' "> {{user.user_type}}</span> </td>
    </tr>
    
  </tbody>
</table>

                        
                        
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
            users:{},
        }
    },
    methods:{
         getAllUsers(){
               axios.get('/api/user/all-users')
               .then(response => {
                    console.log(response.data.response.users)
                   this.users = response.data.response.users
               })
               .catch(error => {
                   console.log(error)
               })
           },
    },
    mounted(){
        this.getAllUsers();
    }

}
</script>

<style>

</style>



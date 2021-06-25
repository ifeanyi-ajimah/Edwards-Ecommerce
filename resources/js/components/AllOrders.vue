<template>
    <div class="main-content-wrap sidenav-open d-flex flex-column">
    <div class="main-content">
        <div class="breadcrumb">
            <h1> All orders </h1>
            <ul>
                <li><router-link to="/dashboard/home">Home </router-link></li>
                <li>View Orders  </li>
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
                                <th scope="col">User Name</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">Product</th>
                                <th scope="col">Quantity </th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                </tr>
                                <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                <td>@fat</td>
                                </tr>
                                <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
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
            
        }
    },
    methods:{
    
    },
    mounted(){
    
    }

}
</script>

<style>

</style>



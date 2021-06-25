<template>
       <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1 class="mr-2">Welcome  {{ name }} </h1>
                    <ul>
                        <li><a href="">Dashboard</a></li>
                        <li>Version 4</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
                <div class="row mb-4">
                    <div class="col-md-3 col-lg-3">
                        <div class="card mb-4 o-hidden">
                            <div class="card-body ul-card__widget-chart">
                                <div class="ul-widget__chart-info">
                                    <h5 class="heading">INCOME</h5>
                                    <div class="ul-widget__chart-number">
                                        <h2 class="t-font-boldest">$1000</h2><small class="text-muted">46% compared to last year</small>
                                    </div>
                                </div>
                                <div id="basicArea-chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3">
                        <div class="card mb-4 o-hidden">
                            <div class="card-body ul-card__widget-chart">
                                <div class="ul-widget__chart-info">
                                    <h5 class="heading">APPROVE</h5>
                                    <div class="ul-widget__chart-number">
                                        <h2 class="t-font-boldest">$500</h2><small class="text-muted">46% compared to last year</small>
                                    </div>
                                </div>
                                <div id="basicArea-chart2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3">
                        <div class="card mb-4 o-hidden">
                            <div class="card-body ul-card__widget-chart">
                                <div class="ul-widget__chart-info">
                                    <h5 class="heading">transaction</h5>
                                    <div class="ul-widget__chart-number">
                                        <h2 class="t-font-boldest">$44,909</h2><small class="text-muted">46% compared to last year</small>
                                    </div>
                                </div>
                                <div id="basicArea-chart3"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3">
                        <div class="card mb-4 o-hidden">
                            <div class="card-body ul-card__widget-chart">
                                <div class="ul-widget__chart-info">
                                    <h5 class="heading">SALES</h5>
                                    <div class="ul-widget__chart-number">
                                        <h2 class="t-font-boldest">$500</h2><small class="text-muted">46% compared to last year</small>
                                    </div>
                                </div>
                                <div id="basicArea-chart4"></div>
                            </div>
                        </div>
                    </div>
                    <!-- finance-->
                 
                    <!-- mask-form-->
                 
                </div> 
                
                <!-- end of row-->
                <!-- end of main-content -->
            </div><!-- Footer Start -->
          
            <!-- fotter end -->
        </div>
</template>

<script>

    export default {
        name : 'adminHomeMain',

        data(){
            return{
                name: ''
            }
        },

        mounted() {
          this.getUser();
        },
        methods:{
            getUser(){
                axios.get('/api/user').then( response => {
                console.log( response )
                this.name = response.data.email
            });
            }
        }
    }
</script>

<template>
    <div class="row p-0">
        <div class="col-lg-12 col-xxl-12 ">
            <div class="row">
                <div class="col-lg-3 col-xxl-3 col-sm-3">
                    <div class="card card-custom wave-warning wave wave-animate-slow mb-8 mb-lg-0">
                        <div class=" ribbon ribbon-right">
                            <div class="ribbon-target bg-warning" style="top: 10px; right: -2px;">
                                <h5 class="mt-2">Daily</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center p-5">
<!--                                <div class="mr-6">-->
<!--                                        <span class="svg-icon svg-icon-success svg-icon-4x">-->
<!--                                         <i class="flaticon-pie-chart text-warning" style="font-size: 70px"></i>-->
<!--                                        </span>-->
<!--                                </div>-->
                                <div class="d-flex flex-column">
                                    <a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h3 mb-0">
                                        RM {{chart.daily}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-xxl-2 col-sm-2">
                    <div class="card card-custom wave-warning wave wave-animate-slow mb-8 mb-lg-0">
                        <div class=" ribbon ribbon-right">
                            <div class="ribbon-target bg-warning" style="top: 10px; right: -2px;">
                                <h5 class="mt-2">Week</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center p-5">
<!--                                <div class="mr-6">-->
<!--                                        <span class="svg-icon svg-icon-success svg-icon-4x">-->
<!--                                         <i class="flaticon-pie-chart text-warning" style="font-size: 70px"></i>-->
<!--                                        </span>-->
<!--                                </div>-->
                                <div class="d-flex flex-column">
                                    <a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h3 mb-0">
                                        RM {{chart.week}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-xxl-2 col-sm-2">
                    <div class="card  card-custom wave-warning wave wave-animate-slow mb-8 mb-lg-0">
                        <div class=" ribbon ribbon-right">
                            <div class="ribbon-target bg-warning" style="top: 10px; right: -2px;">
                                <h5 class="mt-2">Month</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center p-5">
                                <div class="mr-6">
<!--                                        <span class="svg-icon svg-icon-success svg-icon-4x">-->
<!--                                            <i class="flaticon-pie-chart text-warning" style="font-size: 70px"></i>-->
<!--                                        </span>-->
                                </div>
                                <div class="d-flex flex-column">
                                    <a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h3 mb-3">
                                        RM {{chart.month}}
                                    </a>
                                    <div class="text-dark-75">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-xxl-2 col-sm-2">
                    <div class="card card-custom wave-warning wave wave-animate-slow mb-8 mb-lg-0">
                        <div class=" ribbon ribbon-right">
                            <div class="ribbon-target bg-warning" style="top: 10px; right: -2px;">
                                <h5 class="mt-2">Year</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center p-5">
                                <div class="mr-6">
<!--                                        <span class="svg-icon svg-icon-success svg-icon-4x">-->
<!--                                         <i class="flaticon-pie-chart text-warning" style="font-size: 70px"></i>-->
<!--                                        </span>-->
                                </div>
                                <div class="d-flex flex-column">
                                    <a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h3 mb-3">
                                        RM {{chart.year}}
                                    </a>
                                    <div class="text-dark-75">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xxl-3 col-sm-3">
                    <div class="card card-custom wave-success wave wave-animate-slow mb-8 mb-lg-0">
                        <div class=" ribbon ribbon-right">
                            <div class="ribbon-target bg-success" style="top: 10px; right: -2px;">
                                <h5 class="mt-2">Total</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center p-5">
                                <div class="mr-6">
<!--                                        <span class="svg-icon svg-icon-success svg-icon-4x">-->
<!--                                            <i class="flaticon-pie-chart text-success" style="font-size: 70px"></i>-->
<!--                                        </span>-->
                                </div>
                                <div class="d-flex flex-column">
                                    <a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">
                                        RM {{chart.total}}
                                    </a>
                                    <div class="text-dark-75">

                                    </div>
                                </div>
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
        props:['data'],
        data() {
            return {
                chart:[],
            }
        },
        mounted () {},
        created(){
            this.fetchChart();
        },
        methods:{
            fetchChart(){
                fetch('/api/v1/Customer/Lists/' + this.data.id +'/customer-chart').then(response => response.json())
                    .then(response => {
                        this.chart = response;

                    })
                    .catch(error => console.log(error))
            },
        }
    }
</script>

<template>
    <div class="row p-0">
        <div class="col-lg-12 col-xxl-12 ">
            <div class="row mb-2">
                <div class="col-lg-6 col-xxl-6 col-sm-6">
                    <div class="card card-custom wave-success wave wave-animate-slow mb-8 mb-lg-0" style="box-shadow: 0 3px 6px 0 rgb(0 0 0 / 10%), 0 1px 3px 0 rgb(0 0 0 / 8%);">
                        <div class=" ribbon ribbon-right">
                            <div class="ribbon-target bg-success" style="top: 10px; right: -2px;">
                                <h5 class="mt-2">Daily </h5>
                            </div>
                        </div>
                        <div class="card-body mt-5">
                            <div class="d-flex align-items-center p-2">
                                <!--<div class="mr-6">-->
                                        <!--<span class="svg-icon svg-icon-success svg-icon-4x">-->
                                         <!--<i class="flaticon-pie-chart text-warning" style="font-size: 70px"></i>-->
                                        <!--</span>-->
                                <!--</div>-->
                                <div class="d-flex flex-column">
                                    <a href="chart-detail/Daily" class="text-dark text-hover-primary font-weight-bold font-size-h3 mb-0">
                                        RM {{chart.daily}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-6 col-sm-6">
                    <div class="card card-custom wave-warning wave wave-animate-slow mb-8 mb-lg-0" style="box-shadow: 0 3px 6px 0 rgb(0 0 0 / 10%), 0 1px 3px 0 rgb(0 0 0 / 8%);">
                        <div class=" ribbon ribbon-right">
                            <div class="ribbon-target bg-warning" style="top: 10px; right: -2px;">
                                <h5 class="mt-2">Week </h5>
                            </div>
                        </div>
                        <div class="card-body mt-5">
                            <div class="d-flex align-items-center p-2">
                                <!--<div class="mr-6">-->
                                <!--<span class="svg-icon svg-icon-success svg-icon-4x">-->
                                <!--<i class="flaticon-pie-chart text-warning" style="font-size: 70px"></i>-->
                                <!--</span>-->
                                <!--</div>-->
                                <div class="d-flex flex-column">
                                    <a href="chart-detail/Week" class="text-dark text-hover-primary font-weight-bold font-size-h3 mb-0">
                                        RM {{chart.week}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-6 col-xxl-6 col-sm-6">
                    <div class="card card-custom wave-warning wave wave-animate-slow mb-8 mb-lg-0" style="box-shadow: 0 3px 6px 0 rgb(0 0 0 / 10%), 0 1px 3px 0 rgb(0 0 0 / 8%);">
                        <div class=" ribbon ribbon-right">
                            <div class="ribbon-target bg-warning" style="top: 10px; right: -2px;">
                                <h5 class="mt-2">Month</h5>
                            </div>
                        </div>
                        <div class="card-body mt-5">
                            <div class="d-flex align-items-center p-2">
                                <!--<div class="mr-6">-->
                                <!--<span class="svg-icon svg-icon-success svg-icon-4x">-->
                                <!--<i class="flaticon-pie-chart text-warning" style="font-size: 70px"></i>-->
                                <!--</span>-->
                                <!--</div>-->
                                <div class="d-flex flex-column">
                                    <a href="chart-detail/Month" class="text-dark text-hover-primary font-weight-bold font-size-h3 mb-0">
                                        RM {{chart.month}}
                                    </a>
                                    <div class="text-dark-75">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-6 col-sm-6">
                    <div class="card card-custom wave-warning wave wave-animate-slow mb-8 mb-lg-0" style="box-shadow: 0 3px 6px 0 rgb(0 0 0 / 10%), 0 1px 3px 0 rgb(0 0 0 / 8%);">
                        <div class=" ribbon ribbon-right">
                            <div class="ribbon-target bg-warning" style="top: 10px; right: -2px;">
                                <h5 class="mt-2">Year</h5>
                            </div>
                        </div>
                        <div class="card-body mt-5">
                            <div class="d-flex align-items-center p-2">
                                <!--<div class="mr-6">-->
                                        <!--<span class="svg-icon svg-icon-success svg-icon-4x">-->
                                         <!--<i class="flaticon-pie-chart text-warning" style="font-size: 70px"></i>-->
                                        <!--</span>-->
                                <!--</div>-->
                                <div class="d-flex flex-column">
                                    <a href="chart-detail/Year" class="text-dark text-hover-primary font-weight-bold font-size-h3 mb-0">
                                        RM {{chart.year}}
                                    </a>
                                    <div class="text-dark-75">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-xxl-12 col-sm-12">
                    <div class="card card-custom wave-primary wave wave-animate-slow mb-8 mb-lg-0" style="box-shadow: 0 3px 6px 0 rgb(0 0 0 / 10%), 0 1px 3px 0 rgb(0 0 0 / 8%);">
                        <div class=" ribbon ribbon-right">
                            <div class="ribbon-target bg-primary" style="top: 10px; right: -2px;">
                                <h5 class="mt-2">Total</h5>
                            </div>
                        </div>
                        <div class="card-body mt-5">
                            <div class="d-flex align-items-center p-2">
                                <!--<div class="mr-6">-->
                                <!--<span class="svg-icon svg-icon-success svg-icon-4x">-->
                                <!--<i class="flaticon-pie-chart text-success" style="font-size: 70px"></i>-->
                                <!--</span>-->
                                <!--</div>-->
                                <div class="d-flex flex-column">
                                    <a href="chart-detail/Total" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-0">
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
                fetch('/api/v1/orders/team/Lists/' + this.data.id +'/agent-chart').then(response => response.json())
                    .then(response => {
                        this.chart = response;

                    })
                    .catch(error => console.log(error))
            },
        }
    }
</script>

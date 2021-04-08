<template>
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid">
            <div v-if="!isSearch">
                <agent-dashboard-chart :data="data"></agent-dashboard-chart>
            </div>
            <div class="row"  v-if="isSearch">
                <div class="col-lg-12 col-xxl-12 col-sm-12">
                    <div class="card card-custom wave-primary wave wave-animate-slow mb-8 mb-lg-0">
                        <div class=" ribbon ribbon-right">
                            <div class="ribbon-target bg-primary" style="top: 10px; right: -2px;">
                                <h5 class="mt-2">{{StartDate}}   -   {{EndDate}}</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center p-5">
                                <div class="row" v-if="isSpinner">
                                    <div class="col-lg-12 d-flex justify-content-center">
                                        <div class="spinner spinner-success d-flex align-items-center">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column" v-if="!isSpinner">
                                    <label class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">
                                        RM {{TotalSearch}}
                                    </label>
                                    <div class="text-dark-75">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12 col-xxl-12">
                    <div class="card card-custom">
                        <div class="card-header flex-wrap py-5">
                            <div class="card-title">
                                <h3 class="card-label">List {{option}} Order
                                    <span class="d-block text-muted pt-2 font-size-sm">List of Order (Restock)</span>
                                </h3>
                            </div>
                            <div class="card-toolbar" v-show="option === 'Week' || option === 'Month' || option === 'Year' || option === 'Total'">
                                <div class="row">
                                    <div class="col-lg-10">
                                        <div class="form-group row">
                                            <div class="col-lg-5">
                                                <input class="form-control" type="date" v-model="StartDate"/>
                                            </div>
                                            <div class="col-lg-2 d-flex justify-content-center">
                                                <label class="col-2 col-form-label">-</label>
                                            </div>
                                            <div class="col-lg-5">
                                                <input class="form-control" type="date" v-model="EndDate"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <button class="btn btn-sm btn-primary" @click="searchHQOrder"> Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body"  >
                            <div v-show="isSpinner">
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <div class="spinner spinner-success d-flex align-items-center">
                                    </div>
                                </div>
                            </div>
                            <div v-show="!isSpinner">
                                <agent-order-hq-elements :data="this.Orders"></agent-order-hq-elements>
                            </div>
                        </div>
                    </div>

<!--                    <agent-order-hq-list></agent-order-hq-list>-->
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['data','option'],
        data() {
            return {
                image_source: 'storage/ProfilePicture/',
                Orders:[],
                StartDate:'',
                EndDate:'',
                isSearch: false,
                TotalSearch:0,
                isSpinner:false,
            }
        },
        mounted() {},
        watch: {
            data() {}
        },
        created(){
            this.fetchHQOrder();
        },
        methods: {
            searchHQOrder(){
                this.isSearch = true;
                this.isSpinner = true;
                fetch('/api/v1/orders/HQ/Lists/' + this.StartDate + '/'+ this.EndDate + '/' + this.data.id + '/admin-search-chart-order').then(response => response.json())
                    .then(response => {
                        this.Orders = response.data;
                        this.searchTotalChart();
                        this.isSpinner = false;

                        $('#table-hq-order').DataTable().destroy();
                        this.$nextTick(() =>
                        {
                            $('#table-hq-order').DataTable(
                                {
                                    scrollX: false,
                                    scrollCollapse: true,
                                    responsive: true,
                                    pagingType: 'full_numbers',
                                    columnDefs: [
                                        { "width": "50px", "targets": 0 },
                                        { "width": "50px", "targets": 1 },
                                        { "width": "100px", "targets": 3 },
                                        { "width": "50px", "targets": 4 },
                                        {
                                            //targets: 3,
                                            width: '50px',
                                            title: 'Actions',
                                            orderable: false,
                                            render: function(data, type, full, meta) {

                                            },
                                        },
                                    ],
                                }
                            );
                        });

                    })
                    .catch(error => console.log(error))
            },
            searchTotalChart(){
                fetch('/api/v1/orders/HQ/Lists/' + this.StartDate + '/'+ this.EndDate + '/' + this.data.id + '/admin-search-total-chart-order').then(response => response.json())
                    .then(response => {
                        this.TotalSearch = response;
                    })
                    .catch(error => console.log(error))
            },
            fetchHQOrder(){
                fetch('/api/v1/orders/HQ/Lists/' + this.option + '/'+ this.data.id + '/admin-list-chart-order').then(response => response.json())
                    .then(response => {
                        this.Orders = response.data;
                        console.log(this.Orders);
                        $('#table-hq-order').DataTable().destroy();
                        this.$nextTick(() =>
                        {
                            $('#table-hq-order').DataTable(
                                {
                                    scrollX: false,
                                    scrollCollapse: true,
                                    responsive: true,
                                    pagingType: 'full_numbers',
                                    columnDefs: [
                                        { "width": "50px", "targets": 0 },
                                        { "width": "50px", "targets": 1 },
                                        { "width": "100px", "targets": 3 },
                                        { "width": "50px", "targets": 4 },
                                        {
                                            //targets: 3,
                                            width: '50px',
                                            title: 'Actions',
                                            orderable: false,
                                            render: function(data, type, full, meta) {

                                            },
                                        },
                                    ],
                                }
                            );
                        });

                    })
                    .catch(error => console.log(error))
            },
        }

    }

</script>

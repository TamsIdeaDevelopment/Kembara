<template>
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <h3 class="card-label">List Team Sales
                    <span class="d-block text-muted pt-2 font-size-sm">List of Order</span>
                </h3>
            </div>
            <div class="card-toolbar">
                <div class="row">
                    <div class="col-12">
                        <!-- <div class="row text-right">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <select class="form-control select2" style="width:100%" id="select-filter-order"
                                            v-model="filterOrder">
                                            <option value="4">All</option>
                                            <option value="0">Pending</option>
                                            <option value="2">Processing</option>
                                            <option value="3">Decline</option>
                                            <option value="1">Completed</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <button class="btn btn-sm btn-primary" @click="filterValidation">
                                            Search</button>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="row text-right">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <input class="form-control" type="date" v-model="StartDate" />
                                        </div>
                                        <div class="col-lg-2 text-center">
                                            <label class="col-form-label">to</label>
                                        </div>
                                        <div class="col-lg-5">
                                            <input class="form-control" type="date" v-model="EndDate" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row text-right">
                            <div class="col-lg-12">
                                <button class="btn btn-sm btn-block btn-primary" @click="searchOrderByDate">Search
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
        <div class="card-body">
            <div v-show="isSpinner">
                <div class="col-lg-12 d-flex justify-content-center">
                    <button class="btn btn-light" type="button" disabled>
                        <span class="spinner-border text-primary spinner-border-sm mr-05" role="status"
                            aria-hidden="true"></span>
                        Loading...
                    </button>
                </div>
            </div>
            <div v-show="!isSpinner">
                <agent-order-team-elements :data="this.Orders"></agent-order-team-elements>
            </div>
        </div>
        <!-- <div class="card-body">
            <agent-order-team-elements :data="this.Orders"></agent-order-team-elements>
        </div> -->
    </div>
</template>
<script>
export default {
    data() {
        return {
            Orders: [],
            AgentDetails: [],
            StartDate: '',
            EndDate: '',
            orderSelected: [],
            orderDetails: [],
            isSpinner: false,
            orderAll: false,
            json_data: [],
            json_meta: [
                [
                    {
                        'key': 'charset',
                        'value': 'utf-8'
                    }
                ]
            ],
        }
    },
    created() {
        this.fetchAgentOrder();
    },
    mounted() { },

    methods: {
        //            fetchAgentInformation(){
        //                fetch('/api/v1/team/Lists/' + this.$parent.data +'/agent-info').then(response => response.json())
        //                    .then(response => {
        //                        this.AgentDetails = response.data;
        //                    })
        //                    .catch(error => console.log(error))
        //            },
        fetchAgentOrder() {
            this.isSpinner = true;
            fetch('/api/v1/orders/team/Lists/' + this.$parent.data.id + '/agent-orders').then(response => response.json())
                .then(response => {
                    this.Orders = response;
                    this.isSpinner = false;
                    $('#table-agent-order').DataTable().destroy();
                    this.$nextTick(() => {
                        $('#table-agent-order').DataTable(
                            {
                                scrollX: false,
                                scrollCollapse: true,
                                responsive: true,
                                pagingType: 'full_numbers',
                                columnDefs: [
                                    { "width": "50px", "targets": 0 },
                                    { "width": "150px", "targets": 1 },
                                    { "width": "300px", "targets": 2 },
                                    { "width": "100px", "targets": 3 },
                                    { "width": "50px", "targets": 4 },
                                    {
                                        //targets: 3,
                                        width: '50px',
                                        title: 'Actions',
                                        orderable: false,
                                        render: function (data, type, full, meta) {

                                        },
                                    },
                                ],
                            }
                        );
                    });

                })
                .catch(error => console.log(error))
        },

        searchOrderByDate() {
            this.isSpinner = true;

            this.json_data = [];
            this.orderSelected = [];
            this.orderDetails = [];
            this.orderAll = false;

            fetch('/api/v1/orders/team/Lists/' + this.StartDate + '/' + this.EndDate + '/' + this.$parent.data.id + '/search-customer-order-team').then(response => response.json())
                .then(response => {
                    this.Orders = response;

                    this.isSpinner = false;

                    $('#table-agent-order').DataTable().destroy();
                    this.$nextTick(() => {
                        $('#table-agent-order').DataTable(
                            {
                                scrollX: false,
                                scrollCollapse: true,
                                responsive: true,
                                pagingType: 'full_numbers',
                                columnDefs: [
                                    // { "responsivePriority": 1, "targets": 0 },
                                    // { "responsivePriority": 2, "targets": 1 },
                                    { "width": "50px", "targets": 0 },
                                    { "width": "150px", "targets": 1 },
                                    { "width": "300px", "targets": 2 },
                                    { "width": "100px", "targets": 3 },
                                    { "width": "50px", "targets": 4 },
                                    {
                                        //targets: 3,
                                        width: '50px',
                                        title: 'Actions',
                                        orderable: false,
                                        render: function (data, type, full, meta) {

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

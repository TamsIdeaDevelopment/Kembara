<template>
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <h3 class="card-label">List HQ Order
                    <span class="d-block text-muted pt-2 font-size-sm">List of Order (HQ)</span>
                </h3>
            </div>
            <div class="card-toolbar">
                <div class="row">
                    <div class="col-lg-8">
                        <select class="form-control select2" style="width:100%" id="select-filter-order"    v-model="filterOrder">
                            <option value="4">All</option>
                            <option value="0">Pending</option>
                            <option value="2">Processing</option>
                            <option value="3">Decline</option>
                            <option value="1">Completed</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <button class="btn btn-sm btn-primary" @click="filterValidation"> Search</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div v-show="isSpinner">
                <div class="col-lg-12 d-flex justify-content-center">
                    <button class="btn btn-light" type="button" disabled>
                        <span class="spinner-border text-primary spinner-border-sm mr-05" role="status" aria-hidden="true"></span>
                        Loading...
                    </button>
                </div>
            </div>
            <div v-show="!isSpinner">
                <order-hq-elements :data="this.Orders"></order-hq-elements>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                Orders:[],
                filterOrder:4,
                dataTable:null,
                isSpinner: false,
            }
        },
        created(){
            this.fetchOrder();
        },
        mounted() {
            VueEvent.$on('fetchOrder', () => {
                this.fetchOrder();
            });

            VueEvent.$on('searchOrder', () => {
                this.searchOrder();
            });

            $('#select-filter-order').select2({
                placeholder: "Filter By Status",
                allowClear: true
            });
            $("#select-filter-order").change(function(){
                this.filterOrder = $("#select-filter-order").val();
            }.bind(this));
        },

        methods : {
            filterValidation(){
                if(this.filterOrder == 4)
                {
                    this.fetchOrder();
                }
                else
                {
                    this.searchOrder();
                }
            },
            searchOrder()
            {
                this.isSpinner = true;
                fetch('/api/v1/orders/HQ/Lists/'+ this.filterOrder +'/1/No/admin-filter-order').then(response => response.json())
                    .then(response => {
                        this.Orders = response.data;
                        this.isSpinner = false;
                        $('#kt_datatable').DataTable().destroy();
                        this.$nextTick(() =>
                        {
                            $('#kt_datatable').DataTable(
                                {
                                    responsive: true,
                                    pagingType: 'full_numbers',
                                    columnDefs: [
                                        { "responsivePriority": 1, "targets": 0 },
                                        { "responsivePriority": 2, "targets": 4 },
                                        { "width": "50px", "targets": 0 },
                                        { "width": "50px", "targets": 1 },
                                        { "width": "450px", "targets": 2 },
                                        { "width": "50px", "targets": 3 },
                                        { "width": "100px", "targets": 4 },
                                        { "width": "50px", "targets": 5 },
                                        { "width": "50px", "targets": 6 },
                                        { "width": "50px", "targets": 7 },
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
            fetchOrder(){
                this.isSpinner = true;
                fetch('/api/v1/orders/HQ/Lists/orders').then(response => response.json())
                    .then(response => {
                        this.Orders = response.data;
                        // console.log(this.Orders);
                        this.isSpinner = false;
                        $('#kt_datatable').DataTable().destroy();
                        this.$nextTick(() =>
                        {
                            $('#kt_datatable').DataTable(
                                {
                                    responsive: true,
                                    pagingType: 'full_numbers',
                                    columnDefs: [
                                        { "responsivePriority": 1, "targets": 0 },
                                        { "responsivePriority": 2, "targets": 4 },
                                        { "width": "50px", "targets": 0 },
                                        { "width": "50px", "targets": 1 },
                                        { "width": "450px", "targets": 2 },
                                        { "width": "50px", "targets": 3 },
                                        { "width": "100px", "targets": 4 },
                                        { "width": "50px", "targets": 5 },
                                        { "width": "50px", "targets": 6 },
                                        { "width": "50px", "targets": 7 },
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

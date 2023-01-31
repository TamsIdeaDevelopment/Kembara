<template>
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <h3 class="card-label">List Customer Order
                    <span class="d-block text-muted pt-2 font-size-sm">List of Customer Order</span>
                </h3>
            </div>
            <div class="card-toolbar">
                <!-- <div class="row">
                    <download-excel class="btn" style="background-color: #3699FF; color: white;" :data="json_data"
                        type="xls" worksheet="List Order" name="Customer Order">
                        Download Excel
                    </download-excel>
                </div> -->
                <div class="row">
                    <div class="col-12">
                        <div class="row text-right">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <download-excel class="btn" style="background-color: #3699FF; color: white;"
                                        :data="json_data" type="xls" worksheet="List Order" name="Customer Order">
                                        Download Excel
                                        </download-excel>
                                    </div>
                                </div>
                            </div>
                        </div><br>
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
                <agent-customer-elements :data="this.Orders"></agent-customer-elements>
            </div>
        </div>
        <!-- <div class="card-body">
            <agent-customer-elements :data="this.Orders"></agent-customer-elements>
        </div> -->
    </div>
</template>
<script>
export default {
    data() {
        return {
            Orders: [],
            AgentDetails: [],
            order_selected: [],
            order_details: [],
            StartDate: '',
            EndDate: '',
            orderSelected: [],
            orderDetails: [],
            orderAll: false,
            isSpinner: false,
            json_fields: [],
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
        this.fetchCustomerOrder();
    },
    mounted() { },
    methods: {
        selectOrder() {
            console.log(this.order_selected);
            this.order_details = [];
            for (let i = 0; i < this.order_selected.length; i++) {
                this.order_details.push(
                    {

                        'No': i + 1,
                        'Order No': '# ' + String('000000' + this.order_selected[i].id).slice(-6),
                        'Name': this.order_selected[i].deliver_to,
                        'Phone No': '6' + this.order_selected[i].deliver_to_phone_no,
                        'Total': 'RM ' + this.order_selected[i].total,
                        'Address': this.order_selected[i].shipping_address,
                        'City': this.order_selected[i].city,
                        'Post Code': this.order_selected[i].postcode,
                        'Date': this.order_selected[i].created_at,
                    }
                );
            }
            this.json_data = this.order_details;
        },

        fetchCustomerOrder() {
            this.isSpinner = true;
            fetch('/api/v1/Customer/Lists/' + this.$parent.data.id + '/agent-list-customer-order').then(response => response.json())
                .then(response => {
                    this.Orders = response;
                    this.isSpinner = false;
                    console.log(this.Orders)
                    $('#table-customer-order').DataTable().destroy();
                    this.$nextTick(() => {
                        $('#table-customer-order').DataTable(
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

            fetch('/api/v1/Customer/Lists/' + this.StartDate + '/' + this.EndDate +  '/' +this.$parent.data.id + '/search-customer-order').then(response => response.json())
                .then(response => {
                    this.Orders = response;
                    this.isSpinner = false;
                    $('#table-customer-order').DataTable().destroy();
                    this.$nextTick(() => {
                        $('#table-customer-order').DataTable(
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

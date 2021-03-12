<template>
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <h3 class="card-label">List Customer Order
                    <span class="d-block text-muted pt-2 font-size-sm">List of Customer Order</span>
                </h3>
            </div>
            <div class="card-toolbar">
                <div class="row">
                    <download-excel
                        class   = "btn"
                        style="background-color: #3699FF; color: white;"
                        :data   = "json_data"
                        type    = "xls"
                        worksheet = "List Order"
                        name="Customer Order">
                        Download Excel
                    </download-excel>
                </div>
            </div>
        </div>
        <div class="card-body">
            <agent-customer-elements :data="this.Orders"></agent-customer-elements>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                Orders:[],
                AgentDetails:[],
                order_selected:[],
                order_details:[],
                json_fields:[],
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
        created(){
            this.fetchCustomerOrder();
        },
        mounted() {},
        methods : {
            selectOrder(){
                console.log(this.order_selected);
                this.order_details = [];
                for(let i = 0; i < this.order_selected.length; i++){
                    this.order_details.push(
                        {

                            'No' : i+1,
                            'Order No' : '# '+String('000000' + this.order_selected[i].id).slice(-6),
                            'Name' :this.order_selected[i].deliver_to,
                            'Phone No' :'6'+this.order_selected[i].deliver_to_phone_no,
                            'Total' :'RM '+this.order_selected[i].total,
                            'Address' : this.order_selected[i].shipping_address,
                            'City' : this.order_selected[i].city,
                            'Post Code' : this.order_selected[i].postcode,
                            'Date' : this.order_selected[i].created_at,
                        }
                    );
                }
                this.json_data = this.order_details;
            },

            fetchCustomerOrder(){
                fetch('/api/v1/Customer/Lists/'+ this.$parent.data.id + '/agent-list-customer-order').then(response => response.json())
                    .then(response => {
                        this.Orders = response.data;
                        console.log(this.Orders)
                        $('#table-customer-order').DataTable().destroy();
                        this.$nextTick(() =>
                        {
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

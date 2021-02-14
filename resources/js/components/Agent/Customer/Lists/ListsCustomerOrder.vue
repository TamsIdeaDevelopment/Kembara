<template>
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <h3 class="card-label">List Customer Order
                    <span class="d-block text-muted pt-2 font-size-sm">List of Customer Order</span>
                </h3>
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
            }
        },
        created(){
            this.fetchCustomerOrder();
        },
        mounted() {},

        methods : {
            fetchCustomerOrder(){
                fetch('/api/v1/Customer/Lists/'+ this.$parent.data.id + '/agent-list-customer-order').then(response => response.json())
                    .then(response => {
                        this.Orders = response.data;
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

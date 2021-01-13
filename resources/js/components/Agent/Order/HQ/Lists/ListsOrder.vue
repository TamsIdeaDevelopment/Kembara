<template>
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <h3 class="card-label">List Restock
                    <span class="d-block text-muted pt-2 font-size-sm">List of Order (Restock)</span>
                </h3>
            </div>
        </div>
        <div class="card-body">
            <agent-order-hq-elements :data="this.Orders"></agent-order-hq-elements>
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
            this.fetchHQOrder();
        },
        mounted() {},

        methods : {
//            fetchAgentInformation(){
//                fetch('/api/v1/team/Lists/' + this.$parent.data.id +'/agent-info').then(response => response.json())
//                    .then(response => {
//                        this.AgentDetails = response.data;
//
//                    })
//                    .catch(error => console.log(error))
//            },
            fetchHQOrder(){
                fetch('/api/v1/orders/team/Lists/'+ this.$parent.data.id + '/agent-restock').then(response => response.json())
                    .then(response => {
                        this.Orders = response.data;
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

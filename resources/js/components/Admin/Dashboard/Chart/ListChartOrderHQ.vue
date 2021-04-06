<template>
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid">
            <agent-dashboard-chart :data="data"></agent-dashboard-chart>
            <div class="row mt-5">
                <div class="col-lg-12 col-xxl-12">
                    <div class="card card-custom">
                        <div class="card-header flex-wrap py-5">
                            <div class="card-title">
                                <h3 class="card-label">List {{option}} Order
                                    <span class="d-block text-muted pt-2 font-size-sm">List of Order (Restock)</span>
                                </h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <agent-order-hq-elements :data="this.Orders"></agent-order-hq-elements>
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

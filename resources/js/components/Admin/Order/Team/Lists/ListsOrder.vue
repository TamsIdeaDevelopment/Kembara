<template>
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <h3 class="card-label">List Team Order
                    <span class="d-block text-muted pt-2 font-size-sm">List of Order</span>
                </h3>
            </div>
        </div>
        <div class="card-body">
            <order-team-elements :data="this.Orders"></order-team-elements>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                Orders:[],
                dataTable:null,
            }
        },
        created(){
            this.fetchOrder();
        },
        mounted() {
            VueEvent.$on('fetchProduct', () => {
                this.fetchOrder();
            });
        },

        methods : {
            fetchOrder(){
                fetch('/api/v1/orders/team/Lists/orders').then(response => response.json())
                    .then(response => {
                        this.Orders = response.data;
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
                                        { "width": "350px", "targets": 1 },
                                        { "width": "300px", "targets": 2 },
                                        { "width": "100px", "targets": 3 },
                                        { "width": "50px", "targets": 4 },
                                        {
                                            //targets: 3,
                                            width: '150px',
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

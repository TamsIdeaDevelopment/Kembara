<template>
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <h3 class="card-label">List HQ Order
                    <span class="d-block text-muted pt-2 font-size-sm">List of Order (HQ)</span>
                </h3>
            </div>
        </div>
        <div class="card-body">
            <order-hq-elements :data="this.Orders"></order-hq-elements>
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
                fetch('/api/v1/orders/HQ/Lists/orders').then(response => response.json())
                    .then(response => {
                        this.Orders = response.data;
                        console.log(this.Orders)
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

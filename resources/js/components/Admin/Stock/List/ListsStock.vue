<template>
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <h3 class="card-label">Stock
                    <span class="d-block text-muted pt-2 font-size-sm">List of Stocks</span>
                </h3>
            </div>
        </div>
        <div class="card-body">
            <agent-stock-elements :data="this.Stock"></agent-stock-elements>
            <!--<agent-product-elements :data="this.Products"></agent-product-elements>-->
        </div>
    </div>
</template>
<script>
    export default {
        props: ['data'],
        data() {
            return {
                Stock:[],
                dataTable:null,
            }
        },
        created(){
            this.fetchProduct();
        },
        mounted() {
        },

        methods : {

            fetchProduct(){
                fetch('/api/v1/product/Lists/' + this.$parent.data +'/stock-list-agent').then(response => response.json())
                    .then(response => {
                        this.Stock = response.data;
                        console.log(this.Stock)
                        $('#stock_table').DataTable().destroy();
                        this.$nextTick(() =>
                        {
                            $('#stock_table').DataTable(
                                {
                                    responsive: true,
                                    pagingType: 'full_numbers',
                                    columnDefs: [
                                        { "width": "50px", "targets": 0 },
                                        { "width": "450px", "targets": 1 },
                                        { "width": "50px", "targets": 2 },
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

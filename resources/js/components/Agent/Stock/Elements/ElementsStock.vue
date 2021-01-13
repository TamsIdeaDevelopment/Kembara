<template>
    <div>
        <table class="table table-separate table-head-custom table-checkable" id="stock_table">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Stock</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(Product, index) in data">
                <td>{{index+1}}</td>
                <td>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="symbol" v-if="Product.product_id.featured_image">
                                        <div class="symbol-label  w-50px h-50px" :style="'background-image:url('+ image_source + Product.product_id.featured_image +')'"></div>
                                    </div>
                                    <div class="symbol" v-if="!Product.product_id.featured_image">
                                        <div class="symbol-label  w-70px h-70px"> <i class="fas fa-box"></i></div>
                                    </div>
                                </div>
                                <div class="col-auto mt-1">
                                    <span class="">{{Product.product_id.name}}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </td>
                <td>{{Product.quantity}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
    export default {
        props: ['data'],
        data() {
            return {
                image_source: 'storage/Product/',
                Product:[],
                dataTable:null,
                editing: false,
            }
        },
        mounted() {
            VueEvent.$on('updateTable', () => {
                this.updateTable();
            });
        },
        watch: {
            data() {}
        },
        created(){},
        methods: {
        }

    }

</script>
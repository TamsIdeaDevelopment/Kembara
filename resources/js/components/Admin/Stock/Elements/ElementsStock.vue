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
                <td>
                    <div class="row">
                        <div class="col-lg-6">
                            <input class="form-control" style="width: 100%" type="number" v-model="Product.quantity">
                        </div>
                        <div class="col-lg-6">
                            <a @click="addProduct(data2,Product.product_id.id, Product.quantity)" class="btn btn-primary">Save</a>
                        </div>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
    export default {
        props: ['data','data2'],
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
            addProduct(user_id,product_id,quantity){
                console.log(user_id);
                console.log(product_id);
                console.log(quantity);

                var url = '/api/v1/product/Updates/'+ user_id +'/'+ product_id +'/'+ quantity +'/edit-stock-agent', method = 'post';

                fetch(url, {
                    method: method,
                    body: JSON.stringify(),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then(async response => {
                    const data = await response.json();
                    VueEvent.$emit('fetchProduct');

                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    };

                    toastr.success("Successfully Update Stock.", "Stock Updated");
                })
            }
        }

    }

</script>
<template>
    <div>
        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price (RM)</th>
                <th>Add Stock</th>
                <th>Action</th>
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
                                    <div class="symbol" v-if="Product.featured_image">
                                        <div class="symbol-label  w-50px h-50px" :style="'background-image:url('+ image_source + Product.featured_image +')'"></div>
                                    </div>
                                    <div class="symbol" v-if="!Product.featured_image">
                                        <div class="symbol-label  w-70px h-70px"> <i class="fas fa-box"></i></div>
                                    </div>
                                </div>
                                <div class="col-auto mt-1">
                                    <span class="">{{Product.name}}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </td>
                <td>{{Product.product_type_id.name}}</td>
                <td>{{Product.stock}}</td>
                <td>RM {{Product.retail_price}}</td>
                <td>
                    <div class="row mb-1">
                        <div class="col-lg-5 mb-1">
                            <a :href="'/edit-product/'+Product.id" class="btn btn-sm btn-primary">Edit</a>
                        </div>
                        <div class="col-lg-5">
                            <a class="btn btn-sm btn-danger"  data-toggle="modal" v-on:click="openDeleteRecord(Product)">Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <product-form-delete :data="this.Product"></product-form-delete>
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
            openDeleteRecord(data){
                $(".deleteProduct").modal('show');
                this.Product = data;
            },
        }

    }

</script>
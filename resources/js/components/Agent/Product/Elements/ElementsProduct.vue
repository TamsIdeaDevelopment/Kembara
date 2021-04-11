<template>
    <div>
        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Stock</th>
                <th>MOQ</th>
                <th>Price</th>
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
                <td>{{Product.minimum_order}}</td>
                <td>
                    <div v-if="$parent.$parent.data.country == 'Malaysia'">
                        <div v-if="$parent.$parent.data.east_west == 'Semenanjung'">
                            RM {{Product.price}}
                        </div>
                        <div v-if="$parent.$parent.data.east_west == 'SS'">
                            RM {{Product.ss_price}}
                        </div>
                    </div>
<!--                    <div v-if="$parent.$parent.data.country == 'Singapura' || $parent.$parent.data.country == 'Brunei'">-->
<!--                        $ {{Product.sg_brn_price}}-->
<!--                    </div>-->
                </td>
                <td>
                    <a v-if="Product.quantity < Product.minimum_order" class="btn btn-sm btn-danger">Out Of Stock</a>
<!--                    <a v-if="Product.quantity >= Product.minimum_order" :href="'/cart-add-item/'+ $parent.$parent.data.id +'/'+ Product.product_id.id +'/' + Product.price + '/' + Product.minimum_order " class="btn btn-sm btn-primary">Add To Cart</a>-->
                    <div v-if="$parent.$parent.data.country == 'Malaysia'">
                        <div v-if="$parent.$parent.data.east_west == 'Semenanjung'">
                            <a v-if="Product.quantity >= Product.minimum_order" :href="'/cart-add-item/'+ $parent.$parent.data.id +'/'+ Product.product_id.id +'/' + Product.price + '/'+ Product.minimum_order + '/' + 1 + '/' + Product.product_id.product_set" class="btn btn-sm btn-primary">Add To Cart</a>
                        </div>
                        <div v-if="$parent.$parent.data.east_west == 'SS'">
                            <a v-if="Product.quantity >= Product.minimum_order" :href="'/cart-add-item/'+ $parent.$parent.data.id +'/'+ Product.product_id.id +'/' + Product.ss_price + '/'+ Product.minimum_order + '/' + 1 + '/' + Product.product_id.product_set" class="btn btn-sm btn-primary">Add To Cart</a>
                        </div>
                    </div>
<!--                    <div v-if="$parent.$parent.data.country == 'Singapura' || $parent.$parent.data.country == 'Brunei'">-->
<!--                        <a v-if="Product.quantity >= Product.minimum_order" :href="'/cart-add-item/'+ $parent.$parent.data.id +'/'+ Product.product_id.id +'/' + Product.sg_brn_price + '/'+ Product.minimum_order + '/' + 1 " class="btn btn-sm btn-primary">Add To Cart</a>-->
<!--                    </div>-->
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

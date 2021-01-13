<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-xxl-12 ">
                <div class="card-custom gutter-b">
                    <div class="card-body d-flex flex-column">
                        <div class="row">
                            <div class="col-lg-4 col-xxl-3">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card card-custom gutter-b">
                                            <div class="card-header justify-content-center">
                                                <div class="text-center mt-5 mb-5">
                                                    <div class="symbol symbol-150 symbol-xl-150" v-if="this.Products.featured_image">
                                                        <div class="symbol-label"  :style="'background-image:url('+ image_source + this.Products.featured_image +')'"></div>
                                                    </div>
                                                    <div class="symbol symbol-150 symbol-xl-150" v-if="!this.Products.featured_image">
                                                        <div class="symbol-label  w-150px h-150px"> <i class="fas fa-box"></i></div>
                                                    </div>
                                                    <h5 class="font-weight-bold my-2 mt-5">{{Products.name}}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-xxl-12">
                                        <div class="card card-custom gutter-b">
                                            <div class="card-header  justify-content-center">
                                                <div class="navi navi-bold navi-hover navi-active navi-link-rounded  mt-5 mb-5">
                                                    <ul class="navi-item mb-2 nav nav-link" id="myTab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active navi-link py-4" id="product-tab" data-toggle="tab" href="#product-detail" aria-controls="product-detail">
                                                                <span class="nav-icon">
                                                                    <i class="flaticon2-box"></i>
                                                                </span><span class="nav-text">Product Details</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link navi-link py-4" id="inventory-tab" data-toggle="tab" href="#inventory-detail" aria-controls="inventory-detail">
                                                                <span class="nav-icon">
                                                                    <i class="flaticon2-files-and-folders"></i>
                                                                </span><span class="nav-text">Inventory</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link navi-link py-4" id="agent-price-tab" data-toggle="tab" href="#agent-price">
                                                                <span class="nav-icon">
                                                                    <i class="flaticon-price-tag"></i>
                                                                </span>
                                                                <span class="nav-text">Agent Price</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link navi-link py-4" id="agent-moq-tab" data-toggle="tab" href="#agent-moq" aria-controls="agent-moq">
                                                                <span class="nav-icon">
                                                                    <i class="flaticon-shopping-basket"></i>
                                                                </span>
                                                                <span class="nav-text">Agent MOQ</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-xxl-9">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card card-custom gutter-b">
                                            <div class="card-body">
                                                <div class="tab-content mt-5" id="myTabContent">
                                                    <div class="tab-pane fade show active" id="product-detail" role="tabpanel">
                                                        <product-form-update></product-form-update>
                                                    </div>
                                                    <div class="tab-pane fade" id="inventory-detail" role="tabpanel">
                                                        <stock-form-update></stock-form-update>
                                                    </div>
                                                    <div class="tab-pane fade" id="agent-price" role="tabpanel">
                                                        <price-form-update></price-form-update>
                                                    </div>
                                                    <div class="tab-pane fade " id="agent-moq" role="tabpanel">
                                                        <moq-form-update></moq-form-update>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['data'],
        data() {
            return {
                image_source: 'storage/Product/',
                product_id : '',
                Products:[],
                Roles: [{}],
                RolesPriceMOQ:{},
                ParentNames:[],

            }
        },
        mounted() {
            this.product_id = this.data;
            VueEvent.$on('fetchProduct', () => {
                this.fetchProduct();
            });
            VueEvent.$on('fetchPriceAndMOQ', () => {
                this.fetchPriceAndMOQ();
            });
            VueEvent.$on('fetchRole', () => {
                this.fetchRole();
            });
        },
        created(){
            this.fetchProduct();
            this.fetchPriceAndMOQ();
            this.fetchRole();
        },
        methods: {
            getParentName(){
                axios.get('/api/v1/roles/Lists/' + this.data +'/agent-dropdown')
                    .then(function (response) {
                        this.ParentNames = response.data;
                    }.bind(this));
            },
            fetchProduct(){
                fetch('/api/v1/product/Lists/' + this.data +'/products-details').then(response => response.json())
                    .then(response => {
                        this.Products = response.data;
                        this.getParentName();
                    })
                    .catch(error => console.log(error))
            },
            fetchPriceAndMOQ(){
                fetch('/api/v1/product/Lists/' + this.data +'/agent-price-moq').then(response => response.json())
                    .then(response => {
                        this.RolesPriceMOQ = response.data;
                    })
                    .catch(error => console.log(error))
            },
            fetchRole(){
                fetch('/api/v1/roles/Lists/exclude-hq-role').then(response => response.json())
                    .then(response => {
                        this.Roles = response.data;
                    })
                    .catch(error => console.log(error))

            },
        }

    }

</script>
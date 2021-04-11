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
                                                    <div class="symbol symbol-150 symbol-xl-150" v-if="this.PackagesType.featured_image">
                                                        <div class="symbol-label"  :style="'background-image:url('+ image_source + this.PackagesType.featured_image +')'"></div>
                                                    </div>
                                                    <div class="symbol symbol-150 symbol-xl-150" v-if="!this.PackagesType.featured_image">
                                                        <div class="symbol-label  w-150px h-150px"> <i class="fas fa-box"></i></div>
                                                    </div>
                                                    <h5 class="font-weight-bold my-2 mt-5">{{PackagesType.name}}</h5>
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
                                                            <a class="nav-link active navi-link py-4" id="package-tab" data-toggle="tab" href="#package-detail" aria-controls="package-detail">
                                                                <span class="nav-icon">
                                                                    <i class="flaticon2-box"></i>
                                                                </span><span class="nav-text">Package Details</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link navi-link py-4" id="package-product-tab" data-toggle="tab" href="#package-product-detail" aria-controls="package-product-detail">
                                                                <span class="nav-icon">
                                                                    <i class="flaticon2-files-and-folders"></i>
                                                                </span><span class="nav-text">Product Details</span>
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
                                                    <div class="tab-pane fade show active" id="package-detail" role="tabpanel">
                                                        <package-form-update></package-form-update>
                                                    </div>
                                                    <div class="tab-pane fade" id="package-product-detail" role="tabpanel">
                                                        <package-product-form-update :data="this.ProductName"></package-product-form-update>
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
    import { EventBus } from "../../../../app";
    export default {
        props: ['data'],
        data() {
            return {
                image_source: 'storage/Product/',
                PackagesType:{},
                Packages:{
                    package_type_id:'',
                    product_id: '',
                    retail_price: '',
                    ss_retail_price: '',
                    qty:'',
                },
                ProductName:[{
                    created_at: '',
                    description: '',
                    featured_image: '',
                    id: '',
                    images: '',
                    name: '',
                    product_set: '',
                    product_type_id: '',
                    remarks: '',
                    retail_price: '',
                    score: '',
                    shipping_bn: '',
                    shipping_east_my: '',
                    shipping_sg: '',
                    shipping_west_my: '',
                    ss_retail_price: '',
                    status: '',
                    stock: '',
                    updated_at: '',
                    weight: '',
                    quantity: 0,
                    ss_price: 0,
                    semenanjung_price: 0,
                }],
                dataTable:null,
                package_id:'',
            }
        },
        created(){
            this.fetchProductName();
            this.fetchPackage();
            this.fetchPackageProduct();
        },
        mounted() {
            this.package_id = this.data;
            VueEvent.$on('fetchProductName', () => {
                this.fetchProductName();
            });
            EventBus.$on('fetchProductName', () => {
                this.fetchProductName();
            });
            VueEvent.$on('fetchPackage', () => {
                this.fetchPackage();
            });
            VueEvent.$on('fetchPackageProduct', () => {
                this.fetchPackageProduct();
            });
        },
        methods : {
            fetchProductName(){
                fetch('/api/v1/product/Lists/products').then(response => response.json())
                    //                 fetch('/api/v1/product/Lists/' + this.$parent.data.id +'/stock-list-leader').then(response => response.json())
                    .then(response => {
                        this.ProductName = response.data;
                        // console.log(this.ProductName)
                        $('#kt_datatable').DataTable().destroy();
                        this.$nextTick(() =>
                        {
                            $('#kt_datatable').DataTable(
                                {
                                    responsive: true,
                                    pagingType: 'full_numbers',
                                    columnDefs: [
                                        { "width": "50px", "targets": 0 },
                                        { "width": "50px", "targets": 1 },
                                    ],
                                }
                            );
                        });

                    })
                    .catch(error => console.log(error))
            },
            fetchPackage(){
                fetch('/api/v1/product/Lists/' + this.data +'/package-details').then(response => response.json())
                    .then(response => {
                        this.PackagesType = response.data;
                    })
                    .catch(error => console.log(error))
            },
            fetchPackageProduct(){
                fetch('/api/v1/product/Lists/' + this.data +'/package-product-details').then(response => response.json())
                    .then(response => {
                        this.Packages = response.data;
                    })
                    .catch(error => console.log(error))
            }
        }
    }

</script>

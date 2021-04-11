<template>
    <div class="container-fluid">
        <div class="card card-custom">
            <div class="card-body p-0">
                <div class="wizard wizard-3" id="kt_wizard_v3" data-wizard-state="step-first" data-wizard-clickable="true">
                    <div class="wizard-nav">
                        <div class="wizard-steps px-8 py-8 px-lg-15 py-lg-3">
                            <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                <div class="wizard-label">
                                    <h3 class="wizard-title">
                                        <span>1.</span>Package Details</h3>
                                    <div class="wizard-bar"></div>
                                </div>
                            </div>
                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-label">
                                    <h3 class="wizard-title">
                                        <span>2.</span>Product Details</h3>
                                    <div class="wizard-bar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center py-10 px-8 py-lg-12 px-lg-10 mt-n10">
                        <div class="col-xl-12 col-xxl-7">
                            <form class="form" id="kt_form" @submit.prevent="updatePackage"  enctype="multipart/form-data">
                                <package-form-update></package-form-update>
                                <package-product-form-update :data="this.Packages"></package-product-form-update>
                                <div class="d-flex justify-content-between border-top mt-3 pt-3">
                                    <div class="mr-2">
                                        <button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">Previous</button>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" data-wizard-state="action-submit" data-wizard-type="action-submit">Save</button>
                                        <button type="button" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-next">Next</button>
                                    </div>
                                </div>
                            </form>
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
                ProductSelected:[],
                ProductSelectedDetails:[],
                package_id:'',
            }
        },
        created(){
            this.fetchProductName();
            this.fetchPackage();
            this.fetchPackageProduct();
            this.fetchPackageProductDetails();
            this.fetchPackageProductDetails();
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
            VueEvent.$on('fetchPackageProductDetails', () => {
                this.fetchPackageProductDetails();
            });
            EventBus.$on('fetchPackageProductDetails', () => {
                this.fetchPackageProductDetails();
            });
        },
        methods : {
            selectProduct(){
                this.ProductSelectedDetails = [];
                for(let i = 0; i < this.ProductSelected.length; i++){
                    this.ProductSelectedDetails.push(this.ProductSelected);
                }
                // console.log(this.ProductSelectedDetails);
            },
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
            },
            fetchPackageProductDetails(){
//                fetch('/api/v1/product/Lists/products').then(response => response.json())
                fetch('/api/v1/product/Lists/' + this.data +'/list-package-product-details').then(response => response.json())
                    .then(response => {
                        this.Packages = response.data;

                        $('#kt_datatable').DataTable().destroy();
                        this.$nextTick(() =>
                        {
                            $('#kt_datatable').DataTable(
                                {
                                    responsive: true,
                                    pagingType: 'full_numbers',
                                    columnDefs: [
                                        { "width": "50px", "targets": 0 },
                                        { "width": "450px", "targets": 1 },
                                        { "width": "50px", "targets": 2 },
                                        { "width": "50px", "targets": 3 },
                                        { "width": "50px", "targets": 4 },
                                    ],
                                }
                            );
                        });

                    })
                    .catch(error => console.log(error))
            },
            updatePackage() {
                if((this.PackagesType.name !== '') && (this.PackagesType.description !== '') && (this.PackagesType.retail_price !== '') && (this.PackagesType.ss_retail_price !== ''))
                {
                    let currentObj = this;
                    const config = {
                        headers: {'content-type': 'multipart/form-data'}
                    }

                    let formData = new FormData();
                    formData.append("name", this.PackagesType.name);
                    formData.append("description", this.PackagesType.description);
                    formData.append("retail_price", this.PackagesType.retail_price);
                    formData.append("ss_retail_price", this.PackagesType.ss_retail_price);
                    formData.append("featured_image", this.PackagesType.featured_image);

                    var url = '/api/v1/product/Updates/' + this.data + '/update-package', method = 'post';

                    fetch(url, {
                        method: method,
                        body: formData,
                        config

                    }).then(async response => {
                        const data = await response.json();
                        this.package_id_created = data;
                        VueEvent.$emit('fetchPackage');
                        this.updatePackageProduct();
                    })
                }
            },
            updatePackageProduct() {

                var url = '/api/v1/product/Updates/'+ this.data +'/update-package-product', method = 'post';

                fetch(url, {
                    method: method,
                    body: JSON.stringify(this.ProductSelectedDetails),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then(async response => {
                    const data = await response.json();
                    VueEvent.$emit('fetchPackageProduct');

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
                        "timeOut": "3000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    };

                    toastr.success("Successfully updated the package.", "Package is Updated");
                    // setTimeout(function(){
                    //     window.location.href = '/list-package';
                    // },5000);
                    // return setTimeout();
                    if (!response.ok) {
                    }
                })
            }
        }
    }

</script>

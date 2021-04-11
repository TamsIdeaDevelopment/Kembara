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
                                        <span>1.</span>Product Details</h3>
                                    <div class="wizard-bar"></div>
                                </div>
                            </div>
                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-label">
                                    <h3 class="wizard-title">
                                        <span>2.</span>Price</h3>
                                    <div class="wizard-bar"></div>
                                </div>
                            </div>
                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-label">
                                    <h3 class="wizard-title">
                                        <span>3.</span>MOQ</h3>
                                    <div class="wizard-bar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center py-10 px-8 py-lg-12 px-lg-10 mt-n10">
                        <div class="col-xl-12 col-xxl-7">
                            <form class="form" id="kt_form" @submit.prevent="createProduct"  enctype="multipart/form-data">
                                <product-form-create></product-form-create>
                                <price-form-create></price-form-create>
                                <moq-form-create></moq-form-create>
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
    export default {
        data() {
            return {
                Products:{},
                ProductCategory:[],
                Roles: {
                    id: '',
                    name: '',
                    description: '',
                    label: '',
                    parent: '',
                    remarks: '',
                    created_at: '',
                    updated_at: '',
                    price: '',
                    ss_price:'',
                    moq: '',
                    product_id:'',
                },
                product_id:'',
            }
        },
        created(){
            this.fetchRole();
            this.fetchProductCategory();
        },
        methods : {
            fetchProductCategory(){
                axios.get('/api/v1/product/Lists/category-products')
                    .then(function (response) {
                        this.ProductCategory = response.data;
                        console.log(this.ProductCategory);
                    }.bind(this));
            },
            fetchRole(){
                fetch('/api/v1/roles/Lists/exclude-hq-role').then(response => response.json())
                    .then(response => {
                        this.Roles = response.data;
                    })
                    .catch(error => console.log(error))
            },
            createProduct() {
                let currentObj = this;
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }

                let formData = new FormData();
                formData.append("name", this.Products.name);
                formData.append("product_type_id", this.Products.product_type_id);
                formData.append("product_set", this.Products.product_set);
                formData.append("description", this.Products.description);
                formData.append("weight", this.Products.weight);
                formData.append("stock", this.Products.stock);
                formData.append("retail_price", this.Products.retail_price);
                formData.append("ss_retail_price", this.Products.ss_retail_price);
                formData.append("featured_image", this.Products.featured_image);

                var url = '/api/v1/product/Creates/create-product', method = 'post';

                fetch(url, {
                    method: method,
                    body: formData,
                    config

                }).then(async response => {
                    const data = await response.json();
                    this.product_id = data;

                    for(var $i = 0; $i<this.Roles.length;$i++)
                    {
                        this.Roles[$i].product_id = this.product_id;
                    }
                    this.createPriceAndMOQ();
                })
            },

            createPriceAndMOQ()
            {
                for(var $i = 0; $i<this.Roles.length;$i++)
                {
                    if(!this.Roles[$i].price)

                    this.Roles[$i].product_id = this.product_id;
                }
                var url = '/api/v1/product/Creates/create-price-product', method = 'post';

                fetch(url, {
                    method: method,
                    body: JSON.stringify( this.Roles),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then(async response => {
                    const data = await response.json();

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

                    toastr.success("Successfully Register Product.", "Product Created");
                    setTimeout(function(){
                        window.location.href = '/list-product';
                    },5000);
                    return setTimeout();
                    if (!response.ok) {
                    }
                })
            }
        }
    }

</script>

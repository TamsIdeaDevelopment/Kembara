<template>
    <div class="row ">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-custom">
                        <div class="card-header flex-wrap py-5">
                            <div class="card-title">
                                <h1 class="card-label">
                                    <span class="nav-icon mr-3">
                                        <i class="flaticon2-box text-primary"></i>
                                    </span>
                                    Product Details
                                </h1>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form @submit.prevent="UpdateProduct"  enctype="multipart/form-data">
                                        <div class="card-body   p-0 pl-0">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <div class="row" v-if="('name' in errors)">
                                                    <div class="col">
                                                        <label class="text-danger">{{errors['name']}}</label>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" v-model="$parent.Products.name" placeholder="Name"/>
                                            </div>
                                            <div class="form-group">
                                                <label>Category</label>
                                                <select class="form-control select2" style="width:100%" id="create-update-category" v-model="$parent.Products.product_type_id">
                                                    <option v-for="category in ProductCategory" :value="category.id">{{ category.name }}</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Product Set</label>
                                                <div class="row" v-if="('product_set' in errors)">
                                                    <div class="col">
                                                        <label class="text-danger">{{errors['product_set']}}</label>
                                                    </div>
                                                </div>
                                                <select class="form-control" style="width:100%" id="select-product-set" v-model="$parent.Products.product_set">
                                                    <option value="">Select</option>
                                                    <option value="Normal">Normal</option>
                                                    <option value="Special">Special</option>
                                                    <option value="Add-On">Add-On</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Description</label>
                                                <input type="text" class="form-control" v-model="$parent.Products.description" placeholder="Description"/>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="form-group">
                                                        <label>Weight (kg)</label>
                                                        <input type="text" class="form-control" v-model="$parent.Products.weight" placeholder="Weight"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="form-group">
                                                        <label>Semenanjung Retail</label>
                                                        <div class="row" v-if="('retail_price' in errors)">
                                                            <div class="col">
                                                                <label class="text-danger">{{errors['retail_price']}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text">RM</span></div>
                                                            <input type="text" class="form-control" v-model="$parent.Products.retail_price" placeholder="RM"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="form-group">
                                                        <label>Sabah & Sarawak Retail</label>
                                                        <div class="row" v-if="('ss_retail_price' in errors)">
                                                            <div class="col">
                                                                <label class="text-danger">{{errors['ss_retail_price']}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text">RM</span></div>
                                                            <input type="text" class="form-control" v-model="$parent.Products.ss_retail_price" placeholder="RM"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="form-group">
                                                        <label>Product Image</label>
                                                        <div></div>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="customFile" @change="selectFile"/>
                                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer pb-5 pr-0" style="display: flex; justify-content: flex-end">
                                            <button type="submit" class="btn btn-primary mt-n5">Save</button>
                                        </div>
                                    </form>
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
        data() {
            return {
                ProductCategory:[],
                errors: [],
            }
        },
        mounted () {
            $('#create-update-category').select2({
                placeholder: "Select",
                allowClear: true
            });
            $("#create-update-category").change(function(){
                this.$parent.Products.product_type_id= $("#create-update-category").val();
            }.bind(this));

            $('#select-product-set').select2({
                placeholder: 'Select',
                allowClear: true
            });
            $("#select-product-set").change(function(){
                this.$parent.Products.product_set= $("#select-product-set").val();
                console.log('set :' + this.$parent.Products.product_set)
            }.bind(this));
        },
        created(){
            this.fetchProductCategory();
        },
        methods : {
            fetchProductCategory(){
                axios.get('/api/v1/product/Lists/category-products')
                    .then(function (response) {
                        this.ProductCategory = response.data;
                    }.bind(this));
            },
            selectFile(event) {
                if(event.target.files.length === 1)
                {
                    this.$parent.Products.featured_image = event.target.files[0];
                }
            },
            UpdateProduct() {
                this.errors = [];
                if((this.$parent.Products.name !== '') && (this.$parent.Products.stock !== '') && (this.$parent.Products.retail_price !== '') && (this.$parent.Products.ss_retail_price !== '') && (this.$parent.Products.product_set !== ''))
                {
                    let currentObj = this;
                    const config = {
                        headers: { 'content-type': 'multipart/form-data' }
                    }

                    let formData = new FormData();
                    formData.append("name", this.$parent.Products.name);
                    formData.append("product_type_id", this.$parent.Products.product_type_id.id);
                    formData.append("product_set", this.$parent.Products.product_set);
                    formData.append("description", this.$parent.Products.description);
                    formData.append("weight", this.$parent.Products.weight);
                    formData.append("stock", this.$parent.Products.stock);
                    formData.append("retail_price", this.$parent.Products.retail_price);
                    formData.append("ss_retail_price", this.$parent.Products.ss_retail_price);
                    formData.append("featured_image", this.$parent.Products.featured_image);

                    var url = '/api/v1/product/Updates/'+ this.$parent.data +'/products', method = 'post';

                    fetch(url, {
                        method: method,
                        body: formData,
                        config

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

                        toastr.success("Successfully Update Product.", "Product Updated");
                    })
                }

                if(!this.$parent.Products.name)
                {
                    this.errors['name'] = "Please enter the product name"
                }
                if(!this.$parent.Products.stock)
                {
                    this.errors['stock'] = "Please enter the product stock"
                }
                if(!this.$parent.Products.retail_price)
                {
                    this.errors['retail_price'] = "Please enter the Semenanjung retail price"
                }
                if(!this.$parent.Products.ss_retail_price)
                {
                    this.errors['ss_retail_price'] = "Please enter the Sabah & Sarawak retail price"
                }
                if(!this.$parent.Products.product_set)
                {
                    this.errors['product_set'] = "Please select the product set"
                }
            },

        }
    }

</script>

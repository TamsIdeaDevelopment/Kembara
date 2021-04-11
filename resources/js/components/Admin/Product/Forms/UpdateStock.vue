<template>
    <div class="row ">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-custom">
                        <div class="card-header flex-wrap py-5">
                            <div class="card-title">
                                <h3 class="card-label">
                                    <span class="nav-icon mr-3">
                                        <i class="flaticon2-files-and-folders text-primary"></i>
                                    </span>
                                    Inventory
                                </h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form @submit.prevent="UpdateStock">
                                        <div class="card-body p-0 pl-0">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="form-group">
                                                        <label>Stock</label>
                                                        <div class="row" v-if="('stock' in errors)">
                                                            <div class="col">
                                                                <label class="text-danger">{{errors['stock']}}</label>
                                                            </div>
                                                        </div>
                                                        <input type="number" class="form-control" v-model="$parent.Products.stock" placeholder="Stock"/>
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
    export default{
        props: {},
        data(){
            return{
                errors: [],
            }
        },
        created() {
        },
        mounted () {},
        methods:
            {
                UpdateStock()
                {
                    this.errors = [];
                    if((this.$parent.Products.stock !== ''))
                    {
                        var url = '/api/v1/product/Updates/'+ this.$parent.data +'/products-stock', method = 'post';

                        fetch(url, {
                            method: method,
                            body: JSON.stringify(this.$parent.Products),
                            headers: {
                                'content-type': 'application/json'
                            }
                        }).then(async response => {
                            const data = await response.json();
                            VueEvent.$emit('fetchProduct');
                            VueEvent.$emit('fetchPriceAndMOQ');
                            VueEvent.$emit('fetchRole');

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
                    if(!this.$parent.Products.stock)
                    {
                        this.errors['stock'] = "Please enter the product stock"
                    }

                }
            }
    }


</script>

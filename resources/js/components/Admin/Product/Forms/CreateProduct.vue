<template>
    <div class="" data-wizard-type="step-content" data-wizard-state="current">
        <h4 class="mb-5 font-weight-bold text-dark">Register your new product</h4>
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" v-model="$parent.Products.name" placeholder="Name"/>
        </div>
        <div class="form-group">
            <label>Category</label>
            <select class="form-control select2" style="width:100%" id="create-select-category" v-model="$parent.Products.product_type_id">
                <option v-for="category in $parent.ProductCategory" :value="category.id">{{ category.name }}</option>
            </select>
        </div>
        <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control" v-model="$parent.Products.description" placeholder="Description"/>
        </div>
        <div class="form-group">
            <label>Product Set</label>
            <!--<div class="row" v-if="('product_set' in errors)">-->
                <!--<div class="col">-->
                    <!--<label class="text-danger">{{errors['product_set']}}</label>-->
                <!--</div>-->
            <!--</div>-->
            <select class="form-control" style="width:100%" id="select-product-set" v-model="$parent.Products.product_set">
                <option value="">Select</option>
                <option value="Normal">Normal</option>
                <option value="Special">Special</option>
                <option value="Add-On">Add-On</option>
            </select>
        </div>
        <!--<div class="form-group">-->
            <!--<label>Package Item (Starter Pack)</label>-->
            <!--<input type="text" class="form-control" v-model="$parent.Products.starter" placeholder="Package Item (Starter Pack)"/>-->
        <!--</div>-->
        <div class="row">
            <div class="col-xl-6">
                <div class="form-group">
                    <label>Weight (kg)</label>
                    <input type="text" class="form-control" v-model="$parent.Products.weight" placeholder="Weight"/>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="form-group">
                    <label>Stock</label>
                    <input type="number" class="form-control" v-model="$parent.Products.stock" placeholder="Stock"/>
                </div>
            </div>
        </div>
        <div class="row">
        <!--<div class="col-xl-6">-->
        <!--<div class="form-group">-->
        <!--<label>Stock Alert</label>-->
        <!--<input type="text" class="form-control" name="address2" placeholder="Stock Alert"/>-->
        <!--</div>-->
        <!--</div>-->
        <div class="col-xl-12">
            <div class="form-group">
                <label>Semenanjung Retail</label>
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
                    <small><strong>*Max size: 2MB</strong></small>
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
            }
        },
        created() {

        },
        mounted () {
            $('#create-select-category').select2({
                placeholder: "Select",
                allowClear: true
            });
            $("#create-select-category").change(function(){
                this.$parent.Products.product_type_id= $("#create-select-category").val();
                //console.log(this.Products)
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
        methods: {
            selectFile(event) {
                this.$parent.Products.featured_image = event.target.files[0];
                //console.log(this.$parent.Products);
            },
        }
    }


</script>

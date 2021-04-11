<template>
    <div class="" data-wizard-type="step-content" data-wizard-state="current">
        <h4 class="mb-5 font-weight-bold text-dark">View your current package</h4>
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" placeholder="Name" v-model="$parent.PackagesType.name" disabled/>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea cols="30" rows="10" class="form-control" v-model="$parent.PackagesType.description" placeholder="Description" disabled></textarea>
        </div>
        <!--<div class="form-group">-->
        <!--<label>Package Item (Starter Pack)</label>-->
        <!--<input type="text" class="form-control" v-model="$parent.Products.starter" placeholder="Package Item (Starter Pack)"/>-->
        <!--</div>-->
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
                        <input type="text" class="form-control" placeholder="RM" v-model="$parent.PackagesType.retail_price" disabled/>
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
                        <input type="text" class="form-control" placeholder="RM" v-model="$parent.PackagesType.ss_retail_price" disabled/>
                    </div>
                </div>
            </div>
        </div>
<!--        <div class="row">-->
<!--            <div class="col-xl-12">-->
<!--                <div class="form-group">-->
<!--                    <label>Package Image</label>-->
<!--                    <div></div>-->
<!--                    <div class="custom-file">-->
<!--                        <input type="file" class="custom-file-input" id="customFile" @change="selectFile"/>-->
<!--                        <label class="custom-file-label" for="customFile">Choose file</label>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
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
        },
        methods: {
            selectFile(event) {
                if(event.target.files.length === 1)
                {
                    this.$parent.Products.featured_image = event.target.files[0];
                }
            },
        }
    }


</script>

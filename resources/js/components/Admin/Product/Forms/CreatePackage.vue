<template>
    <div class="" data-wizard-type="step-content" data-wizard-state="current">
        <h4 class="mb-5 font-weight-bold text-dark">Register your new package</h4>
        <div class="form-group">
            <label>Name</label>
            <div class="row" v-if="('name' in $parent.errors)">
                <div class="col">
                    <label class="text-danger">{{$parent.errors['name']}}</label>
                </div>
            </div>
            <input type="text" class="form-control" placeholder="Name" v-model="$parent.PackagesType.name"/>
        </div>
        <div class="form-group">
            <label>Description</label>
            <div class="row" v-if="('description' in $parent.errors)">
                <div class="col">
                    <label class="text-danger">{{$parent.errors['description']}}</label>
                </div>
            </div>
            <textarea cols="30" rows="10" class="form-control" v-model="$parent.PackagesType.description" placeholder="Description"></textarea>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="form-group">
                    <label>Semenanjung Retail</label>
                    <div class="row" v-if="('retail_price' in $parent.errors)">
                        <div class="col">
                            <label class="text-danger">{{$parent.errors['retail_price']}}</label>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">RM</span></div>
                        <input type="number" class="form-control" placeholder="RM" v-model="$parent.PackagesType.retail_price"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="form-group">
                    <label>Sabah & Sarawak Retail</label>
                    <div class="row" v-if="('ss_retail_price' in $parent.errors)">
                        <div class="col">
                            <label class="text-danger">{{$parent.errors['ss_retail_price']}}</label>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">RM</span></div>
                        <input type="number" class="form-control" placeholder="RM" v-model="$parent.PackagesType.ss_retail_price"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="form-group">
                    <label>Package Image</label>
                    <div></div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" @change="selectFile"/>
                        <label class="custom-file-label" for="customFile">Choose file</label>
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
            }
        },
        created() {

        },
        mounted () {
        },
        methods: {
            selectFile(event) {
                this.$parent.PackagesType.featured_image = event.target.files[0];
                // console.log(this.$parent.PackagesType);
            },
        }
    }


</script>

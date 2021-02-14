<template>
    <div class="" data-wizard-type="step-content">
        <div class="card card-custom gutter-b">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder font-size-h3 text-primary">Delivery Address</span>
                </h3>
            </div>
            <div class="card-body">
                <h6 class="font-weight-bolder mt-n5">Setup your address</h6>
                <div class="row">
                    <div class="col-lg-12">
                        <h6 class="font-weight-bolder mt-5">Delivery Details</h6>
                        <div class="form-group mt-8">
                            <label>Name</label>
                            <div class="row" v-if="('name' in $parent.errors)">
                                <div class="col">
                                    <label class="text-danger">{{$parent.errors['name']}}</label>
                                </div>
                            </div>
                            <input type="text" class="form-control  form-control-lg" v-model="$parent.DeliveryDetails.name"  placeholder="Name"/>
                        </div>
                        <div class="form-group">
                            <label>Phone No</label>
                            <div class="row" v-if="('phone_no' in $parent.errors)">
                                <div class="col">
                                    <label class="text-danger">{{$parent.errors['phone_no']}}</label>
                                </div>
                            </div>
                            <input type="text" class="form-control form-control-lg" v-model="$parent.DeliveryDetails.phone_no"  placeholder="Phone"/>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <div class="row" v-if="('address_1' in $parent.errors)">
                                <div class="col">
                                    <label class="text-danger">{{$parent.errors['address_1']}}</label>
                                </div>
                            </div>
                            <input type="text" class="form-control form-control-lg" v-model="$parent.DeliveryDetails.address_1" placeholder="Address"/>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label>Postcode</label>
                                    <div class="row" v-if="('postcode' in $parent.errors)">
                                        <div class="col">
                                            <label class="text-danger">{{$parent.errors['postcode']}}</label>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" v-model="$parent.DeliveryDetails.postcode" placeholder="Postcode"/>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label>City</label>
                                    <div class="row" v-if="('city' in $parent.errors)">
                                        <div class="col">
                                            <label class="text-danger">{{$parent.errors['city']}}</label>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" v-model="$parent.DeliveryDetails.city" placeholder="City" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label>State</label>
                                    <div class="row" v-if="('state' in $parent.errors)">
                                        <div class="col">
                                            <label class="text-danger">{{$parent.errors['state']}}</label>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" v-model="$parent.DeliveryDetails.state" placeholder="State"/>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label>Country</label>
                                    <div class="row" v-if="('country' in $parent.errors)">
                                        <div class="col">
                                            <label class="text-danger">{{$parent.errors['country']}}</label>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" v-model="$parent.DeliveryDetails.country" placeholder="Country" />
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
        props: [],
        data(){
            return{

            }
        },
        created() {

        },
        mounted() {},
        methods: {
            sameAddress() {
                this.$parent.DeliveryDetails = this.$parent.BillingDetails;
            },
        }
    }


</script>
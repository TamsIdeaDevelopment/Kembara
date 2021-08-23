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
                <div class="mt-10">
                    <div class="radio-inline">
                        <label class="radio radio-square">
                            <input type="radio" :checked="$parent.delivery_type =='0'" v-model="$parent.delivery_type" :value="'0'" @change="ifSelfPickup()"/>
                            <span></span>
                            Delivery
                        </label>
                        <label class="radio radio-square">
                            <input type="radio" :checked="$parent.delivery_type =='1'"  v-model="$parent.delivery_type" :value="'1'" @change="ifSelfPickup()"/>
                            <span></span>
                            Self Pickup
                        </label>
                    </div>
                    <div v-show="$parent.delivery_type == 0">
                        <div class="form-group mt-8">
                            <div class="checkbox-inline">
                                <label class="checkbox checkbox-square"  @change="sameAddress($parent.isSameDeliveryDetails)">
                                    <input type="checkbox"/>
                                    <span></span>
                                    Use this billing address as my shipping address
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <h6 class="font-weight-bolder mt-5">Billing Details</h6>
                                <div class="form-group mt-8">
                                    <label>Name</label>
                                    <input type="text" class="form-control form-control-solid form-control-lg" v-model="$parent.BillingDetails.name"  placeholder="Name" disabled/>
                                </div>
                                <div class="form-group">
                                    <label>Phone No</label>
                                    <input type="text" class="form-control form-control-solid form-control-lg" v-model="$parent.BillingDetails.phone_no"  placeholder="Phone"  disabled/>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control form-control-solid form-control-lg" v-model="$parent.BillingDetails.address_1" placeholder="Address"  disabled/>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label>Postcode</label>
                                            <input type="text" class="form-control form-control-solid form-control-lg" v-model="$parent.BillingDetails.postcode" placeholder="Postcode"  disabled/>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input type="text" class="form-control form-control-solid form-control-lg" v-model="$parent.BillingDetails.city" placeholder="City"  disabled />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label>State</label>
                                            <input type="text" class="form-control form-control-solid form-control-lg" v-model="$parent.BillingDetails.state" placeholder="State"  disabled/>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <input type="text" class="form-control form-control-solid form-control-lg" v-model="$parent.BillingDetails.country" placeholder="Country"  disabled />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
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
                                            <select class="form-control" style="width:100%" id="update-select-state" v-model="$parent.DeliveryDetails.state">
                                                <option value="" disabled>State</option>
                                                <option  v-for="State in States" :value="State.name">{{ State.name }}</option>
                                            </select>
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
        </div>
    </div>
</template>
<script>
    export default{
        props: [],
        data(){
            return{
                isSeller:'',
                tempCount:0,
                States: [],
            }
        },
        created() {
            this.fetchAgentDetails();
            this.getStateName();
        },
        mounted() {
            $('#select-not-HQ-state').select2({
                placeholder: 'Select',
                allowClear: true
            });

            $("#select-not-HQ-state").change(function(){
                this.$parent.DeliveryDetails.state= $("#select-not-HQ-state").val();
                console.log(this.$parent.DeliveryDetails.state);
            }.bind(this));

            // $("#update-select-state").change(function(){
            //     this.$parent.DeliveryDetails.state = $("#update-select-state").val();
            // }.bind(this));

            // $("#select-state").select2({
            //     placeholder: 'State',
            //     allowClear: true
            // });
            $("#update-select-state").change(function(){
                this.$parent.DeliveryDetails.state= $("#update-select-state").val();
                this.tempCount = 0;
                this.tempCount = this.$parent.Count / 10;
                this.tempCount = parseInt(this.tempCount);

                console.log(this.$parent.DeliveryDetails.state);

                this.$parent.Totals = this.$parent.Totals - this.$parent.total_delivery_fee;
                if(this.$parent.DeliveryDetails.state =='Sabah' || this.$parent.DeliveryDetails.state =='Sarawak' || this.$parent.DeliveryDetails.state =='Labuan')
                {
                    this.$parent.delivery_fee = 30.90;

                    if(this.isSeller == 1)
                    {
                        this.$parent.total_delivery_fee = this.$parent.delivery_fee * this.tempCount;
                        this.$parent.total_delivery_fee = parseFloat((this.$parent.total_delivery_fee).toFixed(2));

                        this.$parent.Totals = this.$parent.Totals +this.$parent.total_delivery_fee;

                    }
                }
                else
                {

                    this.$parent.delivery_fee = 6.90;

                    if(this.isSeller == 1)
                    {
                        this.$parent.total_delivery_fee = this.$parent.delivery_fee * this.tempCount;
                        this.$parent.total_delivery_fee = parseFloat((this.$parent.total_delivery_fee).toFixed(2));
                        this.$parent.Totals = this.$parent.Totals +this.$parent.total_delivery_fee;
                    }
                }
                console.log('Total: ' + this.$parent.Totals );
                console.log('Shipping: ' + this.$parent.total_delivery_fee );
            }.bind(this));
        },
        methods: {
            getStateName(){
                axios.get('/api/v1/state/Lists/list-state')
                    .then(function (response) {
                        this.States = response.data;
                    }.bind(this));
                console.log(this.States)
            },
            fetchAgentDetails(){
                fetch('/api/v1/team/Lists/' + this.$parent.data +'/agent-info').then(response => response.json())
                    .then(response => {
                        this.isSeller = response.data.leader_id.HQ;
                        console.log(this.isSeller);

                    })
                    .catch(error => console.log(error))
            },
            ifSelfPickup() {
                if(this.$parent.delivery_type == 0)
                {
                    this.$parent.Totals= this.$parent.Totals + this.$parent.total_delivery_fee;
                    console.log('Total :' + this.$parent.Totals);
                }
                if(this.$parent.delivery_type == 1)
                {
                    this.$parent.Totals= this.$parent.Totals - this.$parent.total_delivery_fee;
                    console.log('Total :' + this.$parent.Totals);
                }
            },
            sameAddress(data) {
                if (!data)
                {
                    this.$parent.DeliveryDetails = this.$parent.BillingDetails;
                }
                if(data)
                {
                    this.$parent.DeliveryDetails = [];
                }
                this.$parent.isSameDeliveryDetails = !this.$parent.isSameDeliveryDetails;

                this.tempCount = 0;
                this.tempCount = this.$parent.Count / 10;
                this.tempCount = parseInt(this.tempCount);


                this.$parent.Totals = this.$parent.Totals - this.$parent.total_delivery_fee;
                if(this.$parent.DeliveryDetails.state =='Sabah' || this.$parent.DeliveryDetails.state =='Sarawak' || this.$parent.DeliveryDetails.state =='Labuan')
                {
                    this.$parent.delivery_fee = 30.90;

                    {
                        this.$parent.total_delivery_fee = this.$parent.delivery_fee * this.tempCount;
                        this.$parent.total_delivery_fee = parseFloat((this.$parent.total_delivery_fee).toFixed(2));

                        this.$parent.Totals = this.$parent.Totals +this.$parent.total_delivery_fee;

                    }
                }
                else
                {

                    this.$parent.delivery_fee = 6.90;

                    {
                        this.$parent.total_delivery_fee = this.$parent.delivery_fee * this.tempCount;
                        this.$parent.total_delivery_fee = parseFloat((this.$parent.total_delivery_fee).toFixed(2));
                        this.$parent.Totals = this.$parent.Totals +this.$parent.total_delivery_fee;
                    }
                }
                console.log('Total: ' + this.$parent.Totals );
                console.log('Shipping: ' + this.$parent.total_delivery_fee );
            },
        }
    }


</script>

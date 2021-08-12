<template>
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid">
            <div class="row" v-if="isSpinner">
                <div class="col-lg-12 d-flex justify-content-center">
                    <div class="spinner spinner-success d-flex align-items-center">
                    </div>
                </div>
            </div>
            <!--<agent-dashboard-chart :data="data"></agent-dashboard-chart>-->
            <div class="row mt-5" v-if="!isSpinner">
                <div class="col-lg-12 col-xxl-12">
                    <div class="wizard wizard-4" id="kt_wizard_v3" data-wizard-state="step-first" data-wizard-clickable="true">
                        <div class="wizard-nav">
                            <div class="wizard-steps">
                                <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                    <div class="wizard-wrapper">
                                        <div class="wizard-number">1</div>
                                        <div class="wizard-label">
                                            <div class="wizard-title">Shopping Cart</div>
                                            <div class="wizard-desc">Confirm Your Cart</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-step" data-wizard-type="step" v-if="CustomerCartStatus">
                                    <div class="wizard-wrapper">
                                        <div class="wizard-number">2</div>
                                        <div class="wizard-label">
                                            <div class="wizard-title">Delivery Address</div>
                                            <div class="wizard-desc">Setup Your Address</div>
                                            <span class="card-label font-weight-bolder text-danger" v-if="('all' in errors)">{{errors['all']}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-step" v-if="!CustomerCartStatus">
                                    <div class="wizard-wrapper">
                                        <div class="wizard-number">2</div>
                                        <div class="wizard-label">
                                            <div class="wizard-title text-danger">Complete your cart</div>
                                            <div class="wizard-desc">Setup Your Address</div>
                                            <span class="card-label font-weight-bolder text-danger" v-if="('all' in errors)">{{errors['all']}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-step" data-wizard-type="step"  v-show="CustomerCartStatus">
                                    <div class="wizard-wrapper">
                                        <div class="wizard-number">3</div>
                                        <div class="wizard-label">
                                            <div class="wizard-title">Completed</div>
                                            <div class="wizard-desc">Review and Submit</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-step" data-wizard-type="step" v-show="!CustomerCartStatus">
                                    <div class="wizard-wrapper">
                                        <div class="wizard-number">3</div>
                                        <div class="wizard-label">
                                            <div class="wizard-title text-danger">Complete your cart</div>
                                            <div class="wizard-desc">Review and Submit</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-step">

                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-xl-12 col-xxl-12">
                                <!--<form class="form" id="kt_form" @submit.prevent="CreateTestOrder"  enctype="multipart/form-data">-->
                                <form class="form" id="kt_form" @submit.prevent="checkValidation"  enctype="multipart/form-data">
                                    <agent-customer-cart-elements></agent-customer-cart-elements>
                                    <agent-customer-delivery-address-elements></agent-customer-delivery-address-elements>
                                    <agent-customer-review-submit-elements></agent-customer-review-submit-elements>
                                    <div class="d-flex justify-content-between border-top mt-3 pt-3">
                                        <div class="mr-2">
                                            <button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">Previous</button>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" data-wizard-state="action-submit" data-wizard-type="action-submit">Order</button>
                                            <button type="button" v-show="CustomerCartStatus" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-next">Next</button>
                                            <button type="button" v-show="!CustomerCartStatus" disabled class="btn btn-secondary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-next">Next</button>
                                        </div>
                                    </div>
                                </form>
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
        props: ['data'],
        data() {
            return {
                errors:[],
                Carts: [],
                Count: 0,
                Totals: 0,
                minimum_order:0,
                AgentDetails:[],
                BillingDetails:[],
                DeliveryDetails:[],
                seller_id:'',
                IsSellerHQ:'',
                remarks:'',
                payment_selected:'',
                proof_of_payment_image:'',
                Orders: {
                    Totals:0,
                    Carts:[],
                    details:{
                        HQ : '',
                        seller_id : '',
                        buyer_id : '',
                        total : '',
                        paid_at : '',
                        total_paid:'',
                        deliver_to:'',
                        deliver_to_phone_no:'',
                        shipping_address : '',
                        city : '',
                        state : '',
                        country : '',
                        post_code : '',
                        tracking_number : '',
                        remarks : '',
                    }
                },
                paid_at : '',
                total_paid : '',
                Stock:[],
                CustomerCart:[],
                CustomerCartStatus: false,
                Discount: 0,
                TempDiscount: 0,
                TempTotal: 0,
                DeliveryFees:0,
                TempDeliveryFees:0,
                isSpinner: false,
            }
        },
        mounted() {},
        watch: {
            data() {}
        },
        created(){
            this.fetchProduct();
        },
        methods: {
            fetchProduct(){
                fetch('/api/v1/product/Lists/' + this.data.id +'/stock-list-agent-for-customer').then(response => response.json())
                    .then(response => {
                        this.Stock = response.data;
                    })
                    .catch(error => console.log(error))
            },
            checkValidation(){
                this.errors = [];
                if((this.DeliveryDetails.name) && (this.DeliveryDetails.phone_no) && (this.DeliveryDetails.address_1) && (this.DeliveryDetails.postcode) && (this.DeliveryDetails.city) && (this.DeliveryDetails.state) && (this.DeliveryDetails.country) && (this.DeliveryDetails.country))
                {
                    this.CreateOrder();
                }
                if(!this.DeliveryDetails.name)
                {
                    this.errors['name'] = "Please insert the name"
                }
                if(!this.DeliveryDetails.phone_no)
                {
                    this.errors['phone_no'] = "Please insert the phone no"

                }
                if(!this.DeliveryDetails.address_1)
                {
                    this.errors['address_1'] = "Please insert the address"
                }
                if(!this.DeliveryDetails.postcode)
                {
                    this.errors['postcode'] = "Please insert the postcode"
                }
                if(!this.DeliveryDetails.city)
                {
                    this.errors['city'] = "Please insert the city"
                }
                if(!this.DeliveryDetails.state)
                {
                    this.errors['state'] = "Please insert the state"
                }
                if(!this.DeliveryDetails.country)
                {
                    this.errors['country'] = "Please insert the country"
                }

                if(!this.DeliveryDetails.name || !this.DeliveryDetails.phone_no || !this.DeliveryDetails.address_1 || !this.DeliveryDetails.postcode || !this.DeliveryDetails.city || !this.DeliveryDetails.state || !this.DeliveryDetails.country || !this.DeliveryDetails.country)
                {
                    this.errors['all'] = "Please complete the form"

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
                    toastr.error("Please complete the delivery details", "Failed");
                }



            },
            CreateOrder()
            {
                this.isSpinner = !this.isSpinner;

                this.Orders.Carts = this.CustomerCart;
                this.Orders.details.HQ = 0;
                this.Orders.details.seller_id = this.data.id;
                this.Orders.details.buyer_id = this.data.id;
                this.Orders.details.delivery_fees = this.DeliveryFees;
                this.Orders.details.total = this.Totals;
                this.Orders.details.total_paid = this.Totals;
                this.Orders.details.deliver_to = this.DeliveryDetails.name;
                this.Orders.details.deliver_to_phone_no = this.DeliveryDetails.phone_no;
                this.Orders.details.shipping_address = this.DeliveryDetails.address_1;
                this.Orders.details.city = this.DeliveryDetails.city;
                this.Orders.details.state = this.DeliveryDetails.state;
                this.Orders.details.country = this.DeliveryDetails.country;
                this.Orders.details.postcode = this.DeliveryDetails.postcode;


                let currentObj = this;
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }

                let formData = new FormData();
                formData.append("order", JSON.stringify(this.Orders));
                let vm= this;
                axios.post('/api/v1/Customer/Creates/create-order', formData, config)
                    .then(function (data) {
                        console.log(data.data.redirect);
                        window.location = data.data.redirect;
                    })
                    .catch(function (error) {
                        currentObj.output = error;
                    });
            }
        }

    }

</script>

<template>
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid">
            <div class="row" v-if="isSpinner">
                <div class="col-lg-12 d-flex justify-content-center">
                    <div class="spinner spinner-success d-flex align-items-center">
                    </div>
                </div>
            </div>
            <div class="row" v-if="!isSpinner">
                <div class="col-lg-12">
                    <div class="flex-row-fluid ml-lg-8">
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
                                    <div class="wizard-step" data-wizard-type="step"  v-show="CartStatus">
                                        <div class="wizard-wrapper">
                                            <div class="wizard-number">2</div>
                                            <div class="wizard-label">
                                                <div class="wizard-title">Delivery Address</div>
                                                <div class="wizard-desc">Setup Your Address</div>
                                                <span class="card-label font-weight-bolder text-danger" v-if="('all' in errors)">{{errors['all']}}</span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="wizard-step" v-show="!CartStatus">
                                        <div class="wizard-wrapper">
                                            <div class="wizard-number">2</div>
                                            <div class="wizard-label">
                                                <div class="wizard-title text-danger">Complete your cart</div>
                                                <div class="wizard-desc">Setup Your Address</div>
                                                <span class="card-label font-weight-bolder text-danger" v-if="('all' in errors)">{{errors['all']}}</span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="wizard-step" data-wizard-type="step" v-show="CartStatus">
                                        <div class="wizard-wrapper">
                                            <div class="wizard-number">3</div>
                                            <div class="wizard-label">
                                                <div class="wizard-title">Setup Payment</div>
                                                <div class="wizard-desc">Choose Payment Method</div>
                                                <span class="card-label font-weight-bolder text-danger" v-if="('payment_error' in errors)">{{errors['payment_error']}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wizard-step" v-show="!CartStatus">
                                        <div class="wizard-wrapper">
                                            <div class="wizard-number">3</div>
                                            <div class="wizard-label">
                                                <div class="wizard-title text-danger">Complete your cart</div>
                                                <div class="wizard-desc">Choose Payment Method</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wizard-step" data-wizard-type="step" v-show="CartStatus">
                                        <div class="wizard-wrapper">
                                            <div class="wizard-number">4</div>
                                            <div class="wizard-label">
                                                <div class="wizard-title">Completed</div>
                                                <div class="wizard-desc">Review and Submit</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wizard-step" v-show="!CartStatus">
                                        <div class="wizard-wrapper">
                                            <div class="wizard-number">4</div>
                                            <div class="wizard-label">
                                                <div class="wizard-title text-danger">Complete your cart</div>
                                                <div class="wizard-desc">Review and Submit</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-xl-12 col-xxl-12">
                                    <!--<form class="form" id="kt_form" @submit.prevent="CreateTestOrder"  enctype="multipart/form-data">-->
                                    <form class="form" id="kt_form" @submit.prevent="checkValidation"  enctype="multipart/form-data">
                                        <agent-cart-elements :data="IsSellerHQ"></agent-cart-elements>
                                        <agent-cart-delivery-address-elements></agent-cart-delivery-address-elements>
                                        <agent-cart-payment-method-elements></agent-cart-payment-method-elements>
                                        <agent-cart-review-submit-elements></agent-cart-review-submit-elements>
                                        <div class="d-flex justify-content-between border-top mt-3 pt-3">
                                            <div class="mr-2">
                                                <button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">Previous</button>
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" data-wizard-state="action-submit" data-wizard-type="action-submit">Order</button>
                                                <button type="button" v-show="CartStatus === true" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-next">Next</button>
                                                <button type="button" v-show="CartStatus === false" disabled class="btn btn-secondary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-next">Next</button>
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
    </div>
</template>
<script>
    export default {
        props: ['data'],
        data() {
            return {
                errors:[],
                Carts: [],
                Count: [],
                Totals: [],
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
                    delivery_type:'',
                    payment_methods:'',
                    proof_of_payment:'',
                    point:0,
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
                point: 0,
                paid_at : '',
                total_paid : '',
                SellerDetails:[],
                delivery_type:0,
                delivery_fee: 6.90,
                total_delivery_fee:0,
                CartStatus: false,
                TotalMOQNormal:0,
                TotalMOQSpecial:0,
                TotalMOQAddOn:0,
                TotalItems:0,
                CountNormal: [],
                CountSpecial: [],
                CountAddOn: [],
                TotalNormal: 0,
                isSpinner: false,
            }
        },
        mounted() {

        },
        watch: {
            data() {}
        },
        created(){

            this.fetchAgentDetails();
        },
        methods: {
            fetchAgentDetails(){
                fetch('/api/v1/team/Lists/' + this.data +'/agent-info').then(response => response.json())
                    .then(response => {
                        this.AgentDetails = response.data;
                        this.BillingDetails = response.data.user_id;
                        this.seller_id = response.data.leader_id.user_id;
                        this.fetchSellerDetails();

                    })
                    .catch(error => console.log(error))
            },
            fetchSellerDetails(){
                fetch('/api/v1/team/Lists/' + this.seller_id +'/agent-info').then(response => response.json())
                    .then(response => {
                        this.IsSellerHQ = response.data.HQ;
                        this.SellerDetails = response.data.user_id;
//                        console.log(this.IsSellerHQ);
                    })
                    .catch(error => console.log(error))
            },
            checkValidation(){
                this.errors = [];
                if(this.IsSellerHQ == 0)
                {
                    this.payment_selected = 2;
                }
                if(this.delivery_type == 0)
                {
                    if((this.DeliveryDetails.name) && (this.DeliveryDetails.phone_no) && (this.DeliveryDetails.address_1) && (this.DeliveryDetails.postcode) && (this.DeliveryDetails.city) && (this.DeliveryDetails.state) && (this.DeliveryDetails.country) && (this.DeliveryDetails.country) && (this.payment_selected))
                    {
                        // if(this.payment_selected)
                        // {
                        //     this.CreateOrder();
                        // }
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

                    if(!this.payment_selected)
                    {
                        this.errors['payment'] = "Please select the payment";
                        this.errors['payment_error'] = "Please select the payment"
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
                        toastr.error("Please choose the payment", "Failed");
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
                        toastr.error("Please complete the details", "Failed");
                    }
                }
                if(this.delivery_type == 1)
                {
                    if(this.payment_selected)
                    {
                        this.CreateOrder();
                    }
                    if(!this.payment_selected)
                    {
                        this.errors['payment'] = "Please select the payment"

                        this.errors['payment_error'] = "Please choose the payment"

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
                        toastr.error("Please choose the payment", "Failed");
                    }
                }
            },
            CreateOrder()
            {
                this.isSpinner = !this.isSpinner;

                // alert(this.payment_selected);
                if(this.payment_selected == 2)
                {
                    this.Orders.details.paid_at = this.paid_at;
                    this.Orders.details.total_paid = this.total_paid;
                }
                this.Orders.delivery_type=this.delivery_type;
                this.Orders.delivery_fees=this.total_delivery_fee;
                this.Orders.payment_methods=this.payment_selected;
                this.Orders.proof_of_payment=this.proof_of_payment_image;
                this.Orders.point=this.point;

                this.Orders.Carts = this.Carts;
                this.Orders.details.HQ = this.IsSellerHQ;
                this.Orders.details.seller_id = this.seller_id;
                this.Orders.details.buyer_id = this.BillingDetails.id;
                this.Orders.details.total = this.Totals;
                this.Orders.details.deliver_to = this.DeliveryDetails.name;
                this.Orders.details.deliver_to_phone_no = this.DeliveryDetails.phone_no;
                this.Orders.details.shipping_address = this.DeliveryDetails.address_1;
                this.Orders.details.city = this.DeliveryDetails.city;
                this.Orders.details.state = this.DeliveryDetails.state;
                this.Orders.details.country = this.DeliveryDetails.country;
                this.Orders.details.postcode = this.DeliveryDetails.postcode;
                this.Orders.details.remarks = this.remarks;


                let currentObj = this;
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }

                let formData = new FormData();
                formData.append("order", JSON.stringify(this.Orders));
                formData.append("proof_of_payment", this.proof_of_payment_image);
                let vm= this;
                axios.post('/api/v1/orders/HQ/Creates/create-order', formData, config)
                    .then(function (data) {
                        console.log(data.data.redirect);
                        window.location = data.data.redirect;
                    })
                    .catch(function (error) {
                        currentObj.output = error;
                    });

               // var url = '/api/v1/orders/HQ/Creates/create-order', method = 'post';
               //
               // fetch(url, {
               //     method: method,
               //     body: JSON.stringify(this.Orders),
               //     headers: {
               //         'content-type': 'application/json'
               //     }
               // }).then(async response => {
//                    const data = await response.json();
//                    window.location = data.redirect;
//                    toastr.options = {
//                        "closeButton": true,
//                        "debug": false,
//                        "newestOnTop": false,
//                        "progressBar": false,
//                        "positionClass": "toast-top-right",
//                        "preventDuplicates": false,
//                        "onclick": null,
//                        "showDuration": "300",
//                        "hideDuration": "1000",
//                        "timeOut": "5000",
//                        "extendedTimeOut": "1000",
//                        "showEasing": "swing",
//                        "hideEasing": "linear",
//                        "showMethod": "fadeIn",
//                        "hideMethod": "fadeOut"
//                    };
//
//                    toastr.success("Successfully Place The Order", "Order Created");
//                    if (!response.ok) {
//                    }
//                })
            }
        }

    }

</script>

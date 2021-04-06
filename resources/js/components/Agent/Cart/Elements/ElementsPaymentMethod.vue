<template>
    <div class="" data-wizard-type="step-content">
        <div class="card card-custom gutter-b">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder font-size-h3 text-primary">Payment Method</span>
                </h3>
            </div>
            <div class="card-body">
                <h6 class="font-weight-bolder  mt-n5">Choose Payment Method</h6>
                <div v-show="$parent.IsSellerHQ ==1">
                    <div class="form-group mt-8">
                        <label>Choose Payment</label>
                        <div class="row" v-if="('payment' in $parent.errors)">
                            <div class="col">
                                <label class="text-danger">{{$parent.errors['payment']}}</label>
                            </div>
                        </div>
                        <select class="form-control" style="width:100%" id="select-payment-methods" v-model="$parent.payment_selected">
                            <option value="">Select</option>
                            <!--<option value="1">Toyyibpay</option>-->
                            <!--<option value="2">Bank Transfer</option>-->
                            <option value="3" selected="">Billplz</option>
                            <!--<option value="4">SenangPay (Credit Card)</option>-->
                        </select>
                    </div>
                    <div  v-if="isBankTransfer">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4 col-xxl-2 justify-content-center">
                                    <div style="width: 200px; height: 200px">
                                        <img v-if="$parent.SellerDetails.bank_name =='CIMB'" style="width: 100%;" class="mt-20 pb-0" src="assets/bank/cimb.png">
                                        <img v-if="$parent.SellerDetails.bank_name =='Hong Leong'" style="width: 100%;" class="mt-20 pb-0" src="assets/bank/hongleong.png">
                                        <img v-if="$parent.SellerDetails.bank_name =='HSBC'" style="width: 100%;" class="mt-5 pb-0" src="assets/bank/hsbc.png">
                                        <img v-if="$parent.SellerDetails.bank_name =='Maybank'" style="width: 110%;" class="mt-5 pb-0" src="assets/bank/maybank.png">
                                        <img v-if="$parent.SellerDetails.bank_name =='Public Bank'" style="width: 100%;" class="mt-5 pb-0" src="assets/bank/public.png">
                                        <img v-if="$parent.SellerDetails.bank_name =='RHB'" style="width: 100%;" class="mt-20 pb-0" src="assets/bank/rhb.png">
                                        <img v-if="$parent.SellerDetails.bank_name =='Affin Bank'" style="width: 100%;" class="mt-5 pb-0" src="assets/bank/affin.png">
                                        <img v-if="$parent.SellerDetails.bank_name =='Alliance Bank'" style="width: 100%;" class="mt-10 pb-0" src="assets/bank/alliance.png">
                                        <img v-if="$parent.SellerDetails.bank_name =='AM Bank'" style="width: 100%;" class="mt-20 pb-0" src="assets/bank/ambank.png">
                                        <img v-if="$parent.SellerDetails.bank_name =='Bank Islam'" style="width: 100%;" class="mt-20 pb-0" src="assets/bank/bankislam.png">
                                        <img v-if="$parent.SellerDetails.bank_name =='Bank Rakyat'" style="width: 60%;" class="mt-20 pb-0" src="assets/bank/bankrakyat.png">
                                        <img v-if="$parent.SellerDetails.bank_name =='BSN'" style="width: 100%;" class="mt-20 pb-0" src="assets/bank/bsn.png">
                                        <img v-if="$parent.SellerDetails.bank_name =='Bank Muamalat'" style="width: 100%;" class="mt-20 pb-0" src="assets/bank/muamalat.png">
                                        <img v-if="$parent.SellerDetails.bank_name =='OCBC Bank'" style="width: 100%;" class="mt-20 pb-0" src="assets/bank/ocbc.png">
                                        <img v-if="$parent.SellerDetails.bank_name =='Standard Chartered'" style="width: 100%;" class="mt-20 pb-0" src="assets/bank/sc.png">
                                        <img v-if="$parent.SellerDetails.bank_name =='UOB Bank'" style="width: 100%;" class="mt-20 pb-0" src="assets/bank/uob.png">
                                        <img v-if="$parent.SellerDetails.bank_name =='Others'" style="width: 50%;" class="mt-15 ml-10 pb-0" src="assets/bank/others.png">
                                    </div>
                                </div>
                                <div class="col-lg-8  col-xxl-10 d-flex justify-content-start mt-18">
                                    <table class="font-size-h4">
                                        <tr>
                                            <td>Bank </td>
                                            <td>:</td>
                                            <td><span class="text-primary ml-5">{{$parent.SellerDetails.bank_name}}</span></td>
                                        </tr>
                                        <tr>
                                            <td>Account Name </td>
                                            <td> :</td>
                                            <td><span class="text-primary ml-5">{{$parent.SellerDetails.bank_acc_name}}</span></td>
                                        </tr>
                                        <tr>
                                            <td>Account No </td>
                                            <td>:</td>
                                            <td><span class="text-primary ml-5">{{$parent.SellerDetails.bank_acc_no}}</span></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox-inline mt-8">
                                <label class="checkbox checkbox-square">
                                    <!--<input type="radio" :checked="Pembida.percentage >= 12" :value="Pembida.id" v-model="BidaBerjaya"/>-->
                                    <input type="checkbox" @change="payLater"/>
                                    <span></span>
                                     Pay Later
                                </label>
                                ( <span class="text-danger">* Please note that order will be automatically declined if the payment exceeds 24 Hours. </span> )
                            </div>
                        </div>
                        <div class="form-group" v-if="!isPayLater">
                            <label class="">Proof Of Payment</label>
                            <div class="form-group form-control-solid form-control-lg" style="border: 1px solid lightgrey">
                                <input type="file" class="form-control-file" @change="selectFile">
                            </div>
                            <label class="">Date Of Payment</label>
                            <input class="form-control" type="datetime-local" v-model="$parent.paid_at"/>
                            <label class="mt-5">Amount</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">RM</span></div>
                                <input type="text" class="form-control" placeholder="RM"  v-model="$parent.total_paid"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-show="$parent.IsSellerHQ == 0">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4 col-xxl-2 justify-content-center">
                                <div style="width: 200px; height: 200px">
                                    <img v-if="$parent.SellerDetails.bank_name =='CIMB'" style="width: 100%;" class="mt-20 pb-0" src="assets/bank/cimb.png">
                                    <img v-if="$parent.SellerDetails.bank_name =='Hong Leong'" style="width: 100%;" class="mt-20 pb-0" src="assets/bank/hongleong.png">
                                    <img v-if="$parent.SellerDetails.bank_name =='HSBC'" style="width: 100%;" class="mt-5 pb-0" src="assets/bank/hsbc.png">
                                    <img v-if="$parent.SellerDetails.bank_name =='Maybank'" style="width: 110%;" class="mt-5 pb-0" src="assets/bank/maybank.png">
                                    <img v-if="$parent.SellerDetails.bank_name =='Public Bank'" style="width: 100%;" class="mt-5 pb-0" src="assets/bank/public.png">
                                    <img v-if="$parent.SellerDetails.bank_name =='RHB'" style="width: 100%;" class="mt-20 pb-0" src="assets/bank/rhb.png">
                                    <img v-if="$parent.SellerDetails.bank_name =='Affin Bank'" style="width: 100%;" class="mt-5 pb-0" src="assets/bank/affin.png">
                                    <img v-if="$parent.SellerDetails.bank_name =='Alliance Bank'" style="width: 100%;" class="mt-10 pb-0" src="assets/bank/alliance.png">
                                    <img v-if="$parent.SellerDetails.bank_name =='AM Bank'" style="width: 100%;" class="mt-20 pb-0" src="assets/bank/ambank.png">
                                    <img v-if="$parent.SellerDetails.bank_name =='Bank Islam'" style="width: 100%;" class="mt-20 pb-0" src="assets/bank/bankislam.png">
                                    <img v-if="$parent.SellerDetails.bank_name =='Bank Rakyat'" style="width: 60%;" class="mt-20 pb-0" src="assets/bank/bankrakyat.png">
                                    <img v-if="$parent.SellerDetails.bank_name =='BSN'" style="width: 100%;" class="mt-20 pb-0" src="assets/bank/bsn.png">
                                    <img v-if="$parent.SellerDetails.bank_name =='Bank Muamalat'" style="width: 100%;" class="mt-20 pb-0" src="assets/bank/muamalat.png">
                                    <img v-if="$parent.SellerDetails.bank_name =='OCBC Bank'" style="width: 100%;" class="mt-20 pb-0" src="assets/bank/ocbc.png">
                                    <img v-if="$parent.SellerDetails.bank_name =='Standard Chartered'" style="width: 100%;" class="mt-20 pb-0" src="assets/bank/sc.png">
                                    <img v-if="$parent.SellerDetails.bank_name =='UOB Bank'" style="width: 100%;" class="mt-20 pb-0" src="assets/bank/uob.png">
                                    <img v-if="$parent.SellerDetails.bank_name =='Others'" style="width: 50%;" class="mt-15 ml-10 pb-0" src="assets/bank/others.png">
                                </div>
                            </div>
                            <div class="col-lg-8  col-xxl-10 d-flex justify-content-start mt-18">
                                <table class="font-size-h4">
                                    <tr>
                                        <td>Bank </td>
                                        <td>:</td>
                                        <td><span class="text-primary ml-5">{{$parent.SellerDetails.bank_name}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Account Name </td>
                                        <td> :</td>
                                        <td><span class="text-primary ml-5">{{$parent.SellerDetails.bank_acc_name}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Account No </td>
                                        <td>:</td>
                                        <td><span class="text-primary ml-5">{{$parent.SellerDetails.bank_acc_no}}</span></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox-inline mt-8">
                            <label class="checkbox checkbox-square">
                                <!--<input type="radio" :checked="Pembida.percentage >= 12" :value="Pembida.id" v-model="BidaBerjaya"/>-->
                                <input type="checkbox" @change="payLater"/>
                                <span></span>
                                Pay Later
                            </label>
                            ( <span class="text-danger">* Please note that order will be automatically declined if the payment exceeds 24 Hours. </span> )
                        </div>
                    </div>
                    <div class="form-group" v-if="!isPayLater">
                        <label class="">Proof Of Payment</label>
                        <div class="form-group form-control-solid form-control-lg" style="border: 1px solid lightgrey">
                            <input type="file" class="form-control-file" @change="selectFileNotHQ">
                        </div>
                        <label class="">Date Of Payment</label>
                        <input class="form-control" type="datetime-local" v-model="$parent.paid_at"/>
                        <label class="mt-5">Amount</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">RM</span></div>
                            <input type="text" class="form-control" placeholder="RM"  v-model="$parent.total_paid"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Remarks</label>
                    <textarea class="form-control form-control-solid form-control-lg" v-model="$parent.remarks"  rows="3"></textarea>
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
                isBankTransfer:false,
                isPayLater:false,
            }
        },
        created() {

        },
        mounted() {
            $('#select-payment-methods').select2({
                placeholder: 'Select',
                allowClear: true
            });
            $("#select-payment-methods").change(function(){
                this.$parent.payment_selected= $("#select-payment-methods").val();
               this.isBankTransfer = false;
                if(this.$parent.payment_selected == 2)
                {
                    this.isBankTransfer = true;
                }
                console.log('payment :' + this.$parent.payment_selected)
            }.bind(this));
        },
        methods: {
            payLater() {
                this.isPayLater = !this.isPayLater;
            },
            selectFile(event) {
                this.$parent.proof_of_payment_image = event.target.files[0];
//                this.$parent.payment_selected =2;
            },
            selectFileNotHQ(event) {
                this.$parent.proof_of_payment_image = event.target.files[0];
                this.$parent.payment_selected = 2;
            },
//            UploadImages()
//            {
//                let currentObj = this;
//                const config = {
//                    headers: { 'content-type': 'multipart/form-data' }
//                }
//
//                let formData = new FormData();
//                formData.append("image", this.photo);
//                let vm= this;
//                axios.post('api/v1/profile/'+ this.$parent.details.id +'/change-profile-picture', formData, config)
//                    .then(function (data) {
//                        location.reload();
//                    })
//                    .catch(function (error) {
//                        currentObj.output = error;
//                    });
//            },
        }
    }


</script>

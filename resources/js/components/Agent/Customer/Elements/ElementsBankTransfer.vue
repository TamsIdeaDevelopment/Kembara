<template>
    <div class="modal fade BankTransferModal" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form @submit.prevent="UploadBankSlip">
                    <div class="modal-header">
                        {{$parent.Order.buyer_id.country}}
                        <h5 class="modal-title" id="exampleModalLabel">Fill The Payment Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!--<div class="form-group">-->
                            <!--<label>State Name <span class="text-danger">*</span></label>-->
                            <!--<div class="row" v-if="('name' in errors)">-->
                                <!--<div class="col">-->
                                    <!--<label class="text-danger">{{errors['name']}}</label>-->
                                <!--</div>-->
                            <!--</div>-->
                            <!--<input type="text"  class="form-control"  v-model="State.name"/>-->
                        <!--</div>-->
                        <div class="form-group mb-n15">
                            <label class="font-size-h3 font-weight-bold">Order No :</label>
                            <label class="font-size-h3 font-weight-bold text-primary">{{String('00000' + $parent.Order.id).slice(-6)}}</label>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4 col-xxl-4 justify-content-center">
                                    <div style="width: 100px; height: 100px">
                                        <img v-if="$parent.SellerDetails.bank_name =='CIMB'" style="width: 100%;" class="mt-20 pb-0" src="assets/bank/cimb.png">
                                        <img v-if="$parent.SellerDetails.bank_name =='Hong Leong'" style="width: 100%;" class="mt-20 pb-0" src="assets/bank/hongleong.png">
                                        <img v-if="$parent.SellerDetails.bank_name =='HSBC'" style="width: 100%;" class="mt-15 pb-0" src="assets/bank/hsbc.png">
                                        <img v-if="$parent.SellerDetails.bank_name =='Maybank'" style="width: 110%;" class="mt-15 pb-0" src="assets/bank/maybank.png">
                                        <img v-if="$parent.SellerDetails.bank_name =='Public Bank'" style="width: 100%;" class="mt-10 pb-0" src="assets/bank/public.png">
                                        <img v-if="$parent.SellerDetails.bank_name =='RHB'" style="width: 100%;" class="mt-20 pb-0" src="assets/bank/rhb.png">
                                        <img v-if="$parent.SellerDetails.bank_name =='Affin Bank'" style="width: 100%;" class="mt-15 pb-0" src="assets/bank/affin.png">
                                        <img v-if="$parent.SellerDetails.bank_name =='Alliance Bank'" style="width: 100%;" class="mt-10 pb-0" src="assets/bank/alliance.png">
                                        <img v-if="$parent.SellerDetails.bank_name =='AM Bank'" style="width: 100%;" class="mt-20 pb-0" src="assets/bank/ambank.png">
                                        <img v-if="$parent.SellerDetails.bank_name =='Bank Islam'" style="width: 100%;" class="mt-20 pb-0" src="assets/bank/bankislam.png">
                                        <img v-if="$parent.SellerDetails.bank_name =='Bank Rakyat'" style="width: 60%;" class="mt-20 pb-0" src="assets/bank/bankrakyat.png">
                                        <img v-if="$parent.SellerDetails.bank_name =='BSN'" style="width: 100%;" class="mt-20 pb-0" src="assets/bank/bsn.png">
                                        <img v-if="$parent.SellerDetails.bank_name =='Bank Muamalat'" style="width: 100%;" class="mt-20 pb-0" src="assets/bank/muamalat.png">
                                        <img v-if="$parent.SellerDetails.bank_name =='OCBC Bank'" style="width: 100%;" class="mt-20 pb-0" src="assets/bank/ocbc.png">
                                        <img v-if="$parent.SellerDetails.bank_name =='Standard Chartered'" style="width: 100%;" class="mt-20 pb-0" src="assets/bank/sc.png">
                                        <img v-if="$parent.SellerDetails.bank_name =='UOB Bank'" style="width: 100%;" class="mt-20 pb-0" src="assets/bank/uob.png">
                                        <img v-if="$parent.SellerDetails.bank_name =='Others'" style="width: 50%;" class="mt-20 ml-10 pb-0" src="assets/bank/others.png">
                                    </div>
                                </div>
                                <div class="col-lg-8  col-xxl-8 d-flex  mt-18">
                                    <table class="">
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
                            <label class="">Proof Of Payment</label>
                            <div class="row" v-if="('proof_of_payment_image' in errors)">
                                <div class="col">
                                    <label class="text-danger">{{errors['proof_of_payment_image']}}</label>
                                </div>
                            </div>
                            <div class="form-group form-control-solid form-control-lg" style="border: 1px solid lightgrey">
                                <input type="file" class="form-control-file" @change="selectFile">
                            </div>
                            <label class="">Date Of Payment</label>
                            <div class="row" v-if="('paid_at' in errors)">
                                <div class="col">
                                    <label class="text-danger">{{errors['paid_at']}}</label>
                                </div>
                            </div>
                            <input class="form-control" type="datetime-local" v-model="paid_at"/>
                            <label class="mt-5">Amount</label>
                            <div class="row" v-if="('total_paid' in errors)">
                                <div class="col">
                                    <label class="text-danger">{{errors['total_paid']}}</label>
                                </div>
                            </div>
                            <div class="input-group" v-show="$parent.Order.buyer_id.country =='Singapura' || $parent.Order.buyer_id.country =='Brunei'">
                                <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                <input type="text" class="form-control" placeholder="$"  v-model="total_paid"/>
                            </div>
                            <div class="input-group" v-show="$parent.Order.buyer_id.country =='Malaysia'">
                                <div class="input-group-prepend"><span class="input-group-text">RM</span></div>
                                <input type="text" class="form-control" placeholder="RM"  v-model="total_paid"/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary font-weight-bold">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        props: ['data'],
        data(){
            return{
                State:[],
                errors: [],
                proof_of_payment_image:'',
                paid_at:'',
                total_paid:'',
            }
        },
        watch: {
            'data': function() {
                this.State = this.data;
            }
        },
        created() {},
        mounted () {},
        methods:
            {
                selectFile(event) {
                    this.proof_of_payment_image = event.target.files[0];
                },
                UploadBankSlip() {
                    this.errors = [];
                    if((this.proof_of_payment_image !== '') && (this.paid_at !== '') && (this.total_paid !== ''))
                    {
                        let currentObj = this;
                        const config = {
                            headers: { 'content-type': 'multipart/form-data' }
                        }

                        let formData = new FormData();
                        formData.append("proof_of_payment", this.proof_of_payment_image);
                        formData.append("paid_at", this.paid_at);
                        formData.append("total_paid", this.total_paid);

                        let vm= this;
                        axios.post('/api/v1/orders/team/Updates/'+ this.$parent.Order.id +'/upload-proof-of-payment', formData, config)
                            .then(function (data) {
                                VueEvent.$emit('fetchOrder');
                                $('.BankTransferModal').click();
                                this.errors = [];

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

                                toastr.success("Successfully Upload Payment Slip", "Order Updated");
                            })
                            .catch(function (error) {
                                currentObj.output = error;
                            });
                    }
                    if(!this.proof_of_payment_image)
                    {
                        this.errors['proof_of_payment_image'] = "Please choose the file"
                    }
                    if(!this.paid_at)
                    {
                        this.errors['paid_at'] = "Please choose date and time of payment"
                    }
                    if(!this.total_paid)
                    {
                        this.errors['total_paid'] = "Please insert amount of payment"
                    }
                }
            }
    }


</script>
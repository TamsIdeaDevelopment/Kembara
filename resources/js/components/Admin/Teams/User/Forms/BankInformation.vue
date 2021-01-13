<template>
    <div class="row ">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="card-title">
                        <span class="nav-icon mr-3">
                            <i class="far fa-credit-card text-primary"></i>
                        </span>
                        Bank Information
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form  @submit.prevent="UpdateProfile">
                        <div class="card-body p-0 pl-0">
                            <div class="form-group">
                                <label>Bank Name <span class="text-danger">*</span></label>
                                <div class="row" v-if="('bank_name' in errors)">
                                    <div class="col">
                                        <label class="text-danger">{{errors['bank_name']}}</label>
                                    </div>
                                </div>
                                <select class="form-control" style="width:100%" id="select-bank" v-model="$parent.details.bank_name">
                                    <option value="">Select</option>
                                    <option value="CIMB">CIMB</option>
                                    <option value="Maybank">Maybank</option>
                                    <option value="Hong Leong">Hong Leong</option>
                                    <option value="Public Bank">Public</option>
                                    <option value="RHB">RHB</option>
                                    <option value="HSBC">HSBC</option>
                                    <option value="Affin Bank">Affin Bank</option>
                                    <option value="Alliance Bank">Alliance Bank</option>
                                    <option value="AM Bank">AM Bank</option>
                                    <option value="Bank Islam">Bank Islam</option>
                                    <option value="Bank Rakyat">Bank Rakyat</option>
                                    <option value="BSN">BSN</option>
                                    <option value="Bank Muamalat">Bank Muamalat</option>
                                    <option value="OCBC Bank">OCBC Bank</option>
                                    <option value="Standard Chartered">Standard Chartered</option>
                                    <option value="UOB Bank">UOB Bank</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            <div class="form-group mt-n5">
                                <label>Account No <span class="text-danger">*</span></label>
                                <div class="row" v-if="('bank_acc_no' in errors)">
                                    <div class="col">
                                        <label class="text-danger">{{errors['bank_acc_no']}}</label>
                                    </div>
                                </div>
                                <input type="text" class="form-control"  v-model="$parent.details.bank_acc_no"/>
                            </div>
                            <div class="form-group mt-n5">
                                <label>Account Name<span class="text-danger">*</span></label>
                                <div class="row" v-if="('bank_acc_name' in errors)">
                                    <div class="col">
                                        <label class="text-danger">{{errors['bank_acc_name']}}</label>
                                    </div>
                                </div>
                                <input type="text" class="form-control"  v-model="$parent.details.bank_acc_name"/>
                            </div>
                        </div>
                        <div class="card-footer pr-0" style="display: flex; justify-content: flex-end">
                            <button type="submit" class="btn btn-primary mt-n5">Save</button>
                        </div>
                    </form>
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
        mounted() {
            $('#select-bank').select2({
                placeholder: 'Select',
                allowClear: true
            });
            $("#select-bank").change(function(){
                this.$parent.details.bank_name= $("#select-bank").val();
            }.bind(this));
        },
        created() {

        },
        methods:
            {
                UpdateProfile() {
                    this.errors = [];
                    if((this.$parent.details.bank_name !== '') && (this.$parent.details.bank_acc_no !== '') && (this.$parent.details.bank_acc_name !== ''))
                    {
                        var url = '/api/v1/profile/'+ this.$parent.details.id +'/update-profile', method = 'post';

                        fetch(url, {
                            method: method,
                            body: JSON.stringify({
                                name: this.$parent.details.name,
                                nric:this.$parent.details.nric,
                                email: this.$parent.details.email,
                                facebook: this.$parent.details.facebook,
                                instagram: this.$parent.details.instagram,
                                Shopee: this.$parent.details.Shopee,
                                Lazada: this.$parent.details.Lazada,
                                phone_no: this.$parent.details.phone_no,
                                postcode : this.$parent.details.postcode,
                                city: this.$parent.details.city,
                                country: this.$parent.details.country,
                                address_1: this.$parent.details.address_1,
                                bank_name: this.$parent.details.bank_name,
                                bank_acc_no: this.$parent.details.bank_acc_no,
                                bank_acc_name: this.$parent.details.bank_acc_name,
                            }),
                            headers: {
                                'content-type': 'application/json'
                            }
                        }).then((response) => {
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

                            toastr.success("Successfully changed the personal information.", "Profile Updated");
                        })
                    }

                    if(!this.$parent.details.bank_name)
                    {
                        this.errors['bank_name'] = "Please choose the bank name"
                    }

                    if(!this.$parent.details.bank_acc_no){
                        this.errors['bank_acc_no'] = "Please insert the account no"
                    }

                    if(!this.$parent.details.bank_acc_name)
                    {
                        this.errors['bank_acc_name'] = "Please insert the account holder name"
                    }

                },
            }
    }


</script>
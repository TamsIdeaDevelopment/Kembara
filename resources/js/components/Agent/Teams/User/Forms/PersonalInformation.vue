<template>
    <div class="row ">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="card-title">
                        <span class="nav-icon mr-3">
                            <i class="flaticon2-user text-primary"></i>
                        </span>
                        Personal Information
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form  @submit.prevent="UpdateProfile">
                        <div class="card-body p-0 pl-0">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text"  class="form-control"  v-model="$parent.details.name" disabled/>
                            </div>
                            <div class="form-group mt-n5">
                                <label>NRIC <span class="text-danger">*</span></label>
                                <div class="row" v-if="('nric' in errors)">
                                    <div class="col">
                                        <label class="text-danger">{{errors['nric']}}</label>
                                    </div>
                                </div>
                                <input type="text" class="form-control"  v-model="$parent.details.nric" disabled/>
                            </div>
                            <div class="form-group mt-n5">
                                <label>Email <span class="text-danger">*</span></label>
                                <div class="row" v-if="('email' in errors)">
                                    <div class="col">
                                        <label class="text-danger">{{errors['email']}}</label>
                                    </div>
                                </div>
                                <input type="email" class="form-control"  v-model="$parent.details.email" disabled/>
                            </div>
                            <div class="form-group mt-n5">
                                <label>Facebook</label>
                                <input type="text" class="form-control"  v-model="$parent.details.facebook" disabled/>
                            </div>
                            <div class="form-group mt-n5">
                                <label>Instagram</label>
                                <input type="text" class="form-control"  v-model="$parent.details.instagram" disabled/>
                            </div>
                            <div class="form-group mt-n5">
                                <label>Shopee</label>
                                <input type="text" class="form-control"  v-model="$parent.details.Shopee" disabled/>
                            </div>
                            <div class="form-group mt-n5">
                                <label>Lazada</label>
                                <input type="text" class="form-control"  v-model="$parent.details.Lazada" disabled/>
                            </div>
                            <div class="form-group mt-n5">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <label>Phone <span class="text-danger">*</span></label>
                                        <div class="row" v-if="('phone_no' in errors)">
                                            <div class="col">
                                                <label class="text-danger">{{errors['phone_no']}}</label>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control"  v-model="$parent.details.phone_no" disabled/>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label>Postcode</label>
                                        <input type="text" class="form-control"  v-model="$parent.details.postcode" disabled/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-n5">
                                <div class="row">
                                    <div class="col-lg-6  mb-3">
                                        <label>City</label>
                                        <input type="text" class="form-control"  v-model="$parent.details.city" disabled/>
                                    </div>
                                    <div class="col-lg-6  mb-3">
                                        <label>Country</label>
                                        <input type="text" class="form-control"  v-model="$parent.details.country" disabled/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-n5">
                                <label>Address</label>
                                <input type="text" class="form-control"  v-model="$parent.details.address_1" disabled/>
                            </div>
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
        created() {

        },
        methods:
            {
                UpdateProfile() {
                    this.errors = [];
                    if((this.$parent.details.name !== '') && (this.$parent.details.nric !== '') && (this.$parent.details.email !== '') && (this.$parent.details.phone_no !== ''))
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
                                phone_no: this.$parent.details.phone_no,
                                postcode : this.$parent.details.postcode,
                                city: this.$parent.details.city,
                                country: this.$parent.details.country,
                                address_1: this.$parent.details.address_1,
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

                    if(!this.$parent.details.name)
                    {
                        this.errors['name'] = "Please enter the name"
                    }


                    if(!this.$parent.details.nric){
                        this.errors['nric'] = "Please enter the NRIC"
                    }

                    if(!this.$parent.details.email)
                    {
                        this.errors['email'] = "Please enter the email"
                    }
                    if(!this.$parent.details.phone_no)
                    {
                        this.errors['phone_no'] = "Please enter the phone no"
                    }

                },
            }
    }


</script>
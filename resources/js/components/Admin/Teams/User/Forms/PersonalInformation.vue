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
                                <label>Name <span class="text-danger">*</span></label>
                                <div class="row" v-if="('name' in errors)">
                                    <div class="col">
                                        <label class="text-danger">{{errors['name']}}</label>
                                    </div>
                                </div>
                                <input type="text"  class="form-control"  v-model="$parent.details.name"/>
                            </div>
                            <div class="form-group mt-n5">
                                <label>NRIC <span class="text-danger">*</span></label>
                                <div class="row" v-if="('nric' in errors)">
                                    <div class="col">
                                        <label class="text-danger">{{errors['nric']}}</label>
                                    </div>
                                </div>
                                <input type="text" class="form-control"  v-model="$parent.details.nric"/>
                            </div>
                            <div class="form-group mt-n5">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <div class="row" v-if="('email' in errors)">
                                            <div class="col">
                                                <label class="text-danger">{{errors['email']}}</label>
                                            </div>
                                        </div>
                                        <input type="email" class="form-control"  v-model="$parent.details.email"/>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label>Phone <span class="text-danger">*</span></label>
                                        <div class="row" v-if="('phone_no' in errors)">
                                            <div class="col">
                                                <label class="text-danger">{{errors['phone_no']}}</label>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text">+6</span></div>
                                            <input type="tel" class="form-control" maxlength="11" placeholder="Phone No (0123456789)" v-model="$parent.details.phone_no"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-n5">
                                <label>Company Name</label>
                                <input type="text" class="form-control"  v-model="$parent.details.company_name"/>
                            </div>
                            <div class="form-group mt-n5">
                                <label>SSM No</label>
                                <input type="text" class="form-control"  v-model="$parent.details.ssm"/>
                            </div>
                            <div class="form-group mt-n5">
                                <label>Facebook</label>
                                <input type="text" class="form-control"  v-model="$parent.details.facebook"/>
                            </div>
                            <div class="form-group mt-n5">
                                <label>Instagram</label>
                                <input type="text" class="form-control"  v-model="$parent.details.instagram"/>
                            </div>
                            <div class="form-group mt-n5">
                                <label>Shopee</label>
                                <input type="text" class="form-control"  v-model="$parent.details.Shopee"/>
                            </div>
                            <div class="form-group mt-n5">
                                <label>Lazada</label>
                                <input type="text" class="form-control"  v-model="$parent.details.Lazada"/>
                            </div>
                            <div class="form-group mt-n5">
                                <label>Address</label>
                                <input type="text" class="form-control"  v-model="$parent.details.address_1"/>
                            </div>
                            <div class="form-group mt-n5">
                                <div class="row">
                                    <div class="col-lg-6  mb-3">
                                        <label>Postcode</label>
                                        <input type="text" class="form-control"  v-model="$parent.details.postcode"/>
                                    </div>
                                    <div class="col-lg-6  mb-3">
                                        <label>City</label>
                                        <input type="text" class="form-control"  v-model="$parent.details.city"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-n5">
                                <div class="row">
                                    <div class="col-lg-6  mb-3">
                                        <label>State</label>
<!--                                        <input type="text" class="form-control"  v-model="$parent.details.state"/>-->
                                        <select class="form-control select2" style="width:100%" id="update-select-state" v-model="$parent.details.state">
                                            <option  v-for="State in States" :value="State.name">{{ State.name }}</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6  mb-3">
                                        <label>Country</label>
                                        <input type="text" class="form-control"  v-model="$parent.details.country"/>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer pr-0" style="display: flex; justify-content: flex-end">
                                <button type="submit" class="btn btn-primary mt-n5">Save</button>
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
                States: [],
            }
        },
        created() {
            this.getStateName();
        },
        mounted() {
            $('#update-select-state').select2({
                placeholder: this.$parent.details.state,
                allowClear: true
            });
            $("#update-select-state").change(function() {
                this.$parent.details.state = $("#update-select-state").val();
            }.bind(this));
        },
        methods:
            {
                getStateName(){
                    axios.get('/api/v1/state/Lists/list-state')
                        .then(function (response) {
                            this.States = response.data;
                        }.bind(this));
                },
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
                                company_name: this.$parent.details.company_name,
                                ssm: this.$parent.details.ssm,
                                facebook: this.$parent.details.facebook,
                                instagram: this.$parent.details.instagram,
                                Shopee: this.$parent.details.Shopee,
                                Lazada: this.$parent.details.Lazada,
                                phone_no: this.$parent.details.phone_no,
                                postcode : this.$parent.details.postcode,
                                city: this.$parent.details.city,
                                state: this.$parent.details.state,
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

<template>
    <div class="row ">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="card-title">
                        <span class="nav-icon mr-3">
                            <i class="flaticon-settings text-primary"></i>
                        </span>
                        Personal Information
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form @submit.prevent="updatePassword">
                        <div class="card-body   p-0 pl-0">
                            <div class="row" v-if="('success' in errors)">
                                <div class="col">
                                    <label class="text-success" style="font-size: 15px">{{errors['success']}}</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Old Password</label>
                                <div class="row" v-if="('not_found' in errors)">
                                    <div class="col">
                                        <label class="text-danger">{{errors['not_found']}}</label>
                                    </div>
                                </div>

                                <div class="row" v-if="('old_not_match' in errors)">
                                    <div class="col">
                                        <label class="text-danger">{{errors['old_not_match']}}</label>
                                    </div>
                                </div>
                                <div class="row" v-if="('same' in errors)">
                                    <div class="col">
                                        <label class="text-success">{{errors['same']}}</label>
                                    </div>
                                </div>
                                <input type="password" @submit="checkPassword" @change="checkPassword" class="form-control"  placeholder="Old Password" v-model="old_password"/>
                            </div>
                            <div class="form-group">
                                <label>New Password</label>
                                <div class="row" v-if="('not_match' in errors)">
                                    <div class="col">
                                        <label class="text-danger">{{errors['not_match']}}</label>
                                    </div>
                                </div>
                                <div class="row" v-if="('new_empty' in errors)">
                                    <div class="col">
                                        <label class="text-danger">{{errors['new_empty']}}</label>
                                    </div>
                                </div>
                                <input type="password" class="form-control"  placeholder="New Password"  v-model="new_password"/>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <div class="row" v-if="('not_match' in errors)">
                                    <div class="col">
                                        <label class="text-danger">{{errors['not_match']}}</label>
                                    </div>
                                </div>
                                <input type="password" class="form-control"  placeholder="Confirm Password"  v-model="confirm_password"/>
                            </div>
                        </div>
                        <div class="card-footer pb-5 pr-0" style="display: flex; justify-content: flex-end">
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
                isLoading: false,
                old_password:'',
                old_passwordCondition: '',
                new_password:'',
                confirm_password:'',
                status:'',
            }
        },
        created() {

        },
        methods:
        {
            async checkPassword(){
                this.errors = [];

                axios.get('/api/v1/profile/check-password/'+ this.$parent.details.id +'/'+ this.old_password)
                    .then(function (response) {
                        this.status = response.data;

                        if(this.status === 'not'){
                            this.errors['not_found'] = "The password are not found in our record"
                        }
                        if(this.status === 'same'){
                            this.old_passwordCondition= "true";
                            this.errors['same'] = "The password are match with our record"
                        }

                    }.bind(this));
            },
            updatePassword(){
                this.errors = [];
                if((this.new_password === this.confirm_password) && (this.old_passwordCondition === "true") && this.new_password === this.confirm_password )
                {
                    axios.get('/api/v1/profile/'+ this.$parent.details.id + '/' + this.new_password +'/change-password')
                        .then(function (response) {

                            this.old_password = '';
                            this.new_password = '';
                            this.confirm_password = '';
                            this.errors['success'] = "The password are successfully changed"

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

                            toastr.success("Successfully changed the password.", "Change Password");

                        }.bind(this));
                }

                if(!this.old_passwordCondition)
                {
                    this.errors['old_not_match'] = "The password are not found in our record"
                }


                if(!this.new_password){
                    this.errors['new_empty'] = "Fill the new password"
                }

                if(this.new_password !== this.confirm_password)
                {
                    this.errors['not_match'] = "The password are not match"
                }
            },
        }
    }


</script>
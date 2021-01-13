<template>
    <div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-custom gutter-b">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-space-lg nav-tabs-line nav-tabs-bold nav-tabs-line-3x" role="tablist">
                            <li class="nav-item mr-3">
                                <a class="nav-link">
                                    <h3 class="">
                                    <span class="nav-icon mr-3">
                                        <i class="flaticon2-open-text-book text-primary"></i>
                                    </span>
                                        {{data.name}}
                                    </h3>
                                </a>
                            </li>
                            <!--<li class="nav-item mr-3">-->
                                <!--<a class="nav-link active" data-toggle="tab" href="#kt_apps_contacts_view_tab_2">-->
                                    <!--<span class="nav-text font-weight-bold">Information</span>-->
                                <!--</a>-->
                            <!--</li>-->
                            <!--<li class="nav-item mr-3">-->
                                <!--<a class="nav-link" data-toggle="tab" href="#kt_apps_contacts_view_tab_3">-->
                                    <!--<span class="nav-text font-weight-bold">Video</span>-->
                                <!--</a>-->
                            <!--</li>-->
                            <!--<li class="nav-item mr-3">-->
                                <!--<a class="nav-link" data-toggle="tab" href="#kt_apps_contacts_view_tab_4">-->
                                    <!--<span class="nav-text font-weight-bold">Files</span>-->
                                <!--</a>-->
                            <!--</li>-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-custom gutter-b">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="carousel-inner pt-9">
                                    <div class="carousel-item active">
                                        <div class="flex-grow-1">
                                            <h3 class="font-size-h4 text-dark-75 text-hover-primary font-weight-bold">{{data.info_title}}</h3>
                                            <p class="text-dark-75 font-size-lg font-weight-normal pt-2">
                                                {{data.info_description}}
                                            </p>
                                        </div>
                                        <div class="">
                                            <span class="font-size-h4 text-primary text-hover-primary font-weight-bold pt-3 pb-5 d-block text-uppercase">Video</span>
                                            <span class="font-size-h6 text-dark text-hover-primary font-weight-bold pt-3 pb-5 d-block text-uppercase">{{data.video_title}}</span>
                                            <div class="d-inline d-flex justify-content-center">
                                                <iframe width="750" height="400" :src="data.video_link">
                                                </iframe>
                                            </div>
                                        </div>
                                        <div class="pt-7">
                                            <span class="font-size-h6 text-primary text-hover-primary font-weight-bold pb-4 text-uppercase d-block">Files</span>
                                            <div class="align-items-center">
                                                <div class="row" v-if="data.file1 && data.file1!=='null'">
                                                    <div class="col-lg-6">
                                                        <div class="row">
                                                            <div class="col-lg-1">
                                                                <div class="symbol symbol-35 symbol-light-success flex-shrink-0 mr-3">
                                                                    <span class="symbol-label font-weight-bolder font-size-lg">1</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <div class="form-group ml-10" style="width: 180%;">
                                                                    <a :href="'/storage/Classroom/'+ data.file1" target="_blank">{{data.file1}}</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row"  v-if="data.file2 && data.file2!=='null'">
                                                    <div class="col-lg-6">
                                                        <div class="row">
                                                            <div class="col-lg-1">
                                                                <div class="symbol symbol-35 symbol-light-success flex-shrink-0 mr-3">
                                                                    <span class="symbol-label font-weight-bolder font-size-lg">2</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <div class="form-group ml-10" style="width: 180%;">
                                                                    <a :href="'/storage/Classroom/'+ data.file2" target="_blank">{{data.file2}}</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" v-if="data.file3 && data.file3!=='null'">
                                                    <div class="col-lg-6">
                                                        <div class="row">
                                                            <div class="col-lg-1">
                                                                <div class="symbol symbol-35 symbol-light-success flex-shrink-0 mr-3">
                                                                    <span class="symbol-label font-weight-bolder font-size-lg">3</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <div class="form-group  ml-10" style="width: 180%;">
                                                                    <a :href="'/storage/Classroom/'+ data.file3" target="_blank">{{data.file3}}</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" v-if="data.file4 && data.file4!=='null'">
                                                    <div class="col-lg-6">
                                                        <div class="row">
                                                            <div class="col-lg-1">
                                                                <div class="symbol symbol-35 symbol-light-success flex-shrink-0 mr-3">
                                                                    <span class="symbol-label font-weight-bolder font-size-lg">4</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <div class="form-group  ml-10" style="width: 180%;">
                                                                    <a  :href="'/storage/Classroom/'+ data.file4" target="_blank">{{data.file4}}</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" v-if="data.file5 && data.file5!=='null'">
                                                    <div class="col-lg-6">
                                                        <div class="row">
                                                            <div class="col-lg-1">
                                                                <div class="symbol symbol-35 symbol-light-success flex-shrink-0 mr-3">
                                                                    <span class="symbol-label font-weight-bolder font-size-lg">5</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <div class="form-group ml-10" style="width: 180%;">
                                                                    <a  :href="'/storage/Classroom/'+ data.file5" target="_blank">{{data.file5}}</a>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        props:['data'],
        data(){
            return{
                Classroom: this.data,
                src:'https://www.youtube.com/embed/tRMY12LSUYQ',
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
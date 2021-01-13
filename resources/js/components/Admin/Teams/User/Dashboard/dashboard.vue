<template>
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-xxl-12 ">
                    <div class="card-custom gutter-b">
                        <div class="card-body d-flex flex-column">
                            <div class="row">
                                <div class="col-lg-4 col-xxl-3">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card card-custom gutter-b">
                                                <div class="card-header justify-content-center">
                                                    <div class="text-center mt-5 mb-5">
                                                        <div class="symbol symbol-150 symbol-xl-150">
                                                            <div class="symbol-label" :style="'background-image:url('+ image_source+ details.avatar +')'"></div>
                                                        </div>
                                                        <h4 class="font-weight-bold my-2">{{details.name}}</h4>
                                                        <div class="text-muted mb-2">Alpha</div>
                                                        <span class="label label-light-warning label-inline font-weight-bold label-lg">Active</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-xxl-12">
                                            <div class="card card-custom gutter-b">
                                                <div class="card-header justify-content-center">
                                                    <div class="navi navi-bold navi-hover navi-active navi-link-rounded  mt-5 mb-5">
                                                        <ul class="navi-item mb-2 nav nav-link" id="myTab" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active navi-link py-4" id="profile-tab" data-toggle="tab" href="#personal-information" aria-controls="personal-information">
                                                                <span class="nav-icon">
                                                                    <i class="flaticon2-user"></i>
                                                                </span><span class="nav-text">Personal Information</span>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link navi-link py-4" id="profile-image-tab" data-toggle="tab" href="#profile-image">
                                                                    <span class="nav-icon">
                                                                        <i class="flaticon2-image-file"></i>
                                                                    </span>
                                                                    <span class="nav-text">Picture</span>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link navi-link py-4" id="change-password-tab" data-toggle="tab" href="#change-password" aria-controls="change-password">
                                                                    <span class="nav-icon">
                                                                        <i class="flaticon-settings"></i>
                                                                    </span>
                                                                    <span class="nav-text">Change Password</span>
                                                                </a>
                                                            </li>
                                                            <!--<li class="nav-item">-->
                                                                <!--<a class="nav-link navi-link py-4" id="delivery-address-tab" data-toggle="tab" href="#delivery-address" aria-controls="delivery-address">-->
                                                                    <!--<span class="nav-icon">-->
                                                                        <!--<i class="flaticon2-map"></i>-->
                                                                    <!--</span>-->
                                                                    <!--<span class="nav-text">Delivery Address</span>-->
                                                                <!--</a>-->
                                                            <!--</li>-->
                                                            <li class="nav-item">
                                                                <a class="nav-link navi-link py-4" id="bank-tab" data-toggle="tab" href="#bank" aria-controls="bank">
                                                                    <span class="nav-icon">
                                                                        <i class="far fa-credit-card"></i>
                                                                    </span>
                                                                    <span class="nav-text">Bank Information</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-8 col-xxl-9">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card card-custom gutter-b">
                                                <div class="card-body">
                                                    <div class="tab-content mt-5" id="myTabContent">
                                                        <div class="tab-pane fade" id="profile-image" role="tabpanel" aria-labelledby="home-tab">
                                                            <admin-user-profile-image></admin-user-profile-image>
                                                        </div>
                                                        <div class="tab-pane fade" id="change-password" role="tabpanel" aria-labelledby="profile-tab">
                                                            <admin-user-change-password></admin-user-change-password>
                                                        </div>
                                                        <div class="tab-pane fade show active" id="personal-information" role="tabpanel" aria-labelledby="contact-tab">
                                                            <admin-user-personal-information></admin-user-personal-information>
                                                        </div>
                                                        <div class="tab-pane fade" id="bank" role="tabpanel" aria-labelledby="bank-tab">
                                                            <admin-user-bank-information></admin-user-bank-information>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--<div class="row">-->
                                <!--<div class="col-lg-6 col-xxl-6">-->
                                    <!--<div class="row">-->
                                        <!--<div class="col-lg-12 col-xxl-12">-->
                                            <!--<admin-user-profile-image></admin-user-profile-image>-->
                                        <!--</div>-->
                                    <!--</div>-->
                                    <!--<div class="row">-->
                                        <!--<div class="col-lg-12 col-xxl-12">-->
                                            <!--<admin-user-change-password></admin-user-change-password>-->
                                        <!--</div>-->
                                    <!--</div>-->
                                <!--</div>-->
                                <!--<div class="col-lg-6 col-xxl-6">-->
                                    <!--<admin-user-personal-information></admin-user-personal-information>-->
                                <!--</div>-->
                            <!--</div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props:['data'],
        data() {
            return {
                details: this.data,
                image_source: 'storage/ProfilePicture/',

            }
        },
        created(){
        }
    }
</script>
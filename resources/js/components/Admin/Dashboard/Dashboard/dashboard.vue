<template>
    <div class="container-fluid">
        <div class="row p-0 d-flex"  v-if="AgentDetails.paid == 1">
            <div class="col-lg-12">
                <div class="alert alert-shadow alert-white p-4" role="alert">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-6">
                                <label class="h6">Referral Link</label>
                                <input type="text" class="form-control" :value="'http://kembarabusiness.com/invite/KM'+ (String('00000' + this.AgentDetails.member_no).slice(-5))" id="myInput">
                            </div>
                            <div class="col-lg-6">
                                <button class="btn btn-primary ml-5 mt-7" @click="copyLink">Copy Link</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-custom" data-card="true">
                            <div class="card-header flex-wrap py-5">
                                <div class="card-title">
                                    <h3 class="card-label">Total Restock</h3>
                                </div>
                                <div class="card-toolbar">
                                    <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-1" data-card-tool="toggle">
                                        <i class="ki ki-arrow-down icon-nm"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <agent-dashboard-chart :data="data"></agent-dashboard-chart>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="card card-custom" data-card="true">
                            <div class="card-header flex-wrap py-5">
                                <div class="card-title">
                                    <h3 class="card-label">Total Sales Team</h3>
                                </div>
                                <div class="card-toolbar">
                                    <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-1" data-card-tool="toggle">
                                        <i class="ki ki-arrow-down icon-nm"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <admin-dashboard-chart  :data="data"></admin-dashboard-chart>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <admin-hall-of-fame></admin-hall-of-fame>
        </div>
        <!--<div class="row mt-5">-->
            <!--<div class="col-lg-12 order-2 order-xxl-12">-->
                <!--<order-hq-list></order-hq-list>-->
            <!--</div>-->
        <!--</div>-->
        <!--<div class="row mt-10 h-auto">-->
            <!--<div class="col-lg-12 col-xxl-12">-->
                <!--<new-application-list></new-application-list>-->
            <!--</div>-->
        <!--</div>-->
    </div>

</template>

<script>
    export default {
        props:['data'],
        data() {
            return {
                details: this.data,
                AgentDetails:{},
                image_source: 'storage/ProfilePicture/',

            }
        },
        mounted () {},
        created(){
            this.fetchAgentDetails();
        },
        methods:
            {
                fetchAgentDetails(){
                    fetch('/api/v1/team/Lists/' + this.data.id +'/agent-details').then(response => response.json())
                        .then(response => {
                            this.AgentDetails = response;
                            console.log(this.AgentDetails.member_no)
                        })
                        .catch(error => console.log(error))
                },

                copyLink()
                {
                    var copyText = document.getElementById("myInput");

                    /* Select the text field */
                    copyText.select();
                    copyText.setSelectionRange(0, 99999); /*For mobile devices*/

                    /* Copy the text inside the text field */
                    document.execCommand("copy");

                    /* Alert the copied text */
                    alert("Copied the text: " + copyText.value);
                }
            }
    }
</script>
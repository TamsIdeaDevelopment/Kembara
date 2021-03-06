<template>
    <div class="container-fluid">
        <div class="row p-0 d-flex"  v-if="AgentDetails.status == 1">
            <div class="col-lg-6 col-xxl-6">
                <div class="alert alert-shadow alert-white p-4" role="alert">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-10">
                                <label class="h6">Referral Link1</label>
                                <input type="text" class="form-control" :value="'http://kembarabusiness.com/invite/KM'+ (String('00000' + this.AgentDetails.member_no).slice(-5))" id="myInput">
                            </div>
                            <div class="col-lg-2">
                                <button class="btn btn-primary ml-5 mt-7" @click="copyLink">Copy </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xxl-6">
                <div class="alert alert-shadow alert-white p-4" role="alert">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-12">
                                <label class="h6">Point Collected</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" class="form-control" :value="AgentDetails.point" disabled>
                            </div>
                            <div class="col-lg-6">
                                <a href="/list-product" class="btn btn-primary ml-5">Buy Now</a>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-lg-12">
                                <span class="text-danger">* The point will be collected once agent that you invited made their first purchase. This just applied for agent that you invited join as same level with you.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <agent-dashboard-chart :data="data"></agent-dashboard-chart>
        <div class="row mt-5">
            <div class="col-lg-12 order-2 order-xxl-12">
                <agent-order-team-list></agent-order-team-list>
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
//                            console.log(this.AgentDetails)
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
<template>
    <div class="modal fade updateApproveAgent" id="updateApproveAgent" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form @submit.prevent="ApproveAgent">
                    <div class="modal-header">
                        <h5 class="modal-title text-success" id="exampleModalLabel">Are you sure want to approve?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body justify-content-center">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" v-model="NewApplication.user_id.name" disabled/>
                        </div>
                        <div class="form-group">
                            <label>Level</label>
                            <input type="text" class="form-control" v-model="NewApplication.agent_levels_id.name" disabled/>
                        </div>
                        <div class="form-group" v-if="NewApplication.leader_id.HQ == 0">
                            <label>Leader</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">KM{{String('00000' + NewApplication.leader_id.member_no).slice(-5)}}</span></div>
                                <input  type="text" class="form-control" :value="$parent.LeaderName" disabled/>
                            </div>
                        </div>
                        <div class="form-group"  v-if="NewApplication.leader_id.HQ == 1">
                            <label>Leader</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">KM</span></div>
                                <input  type="text" class="form-control text-black" placeholder="HQ" disabled/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="text" class="form-control" v-model="NewApplication.created_at" disabled/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success font-weight-bold">Approve</button>
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
                NewApplication:
                {
                    HQ: '',
                    paid:'',
                    status:'',
                    user_id: {
                        name: '',
                        nric: '',
                    },
                    agent_levels_id: {
                        name:'',
                    },
                    leader_id: {
                        member_no:'',
                    }
                },
            }
        },
        watch: {
            'data': function() {
                this.NewApplication = this.data;
            }
        },
        created() {},
        mounted () {},
        methods:
            {
                ApproveAgent()
                {
                    var url = '/api/v1/team/Updates/'+ this.NewApplication.id +'/approve-membership', method = 'post';

                    fetch(url, {
                        method: method,
                        body: JSON.stringify(),
                        headers: {
                            'content-type': 'application/json'
                        }
                    }).then((response) => {

                        VueEvent.$emit('fetchNewApplication');
                        $('.updateApproveAgent').click();
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

                        toastr.success("Successfully Approve Agent.", "Agent Membership Approved");
                    })
                },
            }
    }


</script>
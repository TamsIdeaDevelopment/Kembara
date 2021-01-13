<template>
    <div class="tab-pane fade" id="terminate" role="tabpanel">
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-custom alert-outline-2x alert-outline-danger fade show mb-5" role="alert">
                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                    <div class="alert-text">Please ensure to assign new leader for current team members before terminate this agent : <span class="text-dark font-weight-bold">{{$parent.$parent.details.name}}</span></div>
                    <div class="alert-close">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="ki ki-close"></i></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form  @submit.prevent="DeleteMembership">
                    <div class="card-body p-0 pl-0">
                        <div class="form-group mt-5">
                            <h3 class="mb-8 text-primary">
                                <i class="flaticon-circle mr-5 text-primary"></i>
                                Terminate Membership
                            </h3>
                            <h5 class="modal-title text-danger" id="exampleModalLabel">Are you sure want to delete?</h5>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" v-model="$parent.$parent.details.name" disabled/>
                        </div>
                        <div class="form-group">
                            <label>Level</label>
                            <input type="text" class="form-control" v-model="$parent.$parent.detailsAgentLevels.name" disabled/>
                        </div>
                        <div class="form-group" v-if="$parent.$parent.LeaderDetails.HQ == 0">
                            <label>Leader</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">KM{{String('00000' + $parent.$parent.LeaderDetails.member_no).slice(-5)}}</span></div>
                                <input  type="text" class="form-control" :value="$parent.$parent.details1Leader.name" disabled/>
                            </div>
                        </div>
                        <div class="form-group"  v-if="$parent.$parent.LeaderDetails.HQ == 1">
                            <label>Leader</label>
                            <div class="input-group">
                                <input  type="text" class="form-control text-black" placeholder="HQ" disabled/>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer pr-0" style="display: flex; justify-content: flex-end">
                        <button type="submit" class="btn btn-primary mt-n5">Save</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</template>
<script>
    export default{
        data(){
            return{}
        },
        watch: {},
        created() {},
        mounted () {},
        methods:
            {
                DeleteMembership()
                {
                    var url = '/api/v1/team/Deletes/'+ this.$parent.$parent.AgentDetails.id +'/delete-team', method = 'post';

                        fetch(url, {
                            method: method,
                            body: JSON.stringify(),
                            headers: {
                                'content-type': 'application/json'
                            }
                        }).then((response) => {

                            VueEvent.$emit('fetchAgentDetails');
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

                            toastr.success("Successfully terminate the agent.", "Agent Terminated");
                        })
                },
            }
    }


</script>
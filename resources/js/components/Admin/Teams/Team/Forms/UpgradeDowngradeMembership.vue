<template>
    <div class="tab-pane fade" id="upgrade-downgrade" role="tabpanel">
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-custom alert-outline-2x alert-outline-danger fade show mb-5" role="alert">
                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                    <div class="alert-text">Please assign new leader for current team members before upgrade or downgrade this agent : <span class="text-dark font-weight-bold">{{$parent.$parent.details.name}}</span></div>
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
                <form  @submit.prevent="UpdateMembership">
                    <div class="card-body p-0 pl-0">
                        <div class="form-group mt-5">
                            <h3 class="mb-8 text-primary">
                                <i class="flaticon2-sort mr-5 text-primary"></i>
                                Upgrade / Downgrade Membership
                            </h3>
                            <label class="font-weight-bold">1. Please select agent level for upgrading or downgrading.</label>
                            <div class="row mt-5">
                                <div class="col-lg-12">
                                    <label>Level</label>
                                    <div class="row" v-if="('level' in errors)">
                                        <div class="col">
                                            <label class="text-danger">{{errors['level']}}</label>
                                        </div>
                                    </div>
                                    <select class="form-control select2" style="width:100%" id="upgrade-downgrade-select-agent-levels" v-model="UpgradeDowngradeLevelSelected">
                                        <option  v-for="agent_levels in Roles" :value="agent_levels.id">{{ agent_levels.name }}</option>
                                    </select>
                                </div>
                            </div>
                            <label class="mt-8 font-weight-bold">2. Please select leader for to transfer.</label>
                            <div class="row mt-5">
                                <div class="col-lg-5">
                                    <h6 class="text-primary">Current Leader</h6>
                                    <input type="text" class="form-control" v-model="$parent.$parent.details1Leader.name" disabled/>
                                </div>
                                <div class="col-lg-1 text-center align-items-center">
                                    <h1 class="mt-10"> > </h1>
                                </div>
                                <div class="col-lg-6">
                                    <h6 class="text-success">New Leader</h6>
                                    <div class="row" v-if="('new-leader' in errors)">
                                        <div class="col">
                                            <label class="text-danger">{{errors['new-leader']}}</label>
                                        </div>
                                    </div>
                                    <select class="form-control select2"style="width:100%" id="upgrade-downgrade-select-new-leader" v-model="LeaderSelected">
                                        <option  v-for="list in UpgradeDowngradeListLeaders" :value="list.value">{{ list.label }}</option>
                                    </select>
                                </div>
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
            return{
                errors: [],
                Roles:[],
                UpgradeDowngradeLevelSelected:'',
                UpgradeDowngradeListLeaders:[],
                LeaderSelected: '',
            }
        },
        watch: {},
        created() {
            this.getRoleName();
        },

        mounted () {

            $("#upgrade-downgrade-select-agent-levels").change(function(){
                this.UpgradeDowngradeLevelSelected ='';
                this.UpgradeDowngradeLevelSelected = $("#upgrade-downgrade-select-agent-levels").val();
                this.FetchListNewLeader();
            }.bind(this));

            $('#upgrade-downgrade-select-new-leader').select2({
                placeholder: 'Select New Leader',
                allowClear: true
            });
            $("#upgrade-downgrade-select-new-leader").change(function(){
                this.LeaderSelected = $("#upgrade-downgrade-select-new-leader").val();
            }.bind(this));

        },
        methods:
            {
                getRoleName(){
                    axios.get('/api/v1/roles/Lists/list-agent-level')
                        .then(function (response) {
                            this.Roles = response.data.data;
                        }.bind(this));

                },
                FetchListNewLeader(){

                        this.UpgradeDowngradeListLeaders = [];
                        fetch('/api/v1/team/Lists/'+ this.UpgradeDowngradeLevelSelected +'/list-new-leader-based-on-parent').then(response => response.json())
                            .then(response => {
                                this.UpgradeDowngradeListLeaders = $.map(response.data, function(value){
                                    return {'value': value.user_id.id, 'label': value.agent_levels_id.name + ' - KM' + String('00000' + value.member_no).slice(-5) + ' - '  +  value.user_id.name };
                                });
                            })
                },
                UpdateMembership() {
                    this.errors = [];
                    if((this.LeaderSelected !== '') && (this.UpgradeDowngradeLevelSelected !== ''))
                    {
                        var url = '/api/v1/team/Updates/'+ this.$parent.$parent.AgentDetails.id +'/upgrade-downgrade-membership', method = 'post';

                        fetch(url, {
                            method: method,
                            body: JSON.stringify({
                                agent_levels_id: this.UpgradeDowngradeLevelSelected,
                                leader_id: this.LeaderSelected,
                            }),
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

                            toastr.success("Successfully update membership info.", "Membership Updated");
                        })
                    }

                    if(!this.LeaderSelected)
                    {
                        this.errors['level'] = "Please select the level"
                    }


                    if(!this.UpgradeDowngradeLevelSelected)
                    {
                        this.errors['new-leader'] = "Please select the new leader"
                    }

                },
            }
    }


</script>
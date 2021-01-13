<template>
    <div class="row ">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="card-title">
                        <span class="nav-icon mr-3">
                            <i class="flaticon2-settings text-primary"></i>
                        </span>
                        Membership Settings
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-primary nav-pills" id="team-settings-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="transfer-tab" data-toggle="tab" href="#transfer">
                                <span class="nav-icon">
                                    <i class="flaticon2-fast-next"></i>
                                </span>
                                <span class="nav-text">Transfer</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="upgrade-downgrade-tab" data-toggle="tab" href="#upgrade-downgrade">
                                <span class="nav-icon">
                                    <i class="flaticon2-sort"></i>
                                </span>
                                <span class="nav-text">Upgrade / Downgrade</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="terminate-tab" data-toggle="tab" href="#terminate">
                                <span class="nav-icon">
                                    <i class="flaticon-circle"></i>
                                </span>
                                <span class="nav-text">Terminate</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content mt-5" id="myTabContent2">
                        <team-transfer-network-form-update></team-transfer-network-form-update>
                        <team-upgrade-downgrade-membership-form-update></team-upgrade-downgrade-membership-form-update>
                        <team-terminate-membership-form-update></team-terminate-membership-form-update>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                errors: [],
                LeaderLevelID: '',
                ListNewLeader: [],
                LeaderSelected: '',
                ListTeams: [],
                AgentSelected: [],
            }
        },
        watch: {},
        created() {
            this.FetchListAgent();
        },

        mounted () {
            VueEvent.$on('addAgent', (value) => {
                this.addAgent(value);
            });
            VueEvent.$on('removeAgent', (value) => {
                this.removeAgent(value);
            });
        },
        methods:
            {
                FetchListNewLeader(){

                    if(!this.UpgradeDowngradeLevelSelected)
                    {
                        fetch('/api/v1/team/Lists/'+ this.LeaderLevelID +'/list-new-leader').then(response => response.json())
                            .then(response => {
                                this.ListNewLeader = $.map(response.data, function(value){
                                    return {'value': value.user_id.id, 'label': 'KM' + String('00000' + value.member_no).slice(-5) + ' - '  +  value.user_id.name };
                                });
                            })
                    }
                },
                FetchListAgent(){

                    fetch('/api/v1/team/Lists/'+ this.$parent.data +'/team-members-under-levels-only').then(response => response.json())
                        .then(response => {
                            if(response.data[0])
                            {
                                this.LeaderLevelID = response.data[0].leader_id.agent_levels_id;
                                this.FetchListNewLeader();
                            }
                            this.ListTeams = $.map(response.data, function(value){
                                return {'value': value.id, 'label': value.agent_levels_id.name + ' - KM' + String('00000' + value.member_no).slice(-5) + ' - '  +  value.user_id.name };
                            });

                            var KTDualListbox = function() {
                                var demo1 = function () {
                                    var listBox = $('#transfer_agent_select_list');
                                    var $this = listBox;
                                    var options= [];

                                    $this.children('option').each(function () {
                                        var value = $(this).val();
                                        var label = $(this).text();
                                    });
                                    var AgentSelected1 =[];

                                    var dualListBox = new DualListbox($this.get(0), {
                                        addEvent: function (value) {
                                            AgentSelected1.push(value);
                                            VueEvent.$emit('addAgent',AgentSelected1);
                                        },
                                        removeEvent: function (value) {
                                            var index = AgentSelected1.indexOf(value);
                                            AgentSelected1.splice(index, 1);
                                            VueEvent.$emit('removeAgent',AgentSelected1);

                                        },
                                        availableTitle: 'List Of Agent',
                                        selectedTitle: 'List Selected',
                                        addButtonText: 'Add',
                                        removeButtonText: 'Remove',
                                        addAllButtonText: 'Add All',
                                        removeAllButtonText: 'Remove All',
                                        options: options,
                                    });
                                };
                                return {
                                    init: function() {
                                        demo1();
                                    },
                                };
                            }();

                            jQuery(document).ready(function() {
                                KTDualListbox.init();
                            });
                        })


                },
                addAgent(value)
                {
                    this.AgentSelected = [];
                    this.AgentSelected = value;
                },
                removeAgent(value)
                {
                    this.AgentSelected = [];
                    this.AgentSelected = value;
                },
                UpdateMembership() {
                    this.errors = [];

                    if((this.AgentSelected.length) && (this.LeaderSelected !== ''))
                    {
                        var url = '/api/v1/team/Updates/'+ this.LeaderSelected +'/update-network', method = 'post';

                        fetch(url, {
                            method: method,
                            body: JSON.stringify(this.AgentSelected),
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

                            toastr.success("Successfully transfer the network.", "Network Updated");
                        })
                    }

                    if(!this.AgentSelected.length)
                    {
                        this.errors['list-agent'] = "Please select the agent to transfer";
                    }
                    if(!this.LeaderSelected)
                    {
                        this.errors['new-leader'] = "Please select the leader";
                    }

                },
            }
    }


</script>
<template>
    <div class="tab-pane fade show active" id="transfer" role="tabpanel">
        <div class="row">
            <div class="col-lg-12">
                <form  @submit.prevent="UpdateMembership">
                    <div class="card-body p-0 pl-0">
                        <div class="form-group mt-5">
                            <h3 class="mb-8 text-primary">
                                <i class="flaticon2-fast-next mr-5 text-primary"></i>
                                Transfer Network @ Agent
                            </h3>
                            <label class="font-weight-bold">1.Please select the new leader before assigning to the agent.</label>
                            <div class="row mt-5">
                                <div class="col-lg-5">
                                    <h6 class="text-primary">Current Leader</h6>
                                    <input type="text" class="form-control" v-model="$parent.$parent.details.name" disabled/>
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
                                    <select class="form-control select2"style="width:100%" id="update-select-new-leader" v-model="$parent.LeaderSelected">
                                        <option  v-for="list in $parent.ListNewLeader" :value="list.value">{{ list.label }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-5">
                            <label class="font-weight-bold">2. Please select agent to change the leader. <br/></label>
                            <div class="row" v-if="('list-agent' in errors)">
                                <div class="col">
                                    <label class="text-danger">{{errors['list-agent']}}</label>
                                </div>
                            </div>
                            <select id="transfer_agent_select_list" class="dual-listbox" multiple v-if="this.$parent.ListTeams">
                                <option  v-for="list in this.$parent.ListTeams" :value="list.value">{{ list.label }}</option>
                            </select>
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
            }
        },
        watch: {},
        created() {},

        mounted () {
            $('#update-select-new-leader').select2({
                placeholder: 'Select New Leader',
                allowClear: true
            });
            $("#update-select-new-leader").change(function(){
                this.$parent.LeaderSelected = $("#update-select-new-leader").val();
            }.bind(this));
        },
        methods:
            {
                UpdateMembership() {
                    this.errors = [];
                    if((this.$parent.AgentSelected.length) && (this.$parent.LeaderSelected !== ''))
                    {
                        var url = '/api/v1/team/Updates/'+ this.$parent.LeaderSelected +'/update-network', method = 'post';

                        fetch(url, {
                            method: method,
                            body: JSON.stringify(this.$parent.AgentSelected),
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

                    if(!this.$parent.AgentSelected.length)
                    {
                        this.errors['list-agent'] = "Please select the agent to transfer";
                    }
                    if(!this.$parent.LeaderSelected)
                    {
                        this.errors['new-leader'] = "Please select the leader";
                    }

                },
            }
    }


</script>
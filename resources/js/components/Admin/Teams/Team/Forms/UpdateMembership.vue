<template>
    <div class="row ">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="card-title">
                        <span class="nav-icon mr-3">
                            <i class="flaticon2-percentage text-primary"></i>
                        </span>
                        Membership Info
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form  @submit.prevent="UpdateMembership">
                        <div class="card-body p-0 pl-0">
                            <div class="form-group">
                                <label>Membership No</label>
                                <div class="input-group" v-if="$parent.AgentDetails.member_no">
                                    <div class="input-group-prepend"><span class="input-group-text">KM</span></div>
                                    <input  type="text" class="form-control" v-model="String('00000' + $parent.AgentDetails.member_no).slice(-5)" disabled/>
                                </div>
                                <div class="input-group" v-if="!$parent.AgentDetails.member_no">
                                    <div class="input-group-prepend"><span class="input-group-text">TMP</span></div>
                                    <input  type="text" class="form-control" v-model="String('00000' + $parent.AgentDetails.id).slice(-5)" disabled/>
                                </div>
                            </div>
                            <div class="form-group mt-n5">
                                <label>Leader</label>
                                <input type="text" class="form-control" v-model="$parent.details1Leader.name" disabled/>
                            </div>
                            <div class="form-group mt-n5">
                                <label>Level</label>
                                <input type="text" class="form-control" v-model="this.$parent.detailsAgentLevels.name" disabled/>
                            </div>
                            <div class="form-group mt-n5">
                                <label>State</label>
                                <div class="row" v-if="('state' in errors)">
                                    <div class="col">
                                        <label class="text-danger">{{errors['state']}}</label>
                                    </div>
                                </div>
                                <select class="form-control select2" style="width:100%" id="update-select-state" v-model="this.$parent.detailsState.id">
                                    <option  v-for="State in States" :value="State.id">{{ State.name }}</option>
                                </select>
                            </div>
                            <div class="form-group mt-n5">
                                <label>Territory</label>
                                <div class="row" v-if="('territory' in errors)">
                                    <div class="col">
                                        <label class="text-danger">{{errors['territory']}}</label>
                                    </div>
                                </div>
                                <select class="form-control select2"style="width:100%" id="update-select-territory" v-model="this.$parent.detailsTerritory.id">
                                    <option  v-for="Territory in territories" :value="Territory.id">{{ Territory.name }}</option>
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
    </div>
</template>
<script>
    export default{
        data(){
            return{
                errors: [],
                States: [],
                territories: [],
                options:[],
                state_id: '',
            }
        },
        created() {
            this.getStateName();
            this.getTerritoryName();
        },

        mounted () {
            $("#update-select-state").change(function(){
                this.$parent.detailsState.id = $("#update-select-state").val();
            }.bind(this));
            $("#update-select-territory").change(function(){
                this.$parent.detailsTerritory.id = $("#update-select-territory").val();
            }.bind(this));
        },
        methods:
            {
                getStateName(){
                    axios.get('/api/v1/state/Lists/list-state')
                        .then(function (response) {
                            this.States = response.data;
                        }.bind(this));
                },
                getTerritoryName(){
                    axios.get('/api/v1/territory/Lists/list-territory')
                        .then(function (response) {
                            this.territories = response.data;
                        }.bind(this));
                },
                UpdateMembership() {
                    this.errors = [];
                    if((this.$parent.detailsState.id !== '') && (this.$parent.detailsTerritory.id !== ''))
                    {
                        var url = '/api/v1/team/Updates/'+ this.$parent.AgentDetails.id +'/update-membership', method = 'post';

                        fetch(url, {
                            method: method,
                            body: JSON.stringify({
                                territory_id: this.$parent.detailsTerritory.id,
                                state_id: this.$parent.detailsState.id,
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



                    if(!this.$parent.detailsState.id){
                        this.errors['state'] = "Please select the state"
                    }

                    if(!this.$parent.detailsTerritory.id)
                    {
                        this.errors['territory'] = "Please select the territory"
                    }

                },
            }
    }


</script>
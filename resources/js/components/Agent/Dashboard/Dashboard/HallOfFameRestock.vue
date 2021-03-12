<template>
    <div class="col-lg-6">
        <div class="row">
            <div class="col-lg-12  d-flex justify-content-end">
                <div class="card card-custom">
                    <div class=" ribbon ribbon-right">
                        <div class="ribbon-target bg-success" style="top: 10px; right: -2px;">
                            <i class="text-white fas fa-trophy"></i>
                        </div>
                    </div>
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label text-success text-center">Hall Of Fame - Restock</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-show="AgentDetails.agent_levels_id == 2" class="row mt-5">
            <div class="col-lg-12">
                <div class="card card-custom" data-card="true">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Master Stokis</h3>
                        </div>
                        <div class="card-toolbar">
                            <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-1" data-card-tool="toggle">
                                <i class="ki ki-arrow-down icon-nm"></i>
                            </a>
                            <a href="#" class="btn btn-icon btn-sm btn-light-success mr-1" data-card-tool="reload">
                                <i class="ki ki-reload icon-nm"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body pt-2">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(list,index) in ListHallOfFameRestocks">
                                <td :class="[{'text-primary': list.buyer_id.id === AgentDetails.user_id }]">{{index+1}}</td>
                                <td :class="[{'text-primary': list.buyer_id.id === AgentDetails.user_id }]">{{list.buyer_id.name}}</td>
                                <td :class="[{'text-primary': list.buyer_id.id === AgentDetails.user_id }]">{{list.total}}</td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <div v-show="AgentDetails.agent_levels_id == 3" class="row mt-5">
            <div class="col-lg-12">
                <div class="card card-custom" data-card="true">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Stokis</h3>
                        </div>
                        <div class="card-toolbar">
                            <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-1" data-card-tool="toggle">
                                <i class="ki ki-arrow-down icon-nm"></i>
                            </a>
                            <a href="#" class="btn btn-icon btn-sm btn-light-success mr-1" data-card-tool="reload">
                                <i class="ki ki-reload icon-nm"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(list,index) in ListHallOfFameRestocks">
                                <td :class="[{'text-primary': list.buyer_id.id === AgentDetails.user_id }]">{{index+1}}</td>
                                <td :class="[{'text-primary': list.buyer_id.id === AgentDetails.user_id }]">{{list.buyer_id.name}}</td>
                                <td :class="[{'text-primary': list.buyer_id.id === AgentDetails.user_id }]">{{list.total}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div v-show="AgentDetails.agent_levels_id == 4" class="row mt-5">
            <div class="col-lg-12">
                <div class="card card-custom" data-card="true">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Agent</h3>
                        </div>
                        <div class="card-toolbar">
                            <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-1" data-card-tool="toggle">
                                <i class="ki ki-arrow-down icon-nm"></i>
                            </a>
                            <a href="#" class="btn btn-icon btn-sm btn-light-success mr-1" data-card-tool="reload">
                                <i class="ki ki-reload icon-nm"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(list,index) in ListHallOfFameRestocks">
                                <td :class="[{'text-primary': list.buyer_id.id === AgentDetails.user_id }]">{{index+1}}</td>
                                <td :class="[{'text-primary': list.buyer_id.id === AgentDetails.user_id }]">{{list.buyer_id.name}}</td>
                                <td :class="[{'text-primary': list.buyer_id.id === AgentDetails.user_id }]">{{list.total}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div v-show="AgentDetails.agent_levels_id == 5" class="row mt-5">
            <div class="col-lg-12">
                <div class="card card-custom" data-card="true">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Mini Agent</h3>
                        </div>
                        <div class="card-toolbar">
                            <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-1" data-card-tool="toggle">
                                <i class="ki ki-arrow-down icon-nm"></i>
                            </a>
                            <a href="#" class="btn btn-icon btn-sm btn-light-success mr-1" data-card-tool="reload">
                                <i class="ki ki-reload icon-nm"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(list,index) in ListHallOfFameRestocks">
                                <td :class="[{'text-primary': list.buyer_id.id === AgentDetails.user_id }]">{{index+1}}</td>
                                <td :class="[{'text-primary': list.buyer_id.id === AgentDetails.user_id }]">{{list.buyer_id.name}}</td>
                                <td :class="[{'text-primary': list.buyer_id.id === AgentDetails.user_id }]">{{list.total}}</td>
                            </tr>
                            </tbody>
                        </table>
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
                ListHallOfFameRestocks:[],
                AgentDetails:[],
            }
        },
        mounted () {},
        created(){
            this.fetchAgentDetails();
        },
        methods:
            {
                fetchAgentDetails(){
                    fetch('/api/v1/team/Lists/' + this.$parent.data.id +'/agent-details').then(response => response.json())
                        .then(response => {
                            this.AgentDetails = response;
                            this.fetchMasterStokis();
                        })
                        .catch(error => console.log(error))
                },
                fetchMasterStokis(){
                    fetch('api/v1/orders/team/Lists/' + this.$parent.data.id +'/'+ this.AgentDetails.leader_id + '/'+ this.AgentDetails.agent_levels_id  +'/list-hall-of-fame-restock').then(response => response.json())
                        .then(response => {
                            this.ListHallOfFameRestocks = response.data;
                        })
                        .catch(error => console.log(error))
                },
            }
    }
</script>

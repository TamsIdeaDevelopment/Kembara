<template>
    <div>
        <div class="card card-custom">
            <div class="card-header flex-wrap py-5">
                <div class="card-title">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="card-label">Team Search
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form @submit.prevent="SearchTeam">
                    <div class="form-group mt-5 text-left">
                        <label >Register As</label>
                        <div class="row" v-if="('role' in errors)">
                            <div class="col">
                                <label class="text-danger">{{errors['role']}}</label>
                            </div>
                        </div>
                        <select class="form-control select2" style="width:100%" id="update-select-role" v-model="this.role_id">
                            <option  v-for="Role in Roles" :value="Role.id">{{ Role.name }}</option>
                        </select>
                    </div>
                    <div class="form-group mt-5 text-left">
                        <label >State</label>
                        <div class="row" v-if="('state' in errors)">
                            <div class="col">
                                <label class="text-danger">{{errors['state']}}</label>
                            </div>
                        </div>
                        <select class="form-control select2" style="width:100%" id="update-select-state" v-model="this.state_id">
                            <option  v-for="State in States" :value="State.id">{{ State.name }}</option>
                        </select>
                    </div>
                    <div class="form-group mt-5 text-left">
                        <label>Territory</label>
                        <div class="row" v-if="('territory' in errors)">
                            <div class="col">
                                <label class="text-danger">{{errors['territory']}}</label>
                            </div>
                        </div>
                        <select class="form-control select2"style="width:100%" id="update-select-territory" v-model="this.territory_id">
                            <option  v-for="Territory in territories" :value="Territory.id">{{ Territory.name }}</option>
                        </select>
                    </div>
                    <div class="card-footer pb-5 pr-0" style="display: flex; justify-content: flex-end">
                        <button type="submit" class="btn btn-primary mt-n5">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="">
            <list-agent-invite-form :data="this.Teams"></list-agent-invite-form>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                ListToggle: false,
                image_source: 'storage/ProfilePicture/',
                errors: [],
                Teams:[],
                Roles:[],
                States: [],
                territories: [],
                role_id: '',
                state_id: '',
                territory_id: '',
                dataTable:null,
            }
        },
        created(){
            this.getRoleName();
            this.fetchTeam();
            this.getStateName();
        },
        mounted() {
            VueEvent.$on('fetchTeam', () => {
                this.fetchTeam();
            });
            $('#update-select-role').select2({
                placeholder: 'Select',
                allowClear: true
            });
            $('#update-select-state').select2({
                placeholder: 'Select',
                allowClear: true
            });
            $('#update-select-territory').select2({
                placeholder: 'Select',
                allowClear: true
            });
            $("#update-select-state").change(function(){
                this.state_id = $("#update-select-state").val();
                this.getTerritoryName();

            }.bind(this));
            $("#update-select-territory").change(function(){
                this.territory_id = $("#update-select-territory").val();

            }.bind(this));
            $("#update-select-role").change(function(){
                this.role_id = $("#update-select-role").val();
            }.bind(this));
        },

        methods : {
            getStateName(){
                axios.get('/api/v1/state/Lists/list-state')
                    .then(function (response) {
                        this.States = response.data;
                    }.bind(this));
            },
            getTerritoryName(){
                this.territories= [];
                axios.get('/api/v1/territory/Lists/'+ this.state_id +'/list-territory-under-state')
                    .then(function (response) {
                        this.territories = response.data;
                    }.bind(this));
            },
            getRoleName(){
                axios.get('/api/v1/roles/Lists/list-agent-level')
                    .then(function (response) {
                        this.Roles = response.data.data;
                    }.bind(this));

            },
            fetchTeam(){
                fetch('/api/v1/team/Lists/hq').then(response => response.json())
                    .then(response => {
                        this.Teams = response.data;
                        $('#kt_datatable').DataTable().destroy();
                        this.$nextTick(() =>
                        {
                            $('#kt_datatable').DataTable(
                                {
                                    responsive: true,
                                    pagingType: 'full_numbers',
                                    columnDefs: [
                                        { "width": "50px", "targets": 0 },
                                        { "width": "50px", "targets": 1 },
                                        { "width": "350px", "targets": 2 },
                                        { "width": "50px", "targets": 3 },
                                        { "width": "50px", "targets": 4 },
                                        {
                                            //targets: 3,
                                            width: '100px',
                                            title: 'Actions',
                                            orderable: false,
                                            render: function(data, type, full, meta) {

                                            },
                                        },
                                    ],
                                }
                            );
                        });

                    })
                    .catch(error => console.log(error))
            },
            SearchTeam(){
                this.errors = [];
                if((this.role_id !== '') && (this.state_id !== '') && (this.territory_id !== ''))
                {
                    fetch('/api/v1/team/Lists/' + this.territory_id +'/' + this.role_id +'/search-teams').then(response => response.json())
                        .then(response => {
                            this.Teams = [];
                            this.Teams = response.data;
                            console.log(this.response.data)
                            $('#kt_datatable').DataTable().destroy();
                            this.$nextTick(() =>
                            {
                                $('#kt_datatable').DataTable(
                                    {
                                        responsive: true,
                                        pagingType: 'full_numbers',
                                        columnDefs: [
                                            { "width": "50px", "targets": 0 },
                                            { "width": "50px", "targets": 1 },
                                            { "width": "350px", "targets": 2 },
                                            { "width": "50px", "targets": 3 },
                                            { "width": "50px", "targets": 4 },
                                            {
                                                //targets: 3,
                                                width: '100px',
                                                title: 'Actions',
                                                orderable: false,
                                                render: function(data, type, full, meta) {

                                                },
                                            },
                                        ],
                                    }
                                );
                            });

                        })
                        .catch(error => console.log(error))
                }

                if(!this.role_id)
                {
                    this.errors['role'] = "Please select the register as"
                }


                if(!this.state_id){
                    this.errors['state'] = "Please select the state"
                }

                if(!this.territory_id)
                {
                    this.errors['territory'] = "Please select the territory"
                }
            },
        }
    }

</script>

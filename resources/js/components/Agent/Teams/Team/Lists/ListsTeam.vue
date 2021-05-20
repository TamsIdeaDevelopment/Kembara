<template>
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <h3 class="card-label">Teams
                    <span class="d-block text-muted pt-2 font-size-sm">List of Teams</span>
                </h3>
            </div>
            <div class="card-toolbar">
                <div class="row">
                    <div class="col-lg-8">
                        <select class="form-control select2" style="width:100%" id="select-agent-filter-team" v-model="filterTeam">
                            <option value="3">All</option>
                            <option value="1">Active</option>
                            <option value="0">Pending</option>
                            <option value="2">Not Active</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <button class="btn btn-sm btn-primary" @click="filterValidation"> Search</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <agent-team-elements :data="this.Teams"></agent-team-elements>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                image_source: 'storage/ProfilePicture/',
                Teams:[],
                dataTable:null,
                filterTeam:3,
            }
        },
        created(){
            this.fetchTeam();
        },
        mounted() {
            VueEvent.$on('fetchTeam', () => {
                this.fetchTeam();
            });

            VueEvent.$on('searchTeam', () => {
                this.searchTeam();
            });

            $('#select-agent-filter-team').select2({
                placeholder: "Status",
                allowClear: true
            });
            $("#select-agent-filter-team").change(function(){
                this.filterTeam = $("#select-agent-filter-team").val();
            }.bind(this));
        },

        methods : {
            filterValidation(){
                if(this.filterTeam == 3)
                {
                    this.fetchTeam();
                }
                else
                {
                    this.searchTeam();
                }
            },
            searchTeam()
            {
                fetch('/api/v1/team/Lists/'+ this.$parent.data.id  +'/'+ this.filterTeam +'/agent-filter-team').then(response => response.json())
                    .then(response => {
                        this.Teams = response.data;
                        $('#table-team-member').DataTable().destroy();
                        this.$nextTick(() =>
                        {
                            $('#table-team-member').DataTable(
                                {
                                    responsive: true,
                                    select:{items:'Status'},
                                    pagingType: 'full_numbers',
                                    columnDefs: [
                                        { "width": "50px", "targets": 0 },
                                        { "width": "50px", "targets": 1 },
                                        { "width": "550px", "targets": 2 },
                                        { "width": "90px", "targets": 3 },
                                        { "width": "50px", "targets": 4 },
                                        { "width": "50px", "targets": 5 },
                                        { "width": "150px", "targets": 6 },
                                        { "width": "50px", "targets": 7 },
                                        {
                                            //targets: 3,
                                            width: '50px',
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
            fetchTeam(){
                fetch('/api/v1/team/Lists/'+ this.$parent.data.id +'/team-members').then(response => response.json())
                    .then(response => {
                        this.Teams = response.data;
                        $('#table-team-member').DataTable().destroy();
                        this.$nextTick(() =>
                        {
                            $('#table-team-member').DataTable(
                                {
                                    //dom: 'Blfrtip',
                                    scrollX: false,
                                    //scrollY: '50vh',

                                    scrollCollapse: true,
                                    responsive: true,
                                    pagingType: 'full_numbers',
                                    columnDefs: [
                                        { "width": "50px", "targets": 0 },
                                        { "width": "150px", "targets": 1 },
                                        { "width": "300px", "targets": 2 },
                                        { "width": "50px", "targets": 3 },
                                        { "width": "50px", "targets": 4 },
                                        { "width": "50px", "targets": 5 },
                                        {
                                            //targets: 3,
                                            width: '50px',
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
        }
    }

</script>

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
                        <select class="form-control select2" style="width:100%" id="select-filter-team"    v-model="filterTeam">
                            <option value="3">All</option>
                            <option value="2">Not Active</option>
                            <option value="1">Active</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <button class="btn btn-sm btn-primary" @click="filterValidation"> Search</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <team-elements :data="this.Teams"></team-elements>
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
                filterTeam: 1,
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

            $('#select-filter-team').select2({
                placeholder: "Filter By Status",
                allowClear: true
            });
            $("#select-filter-team").change(function(){
                this.filterTeam = $("#select-filter-team").val();
            }.bind(this));
        },

        methods : {
            filterValidation(){
                if(this.filterTeam == 1)
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
                fetch('/api/v1/team/Lists/'+ this.filterTeam +'/admin-filter-team').then(response => response.json())
                    .then(response => {
                        this.Teams = response.data;
                        $('#kt_datatable').DataTable().destroy();
                        this.$nextTick(() =>
                        {
                            $('#kt_datatable').DataTable(
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
                fetch('/api/v1/team/Lists/teams').then(response => response.json())
                    .then(response => {
                        this.Teams = response.data;
                        console.log(this.Teams)
                        $('#kt_datatable').DataTable().destroy();
                        this.$nextTick(() =>
                        {
                            $('#kt_datatable').DataTable(
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
        }
    }

</script>

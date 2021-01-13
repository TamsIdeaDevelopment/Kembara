<template>
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <h3 class="card-label">Teams
                    <span class="d-block text-muted pt-2 font-size-sm">List of Teams</span>
                </h3>
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
            }
        },
        created(){
            this.fetchTeam();
        },
        mounted() {
            VueEvent.$on('fetchTeam', () => {
                this.fetchTeam();
            });
        },

        methods : {
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

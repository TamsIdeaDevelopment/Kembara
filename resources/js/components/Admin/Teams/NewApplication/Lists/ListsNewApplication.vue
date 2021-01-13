<template>
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <h3 class="card-label">Application
                    <span class="d-block text-muted pt-2 font-size-sm">List Of New Application</span>
                </h3>
            </div>
        </div>
        <div class="card-body">
            <new-application-elements :data="this.NewApplications"></new-application-elements>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                NewApplications:
                    [],
                dataTable:null,
            }
        },
        created(){
            this.fetchNewApplication();
        },
        mounted() {
            VueEvent.$on('fetchNewApplication', () => {
                this.fetchNewApplication();
            });
        },

        methods : {
            fetchNewApplication(){
                fetch('/api/v1/new-application/Lists/new-application').then(response => response.json())
                    .then(response => {
                        this.NewApplications = response.data;
                        $('#new-application-table').DataTable().destroy();
                        this.$nextTick(() =>
                        {
                            $('#new-application-table').DataTable(
                                {
                                    responsive: true,
                                    pagingType: 'full_numbers',
                                    columnDefs: [
                                        { "width": "50px", "targets": 0 },
                                        { "width": "50px", "targets": 1 },
                                        { "width": "550px", "targets": 2 },
                                        { "width": "50px", "targets": 3 },
                                        { "width": "50px", "targets": 4 },
                                        { "width": "50px", "targets": 5 },
                                        { "width": "50px", "targets": 6 },
                                        { "width": "150px", "targets": 7 },
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

<template>
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <h3 class="card-label">States
                    <span class="d-block text-muted pt-2 font-size-sm">List of State</span>
                </h3>
            </div>
            <div class="card-toolbar">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".newState">
                    <i class="fas fa-map-marker"></i> New State
                </button>
            </div>
        </div>
        <div class="card-body">
            <state-elements  :data="this.States"></state-elements>
        </div>
        <state-form-create :data="this.States"></state-form-create>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                States:[],
                dataTable:null,
            }
        },
        created(){
            this.fetchState();

        },
        mounted() {
            VueEvent.$on('fetchState', () => {
                this.fetchState();
            });
        },

        methods : {
            fetchState(){
                fetch('/api/v1/state/Lists/state').then(response => response.json())
                    .then(response => {
                        this.States = response.data;
                        $('#kt_datatable').DataTable().destroy();
                        this.$nextTick(() =>
                        {
                            $('#kt_datatable').DataTable(
                                {
                                    responsive: true,
                                    pagingType: 'full_numbers',
                                    columnDefs: [
                                        {
                                            //targets: 3,
                                            width: '125px',
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

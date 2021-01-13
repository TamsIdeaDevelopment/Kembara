<template>
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <h3 class="card-label">Territory
                    <span class="d-block text-muted pt-2 font-size-sm">List of Territories</span>
                </h3>
            </div>
            <div class="card-toolbar">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".newTerritory">
                    <i class="fas fa-map-marker"></i> New Territory
                </button>
            </div>
        </div>
        <div class="card-body">
            <territory-elements :data="this.Territories"></territory-elements>
        </div>
        <territory-form-create :data="this.Territories"></territory-form-create>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                Territories:[],
                dataTable:null,
            }
        },
        created(){
            this.fetchTerritory();

        },
        mounted() {
            VueEvent.$on('fetchTerritory', () => {
                this.fetchTerritory();
            });
        },

        methods : {
            fetchTerritory(){
                fetch('/api/v1/territory/Lists/territory').then(response => response.json())
                    .then(response => {
                        this.Territories = response.data;
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

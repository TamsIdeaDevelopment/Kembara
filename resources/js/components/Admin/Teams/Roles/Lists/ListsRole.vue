<template>
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <h3 class="card-label">Roles
                    <span class="d-block text-muted pt-2 font-size-sm">List of Role</span>
                </h3>
            </div>
            <div class="card-toolbar">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".newRoles">
                    <i class="flaticon2-user"></i> New Roles
                </button>
            </div>
        </div>
        <div class="card-body">
            <roles-elements  :data="this.Roles"></roles-elements>
        </div>
        <roles-form-create :data="this.Roles"></roles-form-create>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                Roles:[],
                dataTable:null,
            }
        },
        created(){
            this.fetchRole();
        },
        mounted() {
            VueEvent.$on('fetchRole', () => {
                this.fetchRole();
            });
        },

        methods : {
            fetchRole(){
                fetch('/api/v1/roles/Lists/roles').then(response => response.json())
                    .then(response => {
                        this.Roles = response.data;
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

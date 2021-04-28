<template>
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <h3 class="card-label">Packages
                    <span class="d-block text-muted pt-2 font-size-sm">List of Packages</span>
                </h3>
            </div>
        </div>
        <div class="card-body">
            <agent-mini-package-elements :data="this.Package"></agent-mini-package-elements>
        </div>
    </div>
</template>
<script>
    import { EventBus } from "../../../../app";
    export default {
        props: ['data'],
        data() {
            return {
                errors:[],
                Carts: [],
                Count: [],
                Totals: [],
                minimum_order:0,
                Package: [],
                dataTable:null,
            }
        },
        mounted() {
            EventBus.$on('updateDashboardCart', () => {
                this.fetchCart();
            });

            VueEvent.$on('fetchPackage', () => {
                this.fetchPackage();
            });
        },
        watch: {
            data() {}
        },
        created(){
            this.fetchAgentDetails();
            this.fetchPackage();
        },
        methods: {
            fetchAgentDetails(){
                fetch('/api/v1/team/Lists/' + this.$parent.data.id +'/agent-info').then(response => response.json())
                    .then(response => {
                        this.$parent.AgentDetails = response.data;
                        console.log(this.$parent.AgentDetails.agent_levels_id.id)

                    })
                    .catch(error => console.log(error))
            },
            fetchPackage(){
                fetch('/api/v1/product/Lists/package').then(response => response.json())
                    .then(response => {
                        this.Package = response.data;
                        $('#kt_datatable').DataTable().destroy();
                        this.$nextTick(() =>
                        {
                            $('#kt_datatable').DataTable(
                                {
                                    responsive: true,
                                    pagingType: 'full_numbers',
                                    columnDefs: [
                                        { "width": "50px", "targets": 0 },
                                        { "width": "450px", "targets": 1 },
                                        { "width": "50px", "targets": 2 },
                                        { "width": "50px", "targets": 3 },
                                        { "width": "50px", "targets": 4 },
                                        {
                                            //targets: 3,
                                            width: '150px',
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

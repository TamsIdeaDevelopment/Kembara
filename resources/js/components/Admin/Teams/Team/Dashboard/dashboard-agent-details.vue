<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-xxl-12 ">
                <div class="card-custom gutter-b">
                    <div class="card-body d-flex flex-column">
                        <div class="row">
                            <div class="col-lg-4 col-xxl-3">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card card-custom gutter-b">
                                            <div class="card-header justify-content-center">
                                                <div class="text-center mt-5 mb-5">
                                                    <div class="symbol symbol-150 symbol-xl-150" v-if="details.avatar">
                                                        <div class="symbol-label"  :style="'background-image:url('+ image_source + details.avatar +')'"></div>
                                                    </div>
                                                    <div class="symbol symbol-150 symbol-xl-150" v-if="!details.avatar">
                                                        <div class="symbol-label  w-150px h-150px"> <i class="flaticon2-user"></i></div>
                                                    </div>
                                                    <h5 class="font-weight-bold my-2 mt-5">{{details.name}}</h5>
                                                    <span v-if="AgentDetails.status =='0'" class="label label-warning label-pill label-inline mr-2">Pending</span>
                                                    <span v-if="AgentDetails.status =='1'" class="label label-success label-pill label-inline mr-2">Active</span>
                                                    <span v-if="AgentDetails.status =='2'" class="label label-danger label-pill label-inline mr-2">Not Active</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-xxl-12">
                                        <div class="card card-custom gutter-b">
                                            <div class="card-header  justify-content-center">
                                                <div class="navi navi-bold navi-hover navi-active navi-link-rounded  mt-5 mb-5">
                                                    <ul class="navi-item mb-2 nav nav-link" id="myTab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active navi-link py-4" id="personal-tab" data-toggle="tab" href="#personal-detail">
                                                                <span class="nav-icon">
                                                                    <i class="flaticon2-user"></i>
                                                                </span><span class="nav-text">Personal Information</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link navi-link py-4" id="picture-tab" data-toggle="tab" href="#picture-detail">
                                                                <span class="nav-icon">
                                                                    <i class="flaticon2-image-file"></i>
                                                                </span><span class="nav-text">Picture</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link navi-link py-4" id="membership-tab" data-toggle="tab" href="#membership-detail">
                                                                <span class="nav-icon">
                                                                    <i class="flaticon2-percentage"></i>
                                                                </span>
                                                                <span class="nav-text">Membership</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link navi-link py-4" id="team-settings-tab" data-toggle="tab" href="#team-settings">
                                                                <span class="nav-icon">
                                                                    <i class="flaticon2-settings"></i>
                                                                </span>
                                                                <span class="nav-text">Membership Settings</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link navi-link py-4" id="team-member-tab" data-toggle="tab" href="#team-member-detail">
                                                                <span class="nav-icon">
                                                                    <i class="flaticon2-group"></i>
                                                                </span>
                                                                <span class="nav-text">Team Members</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link navi-link py-4" id="restock-tab" data-toggle="tab" href="#restock-detail">
                                                                <span class="nav-icon">
                                                                    <i class="flaticon-shopping-basket"></i>
                                                                </span>
                                                                <span class="nav-text">Restock</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link navi-link py-4" id="sales-tab" data-toggle="tab" href="#sales-detail">
                                                                <span class="nav-icon">
                                                                    <i class="flaticon-price-tag"></i>
                                                                </span>
                                                                <span class="nav-text">Sales Team</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link navi-link py-4" id="customer-tab" data-toggle="tab" href="#customer-detail">
                                                                <span class="nav-icon">
                                                                    <i class="fas fa-tags"></i>
                                                                </span>
                                                                <span class="nav-text">Sales Personal</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link navi-link py-4" id="stock-tab" data-toggle="tab" href="#stock-detail">
                                                                <span class="nav-icon">
                                                                    <i class="flaticon2-layers"></i>
                                                                </span>
                                                                <span class="nav-text">Stock</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link navi-link py-4" id="point-tab" data-toggle="tab" href="#point">
                                                                <span class="nav-icon">
                                                                    <i class="flaticon-coins"></i>
                                                                </span><span class="nav-text">Point</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-xxl-9">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card card-custom gutter-b">
                                            <div class="card-body">

                                                <div class="tab-content mt-5" id="myTabContent">
                                                    <div class="tab-pane show active fade pb-0" id="personal-detail" role="tabpanel">
                                                        <admin-user-personal-information></admin-user-personal-information>
                                                    </div>
                                                    <div class="tab-pane fade" id="picture-detail" role="tabpanel">
                                                        <admin-user-profile-image></admin-user-profile-image>
                                                    </div>
                                                    <div class="tab-pane fade" id="membership-detail" role="tabpanel">
                                                        <team-membership-form-update></team-membership-form-update>
                                                    </div>
                                                    <div class="tab-pane fade" id="team-settings" role="tabpanel">
                                                        <team-settings-form-update></team-settings-form-update>
                                                    </div>
                                                    <div class="tab-pane fade" id="team-member-detail" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <h3 class="card-title">
                                                                    <span class="nav-icon mr-3">
                                                                        <i class="flaticon2-group text-primary"></i>
                                                                    </span>
                                                                    Team Members
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <team-member-elements :data="this.Teams"></team-member-elements>
                                                    </div>
                                                    <div class="tab-pane fade " id="restock-detail" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <h3 class="card-title">
                                                                    <span class="nav-icon mr-3">
                                                                        <i class="flaticon-shopping-basket text-primary"></i>
                                                                    </span>
                                                                    Restock
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <team-order-hq-elements :data="this.Orders"></team-order-hq-elements>
                                                    </div>
                                                    <div class="tab-pane fade" id="sales-detail" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <h3 class="card-title">
                                                                    <span class="nav-icon mr-3">
                                                                        <i class="flaticon-price-tag text-primary"></i>
                                                                    </span>
                                                                    Sales Team
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <order-team-agent-agent-elements :data="this.AgentOrder"></order-team-agent-agent-elements>
                                                    </div>
                                                    <div class="tab-pane fade" id="customer-detail" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <h3 class="card-title">
                                                                    <span class="nav-icon mr-3">
                                                                        <i class="fas fa-tags text-primary"></i>
                                                                    </span>
                                                                    Sales Personal
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <agent-customer-elements :data="this.CustomerOrder"></agent-customer-elements>
                                                    </div>
                                                    <div class="tab-pane fade" id="stock-detail" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <h3 class="card-title">
                                                                    <span class="nav-icon mr-3">
                                                                        <i class="flaticon2-layers text-primary"></i>
                                                                    </span>
                                                                    Stock
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <admin-stock-elements :data="this.Stock" :data2="this.data"></admin-stock-elements>
                                                        <!--<agent-sales-team-elements :data="this.AgentOrder"></agent-sales-team-elements>-->
                                                    </div>
                                                    <div class="tab-pane fade" id="point" role="tabpanel">
                                                        <team-point-form-update></team-point-form-update>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['data','data2'],
        data() {
            return {
                image_source: 'storage/ProfilePicture/',
                AgentDetails:[],
                LeaderDetails:[],
                details:[],
                details1Leader:[],
                detailsAgentLevels:[],
                detailsState:[],
                detailsTerritory:[],
                Teams:[],
                Orders:[],
                AgentOrder:[],
                ListTeams:[],
                Stock:[],
                CustomerOrder:[],
            }
        },
        mounted() {
            VueEvent.$on('fetchAgentDetails', () => {
                this.fetchAgentDetails();
            });

        },
        created(){
            this.fetchAgentDetails();
        },
        methods: {

            fetchAgentDetails(){
                fetch('/api/v1/team/Lists/' + this.data +'/agent-info').then(response => response.json())
                    .then(response => {
                        this.AgentDetails = response.data;
                        this.details = response.data.user_id;
                        this.detailsAgentLevels = response.data.agent_levels_id;
                        this.detailsState = response.data.state_id;
                        this.detailsTerritory = response.data.territory_id;
                        this.fetchTeam();
                        this.fetchHQOrder();
                        this.fetchAgentOrder();
                        this.fetchCustomerOrder();
                        this.fetchLeaderDetails();
                        this.fetchProduct();
                        $('#update-select-state').select2({
                            placeholder: this.detailsState.name,
                            allowClear: true
                        });
                        $('#update-select-state-profile').select2({
                            placeholder: this.detailsState.name,
                            allowClear: true
                        });
                        $('#update-select-territory').select2({
                            placeholder: this.detailsTerritory.name,
                            allowClear: true
                        });
                        $('#upgrade-downgrade-select-agent-levels').select2({
                            placeholder: this.detailsAgentLevels.name,
                            allowClear: true
                        });

                    })
                    .catch(error => console.log(error))
            },
            fetchLeaderDetails(){
                fetch('/api/v1/team/Lists/' + this.AgentDetails.leader_id.id +'/agent-profile').then(response => response.json())
                    .then(response => {
                        this.LeaderDetails = response.data;
                        this.details1Leader = response.data.user_id;
                    })
                    .catch(error => console.log(error))
            },
            fetchTeam(){
                fetch('/api/v1/team/Lists/'+ this.details.id +'/team-members').then(response => response.json())
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
            fetchHQOrder(){
                fetch('/api/v1/orders/team/Lists/'+ this.details.id + '/agent-restock-team').then(response => response.json())
                    .then(response => {
                        this.Orders = response;
                        $('#table-hq-order').DataTable().destroy();
                        this.$nextTick(() =>
                        {
                            $('#table-hq-order').DataTable(
                                {
                                    scrollX: false,
                                    scrollCollapse: true,
                                    responsive: true,
                                    pagingType: 'full_numbers',
                                    columnDefs: [
                                        { "width": "50px", "targets": 0 },
                                        { "width": "350px", "targets": 1 },
                                        { "width": "50px", "targets": 2 },
                                        { "width": "100px", "targets": 3 },
                                        { "width": "50px", "targets": 4 },
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
            fetchAgentOrder(){
                fetch('/api/v1/orders/team/Lists/'+ this.details.id + '/agent-orders-team').then(response => response.json())
                    .then(response => {
                        this.AgentOrder = response;
                        $('#table-agent-order').DataTable().destroy();
                        this.$nextTick(() =>
                        {
                            $('#table-agent-order').DataTable(
                                {
                                    scrollX: false,
                                    scrollCollapse: true,
                                    responsive: true,
                                    pagingType: 'full_numbers',
                                    columnDefs: [
                                        { "width": "50px", "targets": 0 },
                                        { "width": "150px", "targets": 1 },
                                        { "width": "300px", "targets": 2 },
                                        { "width": "100px", "targets": 3 },
                                        { "width": "50px", "targets": 4 },
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
            fetchCustomerOrder(){
                fetch('/api/v1/Customer/Lists/'+ this.details.id + '/agent-list-customer-order-team').then(response => response.json())
                    .then(response => {
                        this.CustomerOrder = response;
                        $('#table-customer-order').DataTable().destroy();
                        this.$nextTick(() =>
                        {
                            $('#table-customer-order').DataTable(
                                {
                                    scrollX: false,
                                    scrollCollapse: true,
                                    responsive: true,
                                    pagingType: 'full_numbers',
                                    columnDefs: [
                                        { "width": "50px", "targets": 0 },
                                        { "width": "150px", "targets": 1 },
                                        { "width": "300px", "targets": 2 },
                                        { "width": "100px", "targets": 3 },
                                        { "width": "50px", "targets": 4 },
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
            fetchProduct(){
                fetch('/api/v1/product/Lists/' + this.details.id +'/stock-list-agent').then(response => response.json())
                    .then(response => {
                        this.Stock = response.data;
                        $('#stock_table').DataTable().destroy();
                        this.$nextTick(() =>
                        {
                            $('#stock_table').DataTable(
                                {
                                    responsive: true,
                                    pagingType: 'full_numbers',
                                    columnDefs: [
                                        { "width": "50px", "targets": 0 },
                                        { "width": "450px", "targets": 1 },
                                        { "width": "50px", "targets": 2 },
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

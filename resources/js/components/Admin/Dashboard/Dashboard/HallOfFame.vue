<template>
    <div class="col-lg-6">
        <div class="row">
            <div class="col-lg-12  d-flex justify-content-end">
                <div class="card card-custom">
                    <div class=" ribbon ribbon-right">
                        <div class="ribbon-target bg-success" style="top: 10px; right: -2px;">
                            <i class="text-white fas fa-trophy"></i>
                        </div>
                    </div>
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label text-success text-center">Hall Of Fame - Restock HQ</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="card card-custom card-collapsed" data-card="true">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Master Stokis</h3>
                        </div>
                        <div class="card-toolbar">
                            <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-1" data-card-tool="toggle">
                                <i class="ki ki-arrow-down icon-nm"></i>
                            </a>
                            <a href="#" class="btn btn-icon btn-sm btn-light-success mr-1" data-card-tool="reload">
                                <i class="ki ki-reload icon-nm"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body pt-2">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(list,index) in MasterStokis">
                                <td>{{index+1}}</td>
                                <td>{{list.buyer_id.name}}</td>
                                <td>{{list.total}}</td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="card card-custom card-collapsed" data-card="true">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Stokis</h3>
                        </div>
                        <div class="card-toolbar">
                            <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-1" data-card-tool="toggle">
                                <i class="ki ki-arrow-down icon-nm"></i>
                            </a>
                            <a href="#" class="btn btn-icon btn-sm btn-light-success mr-1" data-card-tool="reload">
                                <i class="ki ki-reload icon-nm"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(list,index) in Stokis">
                                <td>{{index+1}}</td>
                                <td>{{list.buyer_id.name}}</td>
                                <td>{{list.total}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="card card-custom card-collapsed" data-card="true">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Agent</h3>
                        </div>
                        <div class="card-toolbar">
                            <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-1" data-card-tool="toggle">
                                <i class="ki ki-arrow-down icon-nm"></i>
                            </a>
                            <a href="#" class="btn btn-icon btn-sm btn-light-success mr-1" data-card-tool="reload">
                                <i class="ki ki-reload icon-nm"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(list,index) in Agent">
                                <td>{{index+1}}</td>
                                <td>{{list.buyer_id.name}}</td>
                                <td>{{list.total}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="card card-custom card-collapsed" data-card="true">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Mini Agent</h3>
                        </div>
                        <div class="card-toolbar">
                            <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-1" data-card-tool="toggle">
                                <i class="ki ki-arrow-down icon-nm"></i>
                            </a>
                            <a href="#" class="btn btn-icon btn-sm btn-light-success mr-1" data-card-tool="reload">
                                <i class="ki ki-reload icon-nm"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(list,index) in MiniAgent">
                                <td>{{index+1}}</td>
                                <td>{{list.buyer_id.name}}</td>
                                <td>{{list.total}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['data'],
        data() {
            return {
                MasterStokis:[],
                Stokis:[],
                Agent:[],
                MiniAgent:[],

            }
        },
        mounted () {},
        created(){
            this.fetchMasterStokis();
            this.fetchStokis();
            this.fetchaAgent();
            this.fetchMiniAgent();
        },
        methods:
            {
                fetchMasterStokis(){
                    fetch('api/v1/orders/HQ/Lists/' + this.$parent.data.id +'/list-hall-of-fame-master-stokis').then(response => response.json())
                        .then(response => {
                            this.MasterStokis = response.data;
                        })
                        .catch(error => console.log(error))
                },
                fetchStokis(){
                    fetch('api/v1/orders/HQ/Lists/' + this.$parent.data.id +'/list-hall-of-fame-stokis').then(response => response.json())
                        .then(response => {
                            this.Stokis = response.data;
                        })
                        .catch(error => console.log(error))
                },
                fetchaAgent(){
                    fetch('api/v1/orders/HQ/Lists/' + this.$parent.data.id +'/list-hall-of-fame-agent').then(response => response.json())
                        .then(response => {
                            this.Agent = response.data;
                        })
                        .catch(error => console.log(error))
                },
                fetchMiniAgent(){
                    fetch('api/v1/orders/HQ/Lists/' + this.$parent.data.id +'/list-hall-of-fame-mini-agent').then(response => response.json())
                        .then(response => {
                            this.MiniAgent = response.data;
                        })
                        .catch(error => console.log(error))
                },
            }
    }
</script>

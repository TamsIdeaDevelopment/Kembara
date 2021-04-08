<template>
    <div class="col-lg-6">
        <div class="row mt-1">
            <div class="col-6  d-flex justify-content-end">
                <select class="form-control select2" style="width:100%" id="select-month" v-model="MonthSelected">
                    <option v-for="Month in Months" :value="Month">{{ Month }}</option>
                </select>
            </div>
            <div class="col-6  d-flex justify-content-end">
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
<!--                <div class="card card-custom card-collapsed" data-card="true">-->
                <div class="card card-custom" data-card="true">
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
                        <div class="row" v-if="isSpinner">
                            <div class="col-lg-12 d-flex justify-content-center">
                                <div class="spinner spinner-success d-flex align-items-center">
                                </div>
                            </div>
                        </div>
                        <table class="table table-sm"  v-if="!isSpinner">
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
                <div class="card card-custom" data-card="true">
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
                        <div class="row" v-if="isSpinner">
                            <div class="col-lg-12 d-flex justify-content-center">
                                <div class="spinner spinner-success d-flex align-items-center">
                                </div>
                            </div>
                        </div>
                        <table class="table table-sm"  v-if="!isSpinner">
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
                <div class="card card-custom" data-card="true">
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
                        <div class="row" v-if="isSpinner">
                            <div class="col-lg-12 d-flex justify-content-center">
                                <div class="spinner spinner-success d-flex align-items-center">
                                </div>
                            </div>
                        </div>
                        <table class="table table-sm"  v-if="!isSpinner">
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
                <div class="card card-custom" data-card="true">
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
                        <div class="row" v-if="isSpinner">
                            <div class="col-lg-12 d-flex justify-content-center">
                                <div class="spinner spinner-success d-flex align-items-center">
                                </div>
                            </div>
                        </div>
                        <table class="table table-sm"  v-if="!isSpinner">
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
                Months:[],
                MonthSelected:'0',
                isSpinner: false,

            }
        },
        mounted () {
            $('#select-month').select2({
                placeholder: "Search By Month",
                allowClear: true
            });
            $("#select-month").change(function(){
                this.MonthSelected = $("#select-month").val();

                this.fetchMasterStokis();
                this.fetchStokis();
                this.fetchaAgent();
                this.fetchMiniAgent();
            }.bind(this));
        },
        created(){
            this.fetchMonth();
            this.fetchMasterStokis();
            this.fetchStokis();
            this.fetchaAgent();
            this.fetchMiniAgent();
        },
        methods:
            {
                fetchMonth(){
                    fetch('api/v1/orders/HQ/Lists/dropdown-date').then(response => response.json())
                        .then(response => {
                            this.Months = response;
                        })
                        .catch(error => console.log(error))
                },
                fetchMasterStokis(){
                    this.isSpinner = true;
                    fetch('api/v1/orders/HQ/Lists/' + this.$parent.data.id +'/'+ this.MonthSelected +'/list-hall-of-fame-master-stokis').then(response => response.json())
                        .then(response => {
                            this.MasterStokis = response.data;
                            this.isSpinner = false;
                        })
                        .catch(error => console.log(error))
                },
                fetchStokis(){
                    this.isSpinner = true;
                    fetch('api/v1/orders/HQ/Lists/' + this.$parent.data.id +'/'+ this.MonthSelected +'/list-hall-of-fame-stokis').then(response => response.json())
                        .then(response => {
                            this.Stokis = response.data;
                            this.isSpinner = false;

                        })
                        .catch(error => console.log(error))
                },
                fetchaAgent(){
                    this.isSpinner = true;
                    fetch('api/v1/orders/HQ/Lists/' + this.$parent.data.id +'/'+ this.MonthSelected +'/list-hall-of-fame-agent').then(response => response.json())
                        .then(response => {
                            this.Agent = response.data;
                            this.isSpinner = false;
                        })
                        .catch(error => console.log(error))
                },
                fetchMiniAgent(){
                    this.isSpinner = true;
                    fetch('api/v1/orders/HQ/Lists/' + this.$parent.data.id +'/'+ this.MonthSelected +'/list-hall-of-fame-mini-agent').then(response => response.json())
                        .then(response => {
                            this.MiniAgent = response.data;
                            this.isSpinner = false;
                        })
                        .catch(error => console.log(error))
                },
            }
    }
</script>

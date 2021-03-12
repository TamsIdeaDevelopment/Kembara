<template>
    <table  style="width:100%" class="table table-separate table-head-custom table-checkable responsive display nowrap" id="table-hq-order">
        <thead>
        <tr>
            <th data-priority="1"></th>
            <th data-priority="2">No</th>
            <th>Seller</th>
            <th>Total</th>
            <th>Date</th>
            <th>Paid Status</th>
            <th>Order Status</th>
            <th>View</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(Order, index) in data">
            <td>{{index+1}}</td>
            <td>#{{String('00000' + Order.id).slice(-5)}}</td>
            <td>
                <div class="row" v-if="Order.HQ == 0">
                    <div class="col-auto">
                        <div class="row">
                            <div class="col-12">
                                <div class="symbol" v-if="Order.seller_id.avatar">
                                    <div class="symbol-label  w-50px h-50px" :style="'background-image:url('+ image_source + Order.seller_id.avatar +')'"></div>
                                </div>
                                <div class="symbol" v-if="!Order.seller_id.avatar">
                                    <div class="symbol-label  w-50px h-50px"> <i class="flaticon2-user"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-auto">
                                {{Order.seller_id.name}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" v-if="Order.HQ == 1">
                    <div class="col-auto">
                        HQ
                    </div>
                </div>
            </td>
            <td>{{Order.total}}</td>
            <td>{{Order.created_at}}</td>
            <td>
                <span v-if="Order.paid =='0'" class="label label-warning label-pill label-inline mr-2">PENDING</span>
                <span v-if="Order.paid =='1'" class="label label-success label-pill label-inline mr-2">SUCCESS</span>
                <span v-if="Order.paid =='2'" class="label label-danger label-pill label-inline mr-2">FAILED</span>
            </td>
            <td>
                <span v-if="Order.status =='2'" class="label label-warning label-pill label-inline mr-2">PROCESSING</span>
                <span v-if="Order.status =='1'" class="label label-success label-pill label-inline mr-2">SUCCESS</span>
                <span v-if="Order.status =='3'" class="label label-danger label-pill label-inline mr-2">REJECTED</span>
                <span v-if="Order.status =='4'" class="label label-warning label-pill label-inline mr-2">PENDING PAYMENT</span>
            </td>
            <td>
                <a :href="Order.id +'/order-details'" class="btn btn-sm btn-primary">View</a>
            </td>

        </tr>
        </tbody>
    </table>
</template>
<script>
    export default {
        props: ['data'],
        data() {
            return {
                image_source: 'storage/ProfilePicture/',
                Order:[],
                dataTable:null,
                editing: false,
            }
        },
        mounted() {
            VueEvent.$on('updateTable', () => {
                this.updateTable();
            });
        },
        watch: {
            data() {}
        },
        created(){},
        methods: {
//            openEditRecord(data){
//                $(".updateState").modal('show');
//                this.States = data;
//            },
//            openDeleteRecord(data){
//                $(".deleteState").modal('show');
//                this.States = data;
//            },
        }

    }

</script>

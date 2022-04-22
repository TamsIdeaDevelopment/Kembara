<template>
    <table class="table table-separate table-head-custom table-checkable responsive display nowrap" id="kt_datatable">
        <thead>
        <tr>
            <th>No</th>
            <th data-priority="1">#</th>
            <th >Buyer</th>
            <th>Seller</th>
            <th data-priority="2">Date</th>
            <th>Paid Status</th>
            <th>Status</th>
            <th>Total</th>
            <th>View</th>
            <!--<th>Actions</th>-->
        </tr>
        </thead>
        <tbody>
        <tr v-for="(Order, index) in data">
            <td>{{index+1}}</td>
            <td>
                <a v-if="Order.paid == '0'" :href="'get-billplz/' +Order.id"># {{String('00000' + Order.id).slice(-6)}}</a>
                <a v-if="Order.paid == '1'" :href="Order.id +'/order-details'"># {{String('00000' + Order.id).slice(-6)}}</a>
                <a v-if="Order.paid == '2'" :href="Order.id +'/order-details'"># {{String('00000' + Order.id).slice(-6)}}</a>
            </td>
            <td>
                <div class="row">
                    <div class="col-auto">
                        <div class="row">
                            <div class="col-12">
                                <div class="symbol" v-if="Order.buyer_id.avatar">
                                    <div class="symbol-label  w-50px h-50px" :style="'background-image:url('+ image_source + Order.buyer_id.avatar +')'"></div>
                                </div>
                                <div class="symbol" v-if="!Order.buyer_id.avatar">
                                    <div class="symbol-label  w-50px h-50px"> <i class="flaticon2-user"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-auto">
                                {{Order.buyer_id.name}}
                                <span class="text-success" v-if="Order.buyer_id.paid"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <span v-if="Order.HQ =='1'">HQ</span>
             </td>
            <td>{{Order.created_at}}</td>
            <td>
                <span v-if="Order.paid =='0'" class="label label-warning label-pill label-inline mr-2">Pending</span>
                <span v-if="Order.paid =='1'" class="label label-success label-pill label-inline mr-2">Success</span>
                <span v-if="Order.paid =='2'" class="label label-danger label-pill label-inline mr-2">Decline</span>
            </td>
            <td>
                <span v-if="Order.status =='2'" class="label label-warning label-pill label-inline mr-2">PROCESSING</span>
                <span v-if="Order.status =='1'" class="label label-success label-pill label-inline mr-2">SUCCESS</span>
                <span v-if="Order.status =='3'" class="label label-danger label-pill label-inline mr-2">REJECTED</span>
                <span v-if="Order.status =='0'" class="label label-warning label-pill label-inline mr-2">PENDING PAYMENT</span>
            </td>
            <td>
                RM {{Order.total}}
            </td>
            <td>
                <div v-if="Order.status =='2'">
                    <div class="row">
                        <div class="col-lg-12">
                            <a :href="Order.id +'/order-details'" class="btn btn-sm btn-secondary">View</a>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-lg-12">
                            <a href="javascript:;" @click="completeOrder(Order.id,Order.buyer_id.id)" class="btn btn-sm btn-primary">Mark as Complete</a>
                        </div>
                    </div>
                </div>
                <div v-if="Order.status =='1' || Order.status =='3'">
                    <a :href="Order.id +'/order-details'" class="btn btn-sm btn-secondary">View</a>
                </div>
                <div v-if="Order.status =='0'">
                    <a  :href="'get-billplz/' +Order.id" class="btn btn-sm btn-secondary">View</a>
                </div>
            </td>
            <!--<td>-->
                <!--<button class="btn btn-sm btn-danger">Delete</button>-->
                <!--&lt;!&ndash;<div class="row ">&ndash;&gt;-->
                    <!--&lt;!&ndash;<div class="col-sm-auto mb-1">&ndash;&gt;-->
                        <!--&lt;!&ndash;<button class="btn btn-sm btn-success">Stock</button>&ndash;&gt;-->
                    <!--&lt;!&ndash;</div>&ndash;&gt;-->
                    <!--&lt;!&ndash;<div class="col-sm-auto">&ndash;&gt;-->
                        <!--&lt;!&ndash;<button class="btn btn-sm btn-danger">Delete</button>&ndash;&gt;-->
                    <!--&lt;!&ndash;</div>&ndash;&gt;-->
                <!--&lt;!&ndash;</div>&ndash;&gt;-->
            <!--</td>-->
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
           completeOrder(order_id,buyer_id){
               var url = '/api/v1/orders/HQ/Updates/'+ order_id + '/'+ buyer_id +'/complete-order', method = 'post';

               fetch(url, {
                   method: method,
                   body: JSON.stringify(),
                   headers: {
                       'content-type': 'application/json'
                   }
               }).then((response) => {
                   if(this.$parent.filterOrder =='4')
                   {
                       VueEvent.$emit('fetchOrder');
                   }
                   else
                   {
                       VueEvent.$emit('searchOrder');
                   }
                   toastr.options = {
                       "closeButton": true,
                       "debug": false,
                       "newestOnTop": false,
                       "progressBar": false,
                       "positionClass": "toast-top-right",
                       "preventDuplicates": false,
                       "onclick": null,
                       "showDuration": "300",
                       "hideDuration": "1000",
                       "timeOut": "5000",
                       "extendedTimeOut": "1000",
                       "showEasing": "swing",
                       "hideEasing": "linear",
                       "showMethod": "fadeIn",
                       "hideMethod": "fadeOut"
                   };
                   toastr.success("Successfully Complete Order.", "Order Completed");
               })
           },
        }

    }

</script>

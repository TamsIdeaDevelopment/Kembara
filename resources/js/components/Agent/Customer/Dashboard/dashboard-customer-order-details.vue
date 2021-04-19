<template>
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid mt-n10">
            <div class="row justify-content-center mt-3 mb-10 d-print-none">
                <div class="col-md-6">

                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary font-weight-bold d-print-none" onclick="window.print();">Print Invoice</button>
                    </div>
                </div>
            </div>
            <div class="card card-custom gutter-b" id="html1">
                <div class="card-body p-0">
                    <div class="row justify-content-center py-8 px-8 py-md-27 px-md-0">
                        <div class="col-md-11">
                            <div class="d-flex justify-content-between pb-5 pb-md-20 flex-column flex-md-row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-lg-8 col-sm-8">
                                            <h1 class="display-4 font-weight-boldest mb-10">Order: <span class="text-primary">{{String('00000' + Order.id).slice(-6)}} </span></h1>
                                            <h6 class="font-weight-bolder mt-8">Order Date: <span class="text-primary">{{Order.created_at}}</span></h6>
                                        </div>
                                        <div class="col-lg-4 col-sm-4 justify-content-end">
                                            <div class="d-flex flex-column align-items-md-end px-0 mt-n20">
                                                <a href="#" class="mb-5">
                                                    <img :src="'assets/img/kembara-logo-depan.png'" alt=""  style="height:200px; width:250px" class="mr-n15"/>
                                                </a>
                                                <span class="d-flex flex-column align-items-md-end opacity-70 mr-n7 mt-n20">
                                                    <span>No. CS23A, Jalan Puteri 2A/6,</span>
                                                    <span>43000 Kajang, Selangor</span>
                                                </span>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12"  v-if="Order.HQ == 1">
                                            <h3 class="font-weight-bolder mt-8">BILL FROM :</h3>
                                            <h3 class="font-weight-bolder text-primary"> {{Order.seller_id.company_name}}</h3>
                                            <h5 class="font-weight-bolder"> Kembara Meals HQ</h5>
                                            <span class="opacity-70">
                                                No. CS23A, Jalan Puteri 2A/6,
                                                <br />43000 Kajang, Selangor
                                                <br/>Malaysia
                                            </span>
                                            <span class="opacity-70">
                                            <br />
                                                03-8727 8287
                                            </span>
                                        </div>
                                        <div class="col-lg-12"  v-if="Order.HQ == 0">
                                            <h3 class="font-weight-bolder mb-5">BILL FROM :</h3>
                                            <h3 class="font-weight-bolder text-primary" v-if="Order.seller_id.company_name !== null && Order.seller_id.company_name !== '-'"> {{Order.seller_id.company_name}}</h3>
                                            <h5 class="font-weight-bolder"> {{Order.seller_id.name}}</h5>
                                            <span class="opacity-70">
                                                {{Order.seller_id.address_1}}
                                                <br />{{Order.seller_id.postcode}} {{Order.seller_id.city}} {{Order.seller_id.state}}
                                                <br/>{{Order.seller_id.country}}
                                            </span>
                                            <span class="opacity-70">
                                                <br />
                                                    {{Order.seller_id.phone_no}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-bottom w-100"></div>
                            <div class="row">
                                <div class="col-8 col-md-8 col-sm-8 col-xxl-8 col-xs-8 mt-5">
                                    <h3 class="font-weight-bolder mb-5">BILL TO :</h3>
                                    <h5 class="font-weight-bolder"> {{Order.deliver_to}}</h5>
                                    <span class="opacity-70">
                                        {{Order.shipping_address}}
                                        <br />{{Order.postcode}} {{Order.city}} {{Order.state}}
                                        <br/>{{Order.country}}
                                    </span>
                                    <span class="opacity-70">
                                        <br />{{Order.deliver_to_phone_no}}
                                    </span>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4  col-xxl-4 col-xs-4  justify-content-end mt-5">
                                    <h3 class="font-weight-bolder mb-5">DELIVER TO :</h3>
                                    <h5 class="font-weight-bolder"> {{Order.deliver_to}}</h5>
                                    <span class="opacity-70">
                                        {{Order.shipping_address}}
                                        <br />{{Order.postcode}} {{Order.city}} {{Order.state}}
                                        <br/>{{Order.country}}
                                    </span>
                                    <span class="opacity-70">
                                        <br />{{Order.deliver_to_phone_no}}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0 mt-n10">
                        <div class="col-md-11">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="pl-0 font-weight-bold text-muted text-uppercase">Items</th>
                                        <th class="text-right font-weight-bold text-muted text-uppercase">Qty</th>
                                        <th class="text-right font-weight-bold text-muted text-uppercase">Unit Price</th>
                                        <th class="text-right pr-0 font-weight-bold text-muted text-uppercase">Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="font-weight-boldest border-bottom-0" v-for=" OrderItem in OrderItems">
                                        <td class="border-0 pl-0 pt-7 d-flex align-items-center">
                                            <div class="symbol symbol-40 flex-shrink-0 mr-4 bg-light d-print-none">
                                                <div class="symbol-label" :style="'background-image:url('+ image_source + OrderItem.product_id.featured_image +')'"></div>
                                            </div>
                                            {{OrderItem.name}}</td>
                                        <td class="border-top-0 text-right pt-7 align-middle">{{OrderItem.quantity}}</td>
                                        <td class="border-top-0 text-right pt-7 align-middle"  v-if="BuyerDetails.country =='Malaysia'">RM {{OrderItem.price}}</td>
                                        <td class="border-top-0 text-right pt-7 align-middle"  v-if="BuyerDetails.country =='Singapura' || BuyerDetails.country =='Brunei'">$ {{OrderItem.price}}</td>
                                        <td class="border-top-0 text-primary pr-0 pt-7 text-right align-middle"  v-if="BuyerDetails.country =='Malaysia'">RM {{OrderItem.total}}</td>
                                        <td class="border-top-0 text-primary pr-0 pt-7 text-right align-middle"  v-if="BuyerDetails.country =='Singapura' || BuyerDetails.country =='Brunei'">$ {{OrderItem.total}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td class="font-weight-bolder font-size-h6 text-right">Discount</td>
                                        <td class="font-weight-bolder pr-0 text-right text-success font-size-h6 text-right"  v-if="BuyerDetails.country =='Malaysia'">
                                            RM {{total}}
                                            <input type="hidden" class="form-control"  placeholder="RM" v-model="total"/>
                                        </td>
                                        <td class="font-weight-bolder pr-0 text-right text-success font-size-h6 text-right" v-if="BuyerDetails.country =='Singapura' || BuyerDetails.country =='Brunei'">$ {{Order.total}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="border-0 pt-0"></td>
                                        <td class="border-0 pt-0 font-weight-bolder font-size-h6 text-right">Delivery Fees</td>
                                        <td class="border-0 pt-0 font-weight-bolder pr-0 text-right text-success font-size-h6 text-right"  v-if="BuyerDetails.country =='Malaysia'">
                                            RM {{Order.delivery_fees}}
                                            <input type="hidden" class="form-control"  placeholder="RM" v-model="total"/>
                                        </td>
                                        <td class="border-0 pt-0 font-weight-bolder pr-0 text-right text-success font-size-h6 text-right" v-if="BuyerDetails.country =='Singapura' || BuyerDetails.country =='Brunei'">$ {{Order.total}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td class="font-weight-bolder font-size-h4 text-right">Subtotal</td>
                                        <td class="font-weight-bolder pr-0 text-right text-success font-size-h4 text-right"  v-if="BuyerDetails.country =='Malaysia'">RM {{Order.total}}</td>
                                        <td class="font-weight-bolder pr-0 text-right text-success font-size-h4 text-right" v-if="BuyerDetails.country =='Singapura' || BuyerDetails.country =='Brunei'">$ {{Order.total}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <agent-bank-transfer-elements></agent-bank-transfer-elements>
    </div>
</template>
<script>
    export default {
        props: ['user','data'],
        data() {
            return {
                image_source: 'storage/Product/',
                Order:{
                    buyer_id:{
                        name:'',
                        id:'',
                        avatar:'',
                    }

                },
                OrderItems:{},
                SellerDetails:[],
                BuyerDetails:[],
                totalDiscount:0,
            }
        },
        mounted() {
            VueEvent.$on('fetchOrder', () => {
                this.fetchOrder();
            });

        },
        created(){
            this.fetchOrder();
            this.fetchOrderItems();
        },
        computed :{
            total: function () {
                var sum = 0;
                var discount;
                this.OrderItems.forEach(e => {

                    sum += e.total;

                });
                discount = sum + this.Order.delivery_fees;
                this.totalDiscount = discount;
                return (discount-this.Order.total).toFixed(2);
            }
        },
        methods: {
            openPayBankTransfer(data){
                $(".BankTransferModal").modal('show');
                this.States = data;
            },
            fetchOrder(){
                fetch('/api/v1/orders/HQ/Lists/' + this.data +'/order-details').then(response => response.json())
                    .then(response => {
                        this.Order = response.data;
                        this.BuyerDetails = response.data.buyer_id;
                        console.log(this.Order.delivery_fees);
                        this.fetchSellerDetails();
                    })
                    .catch(error => console.log(error))
            },
            fetchSellerDetails(){
                fetch('/api/v1/team/Lists/' + this.Order.seller_id.id +'/agent-info').then(response => response.json())
                    .then(response => {
                        this.SellerDetails = response.data.user_id;
                    })
                    .catch(error => console.log(error))
            },
            fetchOrderItems(){
                fetch('/api/v1/orders/HQ/Lists/' + this.data +'/order-items').then(response => response.json())
                    .then(response => {
                        this.OrderItems = response.data;
                    })
                    .catch(error => console.log(error))
            },
            ApproveOrder(){
                fetch('/api/v1/orders/team/Updates/'+ this.Order.buyer_id.id+'/'+ this.Order.id+'/approve-order')
                    .then(response => {
                        this.fetchOrder();

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
                        toastr.success("Successfully Approve Order.", "Order Approved");
                    })
                    .catch(error => console.log(error))
            },
            print(){
//                window.print();
                alert('yes');
            }
        }

    }

</script>
<style>
    @media print and (max-width: 1008px) {
        @page {
            size: 330mm 427mm;
            margin: 14mm;
        }
        .container {
            width: 1170px;
        }
        #html1 {
            resolution: 1000dpi;
            background-color: white;
            zoom: 140%;
            margin-top: -40px;
            padding: 0px;
            clear: both;
        }
    }

</style>

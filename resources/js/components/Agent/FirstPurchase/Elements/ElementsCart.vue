<template>
    <div class="" data-wizard-type="step-content" data-wizard-state="current">
        <div class="card card-custom gutter-b">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder font-size-h3 text-primary">Shopping Cart</span>
                </h3>
                <div class="card-toolbar">
                    <div class="dropdown dropdown-inline">
                        <a href="/list-product" class="btn btn-primary font-weight-bolder font-size-sm">Continue Shopping</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row" v-if="$parent.TotalMOQAddOn != 0">
                    <div class="col-lg-12">
                        <div class="row  d-inline"  v-if="$parent.TotalMOQAddOn > $parent.CountAddOn">
                            <div class="col-lg-12 d-flex justify-content-end">
                                <h6 class="font-weight-bolder  mt-n5">MOQ AddOn: <span class="text-danger">{{$parent.TotalMOQAddOn}}</span></h6>

                            </div>
                        </div>
                        <div class="row d-inline"  v-if="$parent.TotalMOQAddOn > $parent.CountAddOn">
                            <div class="col-lg-12 d-flex justify-content-end">
                                <h6 class="font-weight-bolder  mt-n5">Set AddOn: <span class="text-danger">{{$parent.TotalMOQAddOn - $parent.CountAddOn}} More ..</span></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" v-if="$parent.TotalMOQSpecial != 0">
                    <div class="col-lg-12 ">
                        <div class="row  d-inline"  v-if="$parent.TotalMOQSpecial > $parent.CountSpecial">
                            <div class="col-lg-12 d-flex justify-content-end">
                                <h6 class="font-weight-bolder  mt-n5">MOQ Special: <span class="text-danger">{{$parent.TotalMOQSpecial}}</span></h6>

                            </div>
                        </div>
                        <div class="row d-inline"  v-if="$parent.TotalMOQSpecial > $parent.CountSpecial">
                            <div class="col-lg-12 d-flex justify-content-end">
                                <h6 class="font-weight-bolder  mt-n5">Set Special: <span class="text-danger">{{$parent.TotalMOQSpecial - $parent.CountSpecial}} More ..</span></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" v-if="$parent.TotalMOQNormal != 0">
                    <div class="col-lg-12 ">
                        <div class="row  d-inline"  v-if="$parent.TotalMOQNormal > $parent.TotalNormal">
                            <div class="col-lg-12 d-flex justify-content-end">
                                <h6 class="font-weight-bolder  mt-n5">MOQ Normal : <span class="text-danger">{{$parent.TotalMOQNormal}}</span></h6>

                            </div>
                        </div>
                        <div class="row d-inline"  v-if="$parent.TotalMOQNormal > $parent.TotalNormal">
                            <div class="col-lg-12 d-flex justify-content-end">
                                <h6 class="font-weight-bolder  mt-n5">Set Normal : <span class="text-danger">{{$parent.TotalMOQNormal - $parent.TotalNormal}} More ..</span></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row  d-flex justify-content-end" v-if="$parent.TotalMOQNormal != 0 || $parent.TotalMOQSpecial != 0 || $parent.TotalMOQAddOn != 0">
                    <div class="row d-inline"  v-if="$parent.TotalNormal >= $parent.TotalMOQNormal && $parent.CountSpecial >= $parent.TotalMOQSpecial && $parent.CountAddOn >= $parent.TotalMOQAddOn">
                        <div class="col-lg-12 d-flex justify-content-end">
                            <h6 class="font-weight-bolder  mt-n5"><span class="text-success">You can place order now</span></h6>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="row text-muted  font-weight-bolder mb-5">
                        <div class="col-lg-4 text-left align-middle p-0 d-none d-sm-block">
                            <span class="ml-21">PRODUCT</span>
                        </div>
                        <div class="col-lg-2  text-right align-middle p-0 d-none d-sm-block">
<!--                            STOCK-->
                        </div>
                        <div class="col-lg-4  text-right align-middle p-0 d-none d-sm-block">
                            QTY
                        </div>
                        <div class="col-lg-1 text-right p-0 d-none d-sm-block">
                            PRICE
                        </div>
                        <div class="col-lg-1  text-right p-0 d-none d-sm-block">

                        </div>
                    </div>
                    <div class="row border-bottom">

                    </div>
                    <div class="row border-bottom" v-for="Cart in $parent.Carts">
                        <div class="col-lg-4 d-flex align-items-center font-weight-bolder p-2">
                            <a @click="removeItems(Cart.rowId)" class="btn btn-icon btn-xs btn-outline-danger justify-content-center text-hover-white">
                                <i class="flaticon2-delete text-danger "></i>
                            </a>
                            <div class="ml-10 symbol symbol-60 flex-shrink-0 mr-4 bg-light">
                                <div class="symbol-label" :style="'background-image:url( storage/Product/' + Cart.options.size +')'"></div>
                            </div>
                            <a href="#" class="text-dark text-hover-primary">{{Cart.name}}</a>

                            <!--end::Symbol-->
                        </div>
                        <div class="col-lg-2   mt-3 text-center text-dark align-middle font-weight-bolder font-size-h5 p-2 d-flex justify-content-end">
<!--                            <span class="d-block d-sm-none">Stock : </span>-->
<!--                            <span class="text-danger">&nbsp; {{Cart.options.stock}}</span>-->
                        </div>
                        <div class="col-lg-4  text-right p-2">
                            <div class="row mt-3">
                                <div class="col-4 d-flex justify-content-end">
                                    <!--<a v-if="Cart.qty" @click="decreaseQuantity(Cart.rowId,Cart.qty,Cart.id,Cart.options.stock,Cart.name)" class="btn btn-xs btn-light-success btn-icon mr-2">-->
                                    <!--<i class="ki ki-minus icon-xs"></i>-->
                                    <!--</a>-->
                                </div>

                                <div class="col-4 d-flex justify-content-start">
                                    <!--<a @click="addQuantity(Cart.rowId,Cart.qty,Cart.id,Cart.options.stock,Cart.name)" class="btn btn-xs btn-light-success btn-icon">-->
                                    <!--<i class="ki ki-plus icon-xs"></i>-->
                                    <!--</a>-->
                                </div>
                                <div class="col-4">
                                    <span class="d-inline d-sm-none font-weight-bolder font-size-h5">Quantity : </span>
                                    <input type="number" class="form-control" style="width: 100%" v-model="Cart.qty" @change="changeQuantity(Cart.rowId,Cart.qty,Cart.id,Cart.options.stock,Cart.name)">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 mt-3 text-right text-dark align-middle font-weight-bolder font-size-h5 p-2 justify-items-center">
                            <span class="d-block d-sm-none">Price(unit) : </span>
                            RM {{Cart.price}}
                        </div>
                        <div class="col-lg-1 mt-3 text-right align-middle font-weight-bolder font-size-h5 p-2">
                            <span class="d-block d-sm-none">Total Price : </span>
                            <span class=" text-primary">RM {{Cart.subtotal}}</span>
                        </div>
                    </div>

                    <div class="row mt-3 mb-3">
                        <div class="col-lg-4 text-right font-weight-bolder"></div>
                        <div class="col-lg-4 text-right font-weight-bolder"></div>
                        <div class="col-lg-2 text-right font-weight-bolder">
                            <span class="font-weight-bolder font-size-h6 text-right">Total Item</span>
                        </div>
                        <div class="col-lg-2 text-right font-weight-bolder">
                            <span class="font-weight-bolder font-size-h6 text-right">{{$parent.Count}}</span>
                        </div>
                    </div>
                    <div class="row mt-3 mb-3">
                        <div class="col-lg-4 text-right font-weight-bolder"></div>
                        <div class="col-lg-4 text-right font-weight-bolder"></div>
                        <div class="col-lg-2 text-right font-weight-bolder">
                            <span class="font-weight-bolder font-size-h6 text-right">Delivery Fees</span>
                        </div>
                        <div class="col-lg-2 text-right font-weight-bolder">
                            <span class="font-weight-bolder font-size-h6 text-right">RM {{$parent.total_delivery_fee}}</span>
                        </div>
                    </div>
                    <div class="row border-bottom">

                    </div>
                    <div class="row  mt-3 mb-3">
                        <div class="col-lg-4 text-right font-weight-bolder "></div>
                        <div class="col-lg-4 text-right font-weight-bolder"></div>
                        <div class="col-lg-2 text-right font-weight-bolder">
                            <span class="font-weight-bolder font-size-h4 text-right">Subtotal</span>
                        </div>
                        <div class="col-lg-2 text-right font-weight-bolder">
                            <div class="font-weight-bolder text-success font-size-h4 text-right">
                                RM {{$parent.Totals}}
                            </div>
                        </div>
                    </div>
                    <div class="row border-bottom">

                    </div>
                    <div class="row  mt-3 mb-3">
                        <div class="col-lg-1 text-right font-weight-bolder "></div>
                        <div class="col-lg-1 text-right font-weight-bolder"></div>
                        <div class="col-lg-1 text-right font-weight-bolder"></div>
                        <div class="col-lg-9 text-right font-weight-bolder">
                            <span class="text-muted">Excludes Delivery. GST Included</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import { EventBus } from "../../../../app";
    export default {
        props: ['data'],
        data() {
            return {
                isCoupon: false,
                isSeller: '',
            }
        },
        mounted() {
            EventBus.$on('updateElementsCart', () => {
                this.fetchCart();
            });

            EventBus.$on('updateCountCart', () => {
                this.fetchCount();
            });
        },
        watch: {
            data: function() {
            }
        },
        created(){
            this.fetchCart();
            this.fetchAgentDetails();

        },
        methods: {
            fetchAgentDetails(){
                console.log(this.$parent.isSellerHQ)
                fetch('/api/v1/team/Lists/' + this.$parent.data +'/agent-info').then(response => response.json())
                    .then(response => {
                        this.isSeller = response.data.leader_id.HQ;
                        console.log(this.isSeller);

                    })
                    .catch(error => console.log(error))
            },
            coupon(){
                this.isCoupon= !this.isCoupon;
                if(this.isCoupon == true)
                {
                    this.$parent.Totals= this.$parent.Totals - this.$parent.AgentDetails.point;
                    this.$parent.point = this.$parent.point + this.$parent.AgentDetails.point;
                    console.log('Point :' + this.$parent.point);
                }
                if(this.isCoupon != true)
                {
                    this.$parent.Totals= this.$parent.Totals + this.$parent.AgentDetails.point;
                    this.$parent.point = this.$parent.point - this.$parent.AgentDetails.point;
                    console.log('Point :' + this.$parent.point);
                }
            },
            fetchCart(){
                axios.get('/api/v1/cart/list-cart')
                    .then(function (response) {
                        this.$parent.Carts = response.data;
                        this.isSeller = this.$parent.IsSellerHQ;
                        this.$parent.TotalNormal = 0;
                        for (var key in this.$parent.Carts) {
                            if(this.$parent.Carts[key].options.product_type === 'Normal')
                            {
                                var moq = parseInt(this.$parent.Carts[key].options.MOQ);

                                this.$parent.TotalMOQNormal = moq;


                                var quantity = parseInt(this.$parent.Carts[key].qty);

                                this.$parent.TotalNormal = this.$parent.TotalNormal + quantity;
                                if(this.$parent.CountNormal !== 0)
                                {
                                    this.$parent.CountNormal = this.$parent.Carts[key].qty;
                                }

                            }
                            if(this.$parent.Carts[key].options.product_type === 'Special')
                            {
                                var moq = parseInt(this.$parent.Carts[key].options.MOQ);
                                this.$parent.TotalMOQSpecial = moq;
                                var quantity = parseInt(this.$parent.Carts[key].qty);
                                this.$parent.CountSpecial = quantity;

                            }
                            if(this.$parent.Carts[key].options.product_type === 'Add-On')
                            {
                                var moq = parseInt(this.$parent.Carts[key].options.MOQ);

                                this.$parent.TotalMOQAddOn = moq;
                                var quantity = parseInt(this.$parent.Carts[key].qty);

                                this.$parent.CountAddOn = quantity;

                            }
                        }

                        if(this.$parent.TotalMOQNormal > this.$parent.TotalNormal || this.$parent.TotalMOQSpecial > this.$parent.CountSpecial || this.$parent.TotalMOQAddOn > this.$parent.CountAddOn)
                        {
                            this.$parent.CartStatus = false;
                        }
                        if( this.$parent.TotalNormal >= this.$parent.TotalMOQNormal && this.$parent.CountSpecial >= this.$parent.TotalMOQSpecial && this.$parent.CountAddOn >= this.$parent.TotalMOQAddOn)
                        {
                            this.$parent.CartStatus = true;
                        }
                        this.fetchTotals();
                        this.fetchCount();
                    }.bind(this));
            },
            fetchCount(){
                axios.get('/api/v1/cart/count-cart')
                    .then(function (response) {
                        this.$parent.Count = response.data;

                        if(this.$parent.DeliveryDetails.state != null)
                        {
                            this.$parent.tempCount = 0;
                            this.$parent.Totals = this.$parent.Totals - this.$parent.total_delivery_fee;

                            for (var key in this.$parent.Carts)
                            {
                                if(this.$parent.Carts[key].options.product_type === 'Normal')
                                {

                                    var quantity = parseInt(this.$parent.Carts[key].qty);
                                    var quantity = quantity / 10;
                                    this.$parent.tempCount += quantity;
                                }
                                if(this.$parent.Carts[key].options.product_type === 'Special')
                                {
                                    var quantity = parseInt(this.$parent.Carts[key].qty);
                                    var quantity = quantity / 10;
                                    this.$parent.tempCount += quantity;
                                }
                                if(this.$parent.Carts[key].options.product_type === 'Add-On')
                                {
                                    var quantity = parseInt(this.$parent.Carts[key].qty);
                                    var quantity = quantity / 20;
                                    var quantity = parseInt(quantity);
                                    this.$parent.tempCount += quantity;
                                }
                            }

                            if(this.$parent.DeliveryDetails.state =='Sabah' || this.$parent.DeliveryDetails.state =='Sarawak' || this.$parent.DeliveryDetails.state =='Labuan')
                            {
                                this.$parent.delivery_fee = 27;
                                if(this.isSeller == 1)
                                {
                                    this.$parent.total_delivery_fee = this.$parent.delivery_fee * this.$parent.tempCount;
                                    this.$parent.total_delivery_fee = parseFloat((this.$parent.total_delivery_fee).toFixed(2));

                                    this.$parent.Totals = this.$parent.Totals +this.$parent.total_delivery_fee;
                                    this.$parent.Totals = parseFloat((this.$parent.Totals).toFixed(2));
                                }
                            }
                            else {
                                this.$parent.delivery_fee = 6.90;
                                if(this.isSeller == 1)
                                {
                                    this.$parent.total_delivery_fee = this.$parent.delivery_fee * this.$parent.tempCount;
                                    this.$parent.total_delivery_fee = parseFloat((this.$parent.total_delivery_fee).toFixed(2));

                                    this.$parent.Totals = this.$parent.Totals +this.$parent.total_delivery_fee;
                                    this.$parent.Totals = parseFloat((this.$parent.Totals).toFixed(2));
                                }
                            }
                            console.log('Total: ' + this.$parent.Totals )
                            console.log('Shipping: ' + this.$parent.total_delivery_fee )
                        }
                    }.bind(this));
            },
            fetchTotals(){
                axios.get('/api/v1/cart/total-cart')
                    .then(function (response) {
//                        this.$parent.Totals = response.data+(6.90*this.$parent.Count);
                        this.$parent.Totals = response.data;

                        if(this.$parent.total_delivery_fee != 0)
                        {
                            this.$parent.Totals = this.$parent.Totals + this.$parent.total_delivery_fee;

                        }
                    }.bind(this));

            },
            decreaseQuantity(rowId,quantity,productId)
            {
                quantity = quantity -1;
                console.log(this.$parent.total_delivery_fee)
//                this.$parent.total_delivery_fee = this.$parent.total_delivery_fee - 6.90;
                var url = '/api/v1/cart/'+ this.$parent.data+'/'+ rowId + '/' +  quantity +'/decrease-quantity', method = 'post';

                fetch(url, {
                    method: method,
                    body: JSON.stringify(),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then(response => response.json())
                    .then(response => {
                        if(this.$parent.total_delivery_fee != 0)
                        {
                            this.$parent.total_delivery_fee = this.$parent.total_delivery_fee - this.$parent.delivery_fee;
                            this.$parent.total_delivery_fee = parseFloat((this.$parent.total_delivery_fee).toFixed(2));

                        }
                        this.fetchCart();

                        console.log('decrease :' + this.$parent.Totals)
                        EventBus.$emit('updateDashboardCart');
                        EventBus.$emit('updateTotalCart');
;


                    })
            },
            changeQuantity(rowId,quantity,productId,stock,product_name)
            {
                if(quantity > stock)
                {
//                    this.$parent.CartStatus = false;
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
                    toastr.error("Please change the quantity", product_name +' \nQuantity Exceeds Stock');
                    this.fetchCart();

                }
                else
                {

                    var quantity = parseInt(quantity);
                    var url = '/api/v1/cart/'+ this.$parent.data +'/'+ rowId + '/' +  quantity +'/add-quantity', method = 'post';

                    fetch(url, {
                        method: method,
                        body: JSON.stringify(),
                        headers: {
                            'content-type': 'application/json'
                        }
                    }).then(response => response.json())
                        .then(response => {

                            this.fetchCart();
                            EventBus.$emit('updateDashboardCart');
                            EventBus.$emit('updateTotalCart');
                        })

                }


            },
            addQuantity(rowId,quantity,productId)
            {

                var quantity = parseInt(quantity);
                quantity = quantity +1;
//                this.$parent.total_delivery_fee = this.$parent.total_delivery_fee + 6.90;
                var url = '/api/v1/cart/'+ this.$parent.data+'/'+ rowId + '/' +  quantity +'/add-quantity', method = 'post';

                fetch(url, {
                    method: method,
                    body: JSON.stringify(),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then(response => response.json())
                    .then(response => {
                        if(this.$parent.total_delivery_fee != 0)
                        {
                            this.$parent.total_delivery_fee = this.$parent.total_delivery_fee + this.$parent.delivery_fee;
                            this.$parent.total_delivery_fee = parseFloat((this.$parent.total_delivery_fee).toFixed(2));

                        }
                        this.fetchCart();

                        EventBus.$emit('updateDashboardCart');
                        EventBus.$emit('updateTotalCart');



                    })

            },

            removeItems(rowId)
            {
                if(this.$parent.Carts[rowId].options.product_type === 'Normal')
                {
                    var quantity = parseInt(this.$parent.Carts[rowId].qty);

                    this.$parent.TotalNormal = this.$parent.TotalNormal - quantity;
                }
                if(this.$parent.Carts[rowId].options.product_type === 'Special')
                {
                    this.$parent.TotalMOQSpecial =0;
                    this.$parent.CountSpecial = 0;

                }
                if(this.$parent.Carts[rowId].options.product_type === 'Add-On')
                {
                    this.$parent.TotalMOQAddOn = 0;
                    this.$parent.CountAddOn = 0;

                }
                this.$parent.total_delivery_fee = 0;
                var url = '/api/v1/cart/'+ this.$parent.data +'/'+ rowId +'/remove-item', method = 'post';

                fetch(url, {
                    method: method,
                    body: JSON.stringify(),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then(response => response.json())
                    .then(response => {

                        this.fetchCart();
                        EventBus.$emit('updateDashboardCart');
                        EventBus.$emit('updateTotalCart');
                        this.$parent.Totals = this.$parent.Totals-this.$parent.total_delivery_fee;

                    })
            }
        }

    }

</script>

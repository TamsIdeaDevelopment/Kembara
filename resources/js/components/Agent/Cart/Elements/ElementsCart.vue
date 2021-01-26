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
                <h6 class="font-weight-bolder  mt-n5">List Of Your Cart</h6>
                <div class="table-responsive mt-8">
                    <table class="table">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Product</th>
                            <th class="text-center">Qty</th>
                            <th class="text-right">Price</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="Cart in $parent.Carts">
                            <td class="text-center align-middle p-0">
                                <a @click="removeItems(Cart.rowId)" class="btn btn-icon btn-xs btn-outline-danger justify-content-center text-hover-white">
                                    <i class="flaticon2-delete text-danger "></i>
                                </a>
                            </td>
                            <td class="d-flex align-items-center font-weight-bolder">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-60 flex-shrink-0 mr-4 bg-light">
                                    <div class="symbol-label" :style="'background-image:url( storage/Product/' + Cart.options.size +')'"></div>
                                </div>
                                <!--end::Symbol-->
                                <a href="#" class="text-dark text-hover-primary">{{Cart.name}}</a>
                            </td>
                            <td class="text-center align-middle">
                                <a v-if="Cart.qty" @click="decreaseQuantity(Cart.rowId,Cart.qty,Cart.id)" class="btn btn-xs btn-light-success btn-icon mr-2">
                                    <i class="ki ki-minus icon-xs"></i>
                                </a>
                                <span class="font-weight-bold mr-2 text-dark-75 font-size-lg">{{Cart.qty}}</span>
                                <a @click="addQuantity(Cart.rowId,Cart.qty,Cart.id)" class="btn btn-xs btn-light-success btn-icon">
                                    <i class="ki ki-plus icon-xs"></i>
                                </a>
                                <!--<a href="javascript:;" class="btn btn-xs btn-light-success btn-icon mr-2">-->
                                <!--<i class="ki ki-minus icon-xs"></i>-->
                                <!--</a>-->
                                <!--<span class="mr-2 font-weight-bolder">{{Cart.qty}}</span>-->
                                <!--<a href="javascript:;" class="btn btn-xs btn-light-success btn-icon">-->
                                <!--<i class="ki ki-plus icon-xs"></i>-->
                                <!--</a>-->
                            </td>
                            <td class="text-right align-middle font-weight-bolder font-size-h5">RM {{Cart.price}}</td>
                            <td class="text-right text-primary align-middle font-weight-bolder font-size-h5">
                                RM {{Cart.subtotal}}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td class="font-weight-bolder font-size-h6 text-right">Total Item</td>
                            <td class="font-weight-bolder font-size-h6 text-right">{{$parent.Count}}</td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td class="font-weight-bolder font-size-h6 text-right">
                                Cuopon
                            </td>
                            <td class="font-weight-bolder font-size-h6 text-right">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <span class="switch switch-sm switch-outline switch-icon switch-success">
                                            <label>
                                             <input type="checkbox" name="select" @change="coupon"/>
                                             <span></span>
                                        </label>
                                       </span>
                                    </div>
                                    <div class="col-lg-6">
                                        RM {{$parent.AgentDetails.point}}
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr v-if="$parent.IsSellerHQ == 1 && $parent.delivery_type == 0">
                            <td colspan="3"></td>
                            <td class="font-weight-bolder font-size-h6 text-right">Delivery Fees</td>
                            <td class="font-weight-bolder font-size-h6 text-right">RM {{$parent.total_delivery_fee}}</td>
                            <!--<span v-if="$parent.delivery_type == 0">-->

                            <!--</span>-->
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td class="font-weight-bolder font-size-h4 text-right">Subtotal</td>
                            <td class="font-weight-bolder text-success font-size-h4 text-right">RM {{$parent.Totals}}</td>
                        </tr>
                        <tr>
                            <td colspan="5" class="border-0 text-muted text-right pt-0">Excludes Delivery. GST Included</td>
                        </tr>
                        </tbody>
                    </table>
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

                        this.fetchCount();
                        this.fetchTotals();
                    }.bind(this));
            },
            fetchCount(){
                axios.get('/api/v1/cart/count-cart')
                    .then(function (response) {
                        this.$parent.Count = response.data;
                    }.bind(this));
            },
            fetchTotals(){
                axios.get('/api/v1/cart/total-cart')
                    .then(function (response) {
                        this.$parent.Totals = response.data+(6.90*this.$parent.Count);

//                        alert(this.isSeller)

                        if(this.isSeller == 1)
                        {
//                            this.$parent.total_delivery_fee = 0;
//                            console.log('seller1:' +this.isSeller)
                            this.$parent.total_delivery_fee = 6.90 * this.$parent.Count;
                            this.$parent.Totals = response.data+this.$parent.total_delivery_fee;
                        }
                        if(this.isSeller == 0)
                        {
//                            console.log('seller1:' +this.isSeller)
//                            console.log('Totals : '+this.$parent.Totals);

                            this.$parent.Totals = response.data;
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

                        this.fetchCart();
                        EventBus.$emit('updateDashboardCart');
                        EventBus.$emit('updateTotalCart');
                        this.$parent.total_delivery_fee = this.$parent.total_delivery_fee - 6.90;

                    })
//                this.errors=[];
//                fetch('/api/v1/product/Lists/' + productId + '/'+ this.AgentDetails.agent_levels_id.id +'/agent-moq').then(response => response.json())
//                    .then(response => {
//                        this.minimum_order = response.minimum_order;
//                    })
//
//                if( quantity < this.minimum_order)
//                {
//                    this.errors['quantity'] = "You cannot buy below than MOQ"
//                }
//                if(quantity >= this.minimum_order)
//                {
//                    var url = '/api/v1/cart/'+ rowId + '/' +  quantity +'/add-quantity', method = 'post';
//
//                    fetch(url, {
//                        method: method,
//                        body: JSON.stringify(),
//                        headers: {
//                            'content-type': 'application/json'
//                        }
//                    }).then(response => response.json())
//                        .then(response => {
//                            this.fetchCart();
//                        })
//                }
            },
            addQuantity(rowId,quantity,productId)
            {

                var quantity = parseInt(quantity);
                quantity = quantity +1;
                console.log(this.$parent.total_delivery_fee)
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
                        this.fetchCart();
                        EventBus.$emit('updateDashboardCart');
                        EventBus.$emit('updateTotalCart');
                        this.$parent.total_delivery_fee = this.$parent.total_delivery_fee + 6.90;

                    })

            },

            removeItems(rowId)
            {
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
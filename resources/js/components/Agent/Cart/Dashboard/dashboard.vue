<template>
    <div id="kt_quick_cart" class="offcanvas offcanvas-right p-10  d-print-none">
        <div class="offcanvas-header d-flex align-items-center justify-content-between pb-7">
            <h4 class="font-weight-bold m-0">Shopping Cart</h4>
            <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_cart_close">
                <i class="ki ki-close icon-xs text-muted"></i>
            </a>
        </div>
        <div class="offcanvas-content">
            <div class="offcanvas-wrapper mb-5 scroll-pull">
                <div class="row" v-if="('quantity' in errors)">
                    <div class="col-12">
                        <div class="alert alert-custom alert-outline-2x alert-outline-danger fade show mb-5" role="alert">
                            <div class="alert-icon"><i class="flaticon-warning"></i></div>
                            <div class="alert-text">{{errors['quantity']}}</div>
                            <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-for="Cart in Carts">
                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                    <a href="#" class="symbol symbol-70 flex-shrink-0">
                                        <img :src="'storage/Product/'+ Cart.options.size" title="" alt="" />
                                    </a>
                                </div>
                                <div class="col-8">
                                    <div class="row">
                                        <h5 class="text-success">{{Cart.name}}</h5>
                                    </div>
                                    <!--<div class="row">-->
                                        <!--<div class="form-group">-->
                                            <!--<table class="ml-n2 table table-borderless pb-0">-->
                                                <!--<tr>-->
                                                    <!--<td>-->
                                                        <!--<span class="font-weight-bold text-muted text-primary-75">Price</span>-->
                                                    <!--</td>-->
                                                    <!--<td>:</td>-->
                                                    <!--<td>-->
                                                        <!--<span class="font-weight-bold text-primary-75">RM {{Cart.price}}</span>-->
                                                    <!--</td>-->
                                                <!--</tr>-->
                                                <!--<tr class="">-->
                                                    <!--<td class="">-->
                                                        <!--<span class="font-weight-bold text-muted text-primary-75">Quantity</span>-->
                                                    <!--</td>-->
                                                    <!--<td class="">:</td>-->
                                                    <!--<td>-->

                                                        <!--<a @click="decreaseQuantity(Cart.rowId,Cart.qty,Cart.id)" class="btn btn-xs btn-light-success btn-icon mr-2">-->
                                                            <!--<i class="ki ki-minus icon-xs"></i>-->
                                                        <!--</a>-->

                                                        <!--<span class="font-weight-bold mr-2 text-dark-75 font-size-lg">{{Cart.qty}}</span>-->

                                                        <!--<a @click="addQuantity(Cart.rowId,Cart.qty,Cart.id)" class="btn btn-xs btn-light-success btn-icon">-->
                                                            <!--<i class="ki ki-plus icon-xs"></i>-->
                                                        <!--</a>-->
                                                        <!--&lt;!&ndash;<input @click="addQuantity(Cart.rowId,Cart.qty,Cart.id)" class="form-control" type="number" v-model="Cart.qty"/>&ndash;&gt;-->
                                                    <!--</td>-->
                                                <!--</tr>-->
                                            <!--</table>-->
                                        <!--</div>-->
                                    <!--</div>-->
                                    <div class="row">
                                        <div class="form-group">
                                            <span class="font-weight-bold text-muted text-primary-75">Price :</span>
                                            <span class="font-weight-bold text-primary-75">RM {{Cart.price}}</span>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-12 ml-n3">
                                            <input type="number" class="form-control" style="width: 100%" v-model="Cart.qty" @change="changeQuantity(Cart.rowId,Cart.qty,Cart.id,Cart.options.stock,Cart.name)">
                                        </div>
                                        <!--<div class="form-group">-->
                                            <!--<a v-if="Cart.qty" @click="decreaseQuantity(Cart.rowId,Cart.qty,Cart.id)" class="btn btn-xs btn-light-success btn-icon mr-2">-->
                                                <!--<i class="ki ki-minus icon-xs"></i>-->
                                            <!--</a>-->
                                            <!--<span class="font-weight-bold mr-2 text-dark-75 font-size-lg">{{Cart.qty}}</span>-->
                                            <!--<a @click="addQuantity(Cart.rowId,Cart.qty,Cart.id)" class="btn btn-xs btn-light-success btn-icon">-->
                                                <!--<i class="ki ki-plus icon-xs"></i>-->
                                            <!--</a>-->
                                        <!--</div>-->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 d-flex justify-content-start">
                                    <a @click="removeItems(Cart.rowId)" class="btn btn-sm btn-outline-danger mb-2">Remove</a>
                                </div>
                                <div class="col-8 d-flex justify-content-end">
                                    <h5 class="font-weight-bold text-primary mt-2">RM {{Cart.subtotal}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="separator separator-solid"></div>
                </div>
            </div>
            <div class="offcanvas-footer">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <span class="font-weight-bold text-muted font-size-sm mr-2">Total Items :</span>
                    <span class="font-weight-bolder text-dark-50 text-right">{{Count}}</span>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-7">
                    <span class="font-weight-bold text-muted font-size-sm mr-2">Sub total</span>
                    <span class="font-weight-bolder text-primary text-right">RM {{Totals}}</span>
                </div>
                <div class="text-right">
                    <a href="/cart-details" class="btn btn-primary text-weight-bold">Proceed To Place Order</a>
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
                errors:[],
                Carts: [],
                Count: [],
                Totals: [],
                minimum_order:0,
            }
        },
        mounted() {
            EventBus.$on('updateDashboardCart', () => {
                this.fetchCart();
            });
        },
        watch: {
            data() {}
        },
        created(){
            this.fetchCart();
            this.fetchAgentDetails();
        },
        methods: {
            test()
            {
                console.log('yes');
            },
            fetchAgentDetails(){
                fetch('/api/v1/team/Lists/' + this.data +'/agent-info').then(response => response.json())
                    .then(response => {
                        this.AgentDetails = response.data;

                    })
                    .catch(error => console.log(error))
            },
            fetchCart(){
                axios.get('/api/v1/cart/list-cart')
                    .then(function (response) {
                        this.Carts = response.data;
                        this.fetchCount();
                        this.fetchTotals();
                    }.bind(this));
            },
            fetchCount(){
                axios.get('/api/v1/cart/count-cart')
                    .then(function (response) {
                        this.Count = response.data;
                    }.bind(this));
            },
            fetchTotals(){
                axios.get('/api/v1/cart/total-cart')
                    .then(function (response) {
                        this.Totals = response.data;
                    }.bind(this));
            },
            decreaseQuantity(rowId,quantity,productId)
            {
//                var quantity = parseInt(quantity);
                quantity = quantity -1;
                var url = '/api/v1/cart/'+ this.data+'/'+ rowId + '/' +  quantity +'/decrease-quantity', method = 'post';

                fetch(url, {
                    method: method,
                    body: JSON.stringify(),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then(response => response.json())
                    .then(response => {
                        this.fetchCart();
                        EventBus.$emit('updateElementsCart');
                        EventBus.$emit('updateTotalCart');
                        EventBus.$emit('fetchProduct');
                    })
            },
            changeQuantity(rowId,quantity,productId,stock,product_name)
            {
                if(quantity > stock)
                {
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
                    var url = '/api/v1/cart/'+ this.data +'/'+ rowId + '/' +  quantity +'/add-quantity', method = 'post';

                    fetch(url, {
                        method: method,
                        body: JSON.stringify(),
                        headers: {
                            'content-type': 'application/json'
                        }
                    }).then(response => response.json())
                        .then(response => {
                            this.fetchCart();
                            EventBus.$emit('updateElementsCart');
                            EventBus.$emit('updateTotalCart');
                            EventBus.$emit('fetchProduct');
                        })

                }
//                var quantity = parseInt(quantity);
//                var url = '/api/v1/cart/'+ this.data.id +'/'+ rowId + '/' +  quantity +'/add-quantity', method = 'post';
//
//                fetch(url, {
//                    method: method,
//                    body: JSON.stringify(),
//                    headers: {
//                        'content-type': 'application/json'
//                    }
//                }).then(response => response.json())
//                    .then(response => {
//                        this.fetchCart();
//                        EventBus.$emit('updateElementsCart');
//                        EventBus.$emit('updateTotalCart');
//                        EventBus.$emit('fetchProduct');
//                    })

            },
            addQuantity(rowId,quantity,productId)
            {
                var quantity = parseInt(quantity);
                quantity = quantity +1;
                    var url = '/api/v1/cart/'+ this.data+'/'+ rowId + '/' +  quantity +'/add-quantity', method = 'post';

                    fetch(url, {
                        method: method,
                        body: JSON.stringify(),
                        headers: {
                            'content-type': 'application/json'
                        }
                    }).then(response => response.json())
                        .then(response => {
                            this.fetchCart();

                            EventBus.$emit('updateElementsCart');
                            EventBus.$emit('updateTotalCart');
                            EventBus.$emit('fetchProduct');
                        })

            },

            removeItems(rowId)
            {
                var url = '/api/v1/cart/'+ this.data+'/'+ rowId +'/remove-item', method = 'post';

                fetch(url, {
                    method: method,
                    body: JSON.stringify(),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then(response => response.json())
                    .then(response => {
                        this.fetchCart();
                        EventBus.$emit('updateElementsCart');
                        EventBus.$emit('updateTotalCart');
                        EventBus.$emit('fetchProduct');
                    })
            }
        }

    }

</script>
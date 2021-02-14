<template>
    <div class="" data-wizard-type="step-content" data-wizard-state="current">
        <div class="card card-custom gutter-b">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder font-size-h3 text-primary">Shopping Cart</span>
                </h3>
            </div>
            <div class="card-body">
                <!--<div class="row">-->
                    <!--<div class="col-lg-12 ">-->
                        <!--<div class="row  d-inline"  v-if="$parent.TotalMOQ > $parent.Count">-->
                            <!--<div class="col-lg-12 d-flex justify-content-end">-->
                                <!--<h6 class="font-weight-bolder  mt-n5">MOQ : <span class="text-danger">{{$parent.TotalMOQ}}</span></h6>-->

                            <!--</div>-->
                        <!--</div>-->
                        <!--<div class="row d-inline"  v-if="$parent.TotalMOQ > $parent.Count">-->
                            <!--<div class="col-lg-12 d-flex justify-content-end">-->
                                <!--<h6 class="font-weight-bolder  mt-n5">Total : <span class="text-danger">{{$parent.TotalMOQ - $parent.Count}} More ..</span></h6>-->
                            <!--</div>-->
                        <!--</div>-->
                        <!--<div class="row d-inline"  v-if="$parent.Count >= $parent.TotalMOQ">-->
                            <!--<div class="col-lg-12 d-flex justify-content-end">-->
                                <!--<h6 class="font-weight-bolder  mt-n5"><span class="text-success">You can place order now</span></h6>-->
                            <!--</div>-->
                        <!--</div>-->
                    <!--</div>-->
                <!--</div>-->
                <div>
                    <div class="row text-muted  font-weight-bolder mb-5">
                        <div class="col-lg-4 text-left align-middle p-0 d-none d-sm-block">
                            <span class="ml-21">PRODUCT</span>
                        </div>
                        <div class="col-lg-2  text-center align-middle p-0 d-none d-sm-block">
                            STOCK
                        </div>
                        <div class="col-lg-4  text-center align-middle p-0 d-none d-sm-block">
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
                    <div class="row border-bottom" v-for="(Cart, index) in $parent.Stock">
                        <div class="col-lg-4 d-flex align-items-center font-weight-bolder p-2">
                            <!--<a @click="removeItems(Cart.rowId)" class="btn btn-icon btn-xs btn-outline-danger justify-content-center text-hover-white">-->
                                <!--<i class="flaticon2-delete text-danger "></i>-->
                            <!--</a>-->
                            <div class="ml-10 symbol symbol-60 flex-shrink-0 mr-4 bg-light">
                                <div class="symbol-label" :style="'background-image:url( storage/Product/' + Cart.product_id.featured_image +')'"></div>
                            </div>
                            <!--end::Symbol-->
                            <a href="#" class="text-dark text-hover-primary">{{Cart.product_id.name}}</a>
                        </div>
                        <div class="col-lg-2  text-center text-dark align-middle font-weight-bolder font-size-h5 p-2 justify-items-center">
                            <span>{{Cart.stock}}</span>
                        </div>
                        <div class="col-lg-4  text-center align-middle p-2">
                            <div class="row mt-5" v-if="Cart.stock<= 0">
                                <div class="col-4 d-flex justify-content-end">
                                </div>
                                <div class="col-4">
                                    <div class="col-12 d-flex justify-content-end">
                                        <span class="text-danger">Out Of Stock</span>
                                    </div>
                                </div>
                                <div class="col-4 d-flex justify-content-start">

                                </div>

                            </div>
                            <div class="row mt-5" v-if="Cart.stock> 0">
                                <div class="col-4 d-flex justify-content-end">
                                    <!--<a @click="decreaseQuantity(Cart.rowId,Cart.qty,Cart.id)" class="btn btn-xs btn-light-success btn-icon mr-2">-->
                                        <!--<i class="ki ki-minus icon-xs"></i>-->
                                    <!--</a>-->
                                </div>
                                <div class="col-4">
                                    <input type="number" class="form-control" style="width: 100%" v-model="Cart.quantity" @change="changeQuantity(Cart,index)">
                                </div>
                                <div class="col-4 d-flex justify-content-start">
                                    <!--<a @click="addQuantity(Cart.rowId,Cart.qty,Cart.id)" class="btn btn-xs btn-light-success btn-icon">-->
                                        <!--<i class="ki ki-plus icon-xs"></i>-->
                                    <!--</a>-->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1  text-right text-dark align-middle font-weight-bolder font-size-h5 p-2 justify-items-center">
                            <span v-if="$parent.data.country == 'Malaysia'">RM</span>
                            <span v-if="$parent.data.country == 'Singapura' || $parent.data.country == 'Brunei'">$</span>
                            {{Cart.product_id.retail_price}}
                        </div>
                        <div class="col-lg-1  text-right text-primary align-middle font-weight-bolder font-size-h5 p-2">
                            <span v-if="$parent.data.country == 'Malaysia'">RM</span>
                            <span v-if="$parent.data.country == 'Singapura' || $parent.data.country == 'Brunei'">$</span>
                            {{total_price[index]}}
                            <input type="hidden" class="form-control"  placeholder="RM" v-model="total_price[index]"/>

                            <!--{{Cart.total_price = Cart.quantity * Cart.product_id.retail_price-->
                              <!--Cart.total_price.toFixed(2)-->
                            <!--}}-->
                        </div>
                    </div>
                    <div class="row mt-3 mb-3">
                        <div class="col-lg-4 text-right font-weight-bolder"></div>
                        <div class="col-lg-4 text-right font-weight-bolder"></div>
                        <div class="col-lg-2 text-right font-weight-bolder">
                            <span class="font-weight-bolder font-size-h6 text-right">Discount</span>
                        </div>
                        <div class="col-lg-2 text-right font-weight-bolder">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">RM</span></div>
                                <input type="text" class="form-control" v-model="$parent.Discount" @change="addDiscount" placeholder="RM"/>
                            </div>
                        </div>
                    </div>
                    <div class="row border-bottom">

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
                                <span v-if="$parent.data.country == 'Malaysia'">RM</span>
                                <span v-if="$parent.data.country == 'Singapura' || $parent.data.country == 'Brunei'">$</span>
                                {{$parent.Totals}}
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
                customerCartTemp:[],
                CountTemp: 0,
            }
        },
        mounted() {
            EventBus.$on('updateElementsCart', () => {
                this.fetchCart();
            });
        },
        watch: {
            data() {}
        },
        computed :{
            total_price: function() {
                return this.$parent.Stock.map(function(Stock) {
                    Stock.total_price = Stock.quantity * Stock.product_id.retail_price;
                  Stock.total_price =  Stock.total_price.toFixed(2);
                    return Stock.total_price;
                });
            },
        },
        created(){
//            this.fetchCart();
        },
        methods: {
            addDiscount(){

                if(this.$parent.Discount === '')
                {
                    var tempTotal = parseFloat(this.$parent.TempDiscount) + parseFloat(this.$parent.TempTotal);

                    this.$parent.Totals = tempTotal;


                }
                else
                {
//                    var discount = this.$parent.Discount;
//                    var temporaryDiscount = discount.toFixed(2);

                    if(this.$parent.TempTotal != 0)
                    {
                        var tempTotal = parseFloat(this.$parent.TempDiscount) + parseFloat(this.$parent.TempTotal);

                        var afterdiscount = tempTotal - this.$parent.Discount;

                        this.$parent.Totals = afterdiscount.toFixed(2);
                        this.$parent.TempDiscount  = this.$parent.Discount;
                        this.$parent.TempTotal  = this.$parent.Totals;
                    }
                    else {
                        var afterdiscount = this.$parent.Totals - this.$parent.Discount;
                        var afterdiscount = parseFloat(afterdiscount);
                        var temporarydiscount = parseFloat(this.$parent.Discount);
                        this.$parent.Totals = afterdiscount.toFixed(2);
                        this.$parent.TempDiscount  = temporarydiscount.toFixed(2);
                        this.$parent.TempTotal  = afterdiscount.toFixed(2);
                    }
                }
            },
            changeQuantity(product,index)
            {
                if(product.quantity <= product.stock)
                {
                    if(product.quantity <= 0)
                    {
                        var key = this.customerCartTemp.filter(function(cart) {
                            if(cart.item_id === product.item_id)
                            {
                                const key = indexOf(cart);
                                return key;
                            }
                            else
                            {
                                return 0;
                            }
                        });

                        this.customerCartTemp.splice(this.customerCartTemp.indexOf(key[0]), 1);

                        var count = this.customerCartTemp.reduce(function(total, array) {
                            var quantity = parseInt(array.quantity);
                            return total + quantity;
                        },0);

                        var total_price = this.customerCartTemp.reduce(function(total, array) {
                            var total_price = parseFloat(array.total_price);

                            return total + total_price;

                            // set initial value as 0
                        },0);

                        this.$parent.Totals = total_price;
                        this.$parent.Count = count;

                        if(this.$parent.Discount !== 0)
                        {
                            var afterdiscount = this.$parent.Totals - this.$parent.Discount;
                            var afterdiscount = parseFloat(afterdiscount);
                            var temporarydiscount = parseFloat(this.$parent.Discount);
                            this.$parent.Totals = afterdiscount.toFixed(2);
                            this.$parent.TempDiscount  = temporarydiscount.toFixed(2);
                            this.$parent.TempTotal  = afterdiscount.toFixed(2);
                        }



                    }
                    if(product.quantity > 0)
                    {
                        if(this.customerCartTemp == "")
                        {
                            this.customerCartTemp.push(product);
                        }
                        else
                        {

                            var condition = this.customerCartTemp.filter(function(cart) {
                                if(cart.item_id === product.item_id)
                                {
                                    return true;
                                }
                                else
                                {
                                    return false;
                                }
                            });

                            if(condition ==  false)
                            {
                                this.customerCartTemp.push(product);
                                condition ==  '';
                            }
                        }
                        var count = this.customerCartTemp.reduce(function(total, array) {
                            var quantity = parseInt(array.quantity);

                            return total + quantity;
                        },0);

                        var total_price = this.customerCartTemp.reduce(function(total, array) {
                            var total_price = parseFloat(array.total_price);

                            return total + total_price;

                        },0);



                        this.$parent.Totals = total_price.toFixed(2);
                        this.$parent.Count = count;

                        if(this.$parent.Discount !== 0)
                        {
                            var afterdiscount = this.$parent.Totals - this.$parent.Discount;
                            var afterdiscount = parseFloat(afterdiscount);
                            var temporarydiscount = parseFloat(this.$parent.Discount);
                            this.$parent.Totals = afterdiscount.toFixed(2);
                            this.$parent.TempDiscount  = temporarydiscount.toFixed(2);
                            this.$parent.TempTotal  = afterdiscount.toFixed(2);
                        }
                    }
                    this.$parent.CustomerCartStatus = true;
                }
                else {
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

                    toastr.error("Please change the quantity", product.product_id.name +' \nQuantity Exceeds Stock');
                    this.$parent.CustomerCartStatus = false;
                }

                if( this.customerCartTemp  == "")
                {
                    this.$parent.CustomerCartStatus = false;

                }
                this.$parent.CustomerCart = this.customerCartTemp;
            },
        }

    }

</script>
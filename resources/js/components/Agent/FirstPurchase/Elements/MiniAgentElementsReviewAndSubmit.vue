<template>
    <div class="" data-wizard-type="step-content">
        <div class="card card-custom gutter-b">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder font-size-h3 text-primary">Review And Submit Order</span>
                </h3>
            </div>
            <div class="card-body">
                <h4 class="font-weight-bold text-dark">{{$parent.BillingDetails.name}}</h4>
                <h6 class="mb-5 font-weight-bold text-dark">{{$parent.BillingDetails.phone_no}}</h6>
                <div class="row">
                    <div class="col-lg-6 mt-5">
                        <h6 class="font-weight-bolder mb-3">Billing Address:</h6>
                        <div class="text-dark-50 line-height-lg">
                            <div>{{$parent.BillingDetails.address_1}}</div>
                            <div>{{$parent.BillingDetails.city}}, {{$parent.BillingDetails.postcode}},</div>
                            <div>{{$parent.BillingDetails.state}}, {{$parent.BillingDetails.country}}</div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-5">
                        <h6 class="font-weight-bolder mb-3">Delivery Address:</h6>
                        <div class="text-dark-50 line-height-lg" v-if="$parent.delivery_type == 0">
                            <div>{{$parent.DeliveryDetails.name}}</div>
                            <div>{{$parent.DeliveryDetails.address_1}}</div>
                            <div>{{$parent.DeliveryDetails.city}}, {{$parent.DeliveryDetails.postcode}},</div>
                            <div>{{$parent.DeliveryDetails.state}}, {{$parent.DeliveryDetails.country}}</div>
                            <div>{{$parent.DeliveryDetails.phone_no}}</div>
                        </div>
                        <div class="text-dark-50 line-height-lg" v-if="$parent.delivery_type == 1">
                            <div>Self Pick Up</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 mt-5">
                        <h6 class="font-weight-bolder mb-3">Payment methods: </h6>
                        <div class="text-dark-50 line-height-lg">
                            <div v-if="$parent.payment_selected == 1">Toyyibpay</div>
                            <div v-if="$parent.payment_selected == 2">Bank Transfer</div>
                            <div v-if="$parent.payment_selected == 3">Billplz</div>
                        </div>
<!--                        <div class="text-dark-50 line-height-lg" v-show="$parent.IsSellerHQ ==0">-->
<!--                            <div>Bank Transfer</div>-->
<!--                        </div>-->
                    </div>
                </div>
                <div class="separator separator-dashed my-5"></div>
                <h6 class="font-weight-bolder mb-3">Order Details:</h6>
                <div class="text-dark-50 line-height-lg">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="pl-0 font-weight-bold text-muted text-uppercase">Ordered Items</th>
                                <th class="text-right font-weight-bold text-muted text-uppercase">Qty</th>
                                <th class="text-right font-weight-bold text-muted text-uppercase">Unit Price</th>
                                <th class="text-right pr-0 font-weight-bold text-muted text-uppercase">Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="font-weight-boldest border-bottom" v-for="Cart in $parent.Carts">
                                <td class="border-0 pl-0 pt-7 d-flex align-items-center">
                                    <div class="symbol symbol-40 flex-shrink-0 mr-4 bg-light">
                                        <div class="symbol-label" :style="'background-image:url( storage/Product/' + Cart.options.size +')'"></div>
                                    </div>
                                    {{Cart.name}}</td>
                                <td class="text-right pt-7 align-middle">{{Cart.qty}}</td>
                                <td class="text-right pt-7 align-middle">RM {{Cart.price}}</td>
                                <td class="text-primary pr-0 pt-7 text-right align-middle">RM {{Cart.subtotal}}</td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td class="font-weight-bolder text-right">Total Item</td>
                                <td class="font-weight-bolder text-right pr-0">{{$parent.Count}}</td>
                            </tr>
                            <tr v-if="$parent.delivery_type == 0">
                                <td colspan="2" class="border-0 pt-0"></td>
                                <td class="border-0 pt-0 font-weight-bolder text-right">Delivery Fees</td>
                                <td class="border-0 pt-0 font-weight-bolder text-right pr-0">RM {{$parent.total_delivery_fee}}</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="border-0 pt-0"></td>
                                <td class="border-0 pt-0 font-weight-bolder font-size-h5 text-right">Grand Total</td>
                                <td class="border-0 pt-0 font-weight-bolder font-size-h5 text-success text-right pr-0">RM {{$parent.Totals}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="separator separator-dashed my-5"></div>
                <h6 class="font-weight-bolder mb-3">Remarks :</h6>
                <div class="text-dark-50 line-height-lg">
                    <div>{{$parent.remarks}}</div>
                </div>
            </div>
        </div>
    </div>
</template>

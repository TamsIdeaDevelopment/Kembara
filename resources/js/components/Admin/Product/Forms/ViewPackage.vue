<template>
    <div class="" data-wizard-type="step-content" data-wizard-state="current">
        <h4 class="mb-5 font-weight-bold text-dark">Confirm your package</h4>

        <div class="card-body">
            <div class="symbol symbol-100 symbol-xl-100">
                <div class="symbol-label"  :style="'background-image:url( storage/Product/'+ $parent.PackagesType.featured_image +')'"></div>
            </div>
            <h4 class="font-weight-bold text-dark">{{$parent.PackagesType.name}}</h4>
            <h6 class="mb-5 font-weight-bold text-dark">{{$parent.PackagesType.description}}</h6>

            <div class="separator separator-dashed my-5"></div>
            <h6 class="font-weight-bolder mb-3">Package Details:</h6>
            <div class="text-dark-50 line-height-lg">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="pl-0 font-weight-bold text-muted text-uppercase">Product Name</th>
<!--                            <th class="text-right font-weight-bold text-muted text-uppercase"></th>-->
<!--                            <th class="text-right font-weight-bold text-muted text-uppercase"></th>-->
                            <td colspan="2"></td>
                            <th class="text-right pr-0 font-weight-bold text-muted text-uppercase">Quantity</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="font-weight-boldest border-bottom" v-for="Product in data[0]">
                            <td class="border-0 pl-0 pt-7 d-flex align-items-center">{{Product.name}}</td>
<!--                            <td class="text-right pt-7 align-middle"></td>-->
<!--                            <td class="text-right pt-7 align-middle"></td>-->
                            <td colspan="2"></td>
                            <td class="text-right PR-0 pt-7 align-middle">{{Product.quantity}}</td>
                        </tr>
<!--                        <tr>-->
<!--                            <td colspan="2"></td>-->
<!--                            <td class="font-weight-bolder text-right">Total Item</td>-->
<!--                            <td class="font-weight-bolder text-right pr-0">{{$parent.Count}}</td>-->
<!--                        </tr>-->
<!--                        <tr >-->
<!--                            <td colspan="2" class="border-0 pt-0"></td>-->
<!--                            <td class="border-0 pt-0 font-weight-bolder text-right">Discount</td>-->
<!--                            <td class="border-0 pt-0 font-weight-bolder text-right pr-0">RM </td>-->
<!--                        </tr>-->
                        <tr>
                            <td colspan="2" class="border-0 pt-0"></td>
                            <td class="border-0 pt-0 font-weight-bolder font-size-h5 text-right">Grand Total (SM)</td>
                            <td class="border-0 pt-0 font-weight-bolder font-size-h5 text-success text-right pr-0">RM {{$parent.PackagesType.retail_price}}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="border-0 pt-0"></td>
                            <td class="border-0 pt-0 font-weight-bolder font-size-h5 text-right">Grand Total (SS)</td>
                            <td class="border-0 pt-0 font-weight-bolder font-size-h5 text-success text-right pr-0">RM {{$parent.PackagesType.ss_retail_price}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
    export default{
        props: ['data'],
        data(){
            return{
            }
        },
        created() {

        },
        mounted () {
        },
        methods: {
        }
    }
</script>

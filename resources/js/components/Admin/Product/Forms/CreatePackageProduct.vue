<template>
    <div class="" data-wizard-type="step-content" data-wizard-state="current">
        <h4 class="mb-5 font-weight-bold text-dark">Select your product</h4>
        <p class="mb-5 font-weight-bold text-danger">*Please ensure that you insert the value on selected products.</p>
        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
            <thead>
            <tr>
                <th>Product Name</th>
                <th>Price (SM)</th>
                <th>Price (SS)</th>
                <th>Quantity</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(ProductName) in data">
                <td>{{ProductName.name}}</td>
                <td>
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">RM</span></div>
                        <input type="number" class="form-control" id="product-smprice" placeholder="RM" v-model="ProductName.semenanjung_price"/>
                    </div>
                </td>
                <td>
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">RM</span></div>
                        <input type="number" class="form-control" id="product-ssprice" placeholder="RM" v-model="ProductName.ss_price" />
                    </div>
                </td>
                <td>
                    <input type="number" class="form-control" id="product-quantity" placeholder="Quantity" v-model="ProductName.quantity"  />
                </td>
                <td>
                    <label class="checkbox checkbox-success">
                        <input type="checkbox" id="product-checkbox" v-model="$parent.ProductSelected" :value="ProductName" @change="$parent.selectProduct()" />
                        <span></span>
                    </label>
                </td>
            </tr>
            </tbody>
        </table>

    </div>
</template>
<script>
    export default {
        props: ['data'],
        data() {
            return {
                image_source: 'storage/Product/',
                dataTable:null,
                editing: false,
                listProducts: [],
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
        }
    }
</script>

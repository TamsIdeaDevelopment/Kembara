<template>
    <div class="" data-wizard-type="step-content" >
        <h4 class="mb-5 font-weight-bold text-dark">View Products in this Package</h4>

        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
            <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price (SM)</th>
                <th>Price (SS)</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(ProductName,index) in $parent.Packages">
                <td>{{ProductName.product_id.name}}</td>
                <td>
                    <input type="text" class="form-control" placeholder="Quantity" v-model="$parent.Packages[index].qty"  disabled />
                </td>
                <td>
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">RM</span></div>
                        <input type="text" class="form-control" placeholder="RM" v-model="$parent.Packages[index].retail_price"  disabled />
                    </div>
                </td>
                <td>
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">RM</span></div>
                        <input type="text" class="form-control" placeholder="RM" v-model="$parent.Packages[index].ss_retail_price"  disabled />
                    </div>
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
        }
    }
</script>

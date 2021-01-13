<template>
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid">
            <agent-dashboard-chart :data="data"></agent-dashboard-chart>
            <div class="row mt-5">
                <div class="col-lg-12 col-xxl-12">
                    <order-hq-list></order-hq-list>
                </div>
            </div>
        </div>
    </div>

</template>
<script>
    export default {
        props: ['data'],
        data() {
            return {
            }
        },
        mounted() {},
        watch: {
            data() {}
        },
        created(){

        },
        methods: {

        }

    }

</script>
<template>
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid">
            <admin-dashboard-chart  :data="data"></admin-dashboard-chart>
            <div class="row mt-5">
                <div class="col-lg-12 col-xxl-12">
                    <order-team-list></order-team-list>
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
                image_source: 'storage/ProfilePicture/',
                Order:[],
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
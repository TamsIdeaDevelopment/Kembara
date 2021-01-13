<template>
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-xxl-12">
                    <agent-team-list></agent-team-list>
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
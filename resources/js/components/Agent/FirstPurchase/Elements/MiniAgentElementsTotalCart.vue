<template>
    <span class="btn btn-xs btn-icon btn-circle btn-white btn-text-success btn-success btn-shadow">
        {{Count}}
    </span>
</template>
<script>
    import { EventBus } from "../../../../app";
    export default {
        data() {
            return {
                Count: 0,
            }
        },
        mounted() {
            EventBus.$on('updateTotalCart', () => {
                this.fetchCount();
            });
        },
        watch: {
            data() {}
        },
        created(){
            this.fetchCount();
        },
        methods: {
            fetchCount(){
                axios.get('/api/v1/cart/count-cart')
                    .then(function (response) {
                        this.Count = response.data;
                    }.bind(this));
            },
        }

    }

</script>

<template>
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-xxl-12">
                    <agent-stock-list :data="this.data"></agent-stock-list>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['data']
    }

</script>

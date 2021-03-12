<template>
    <div>
        <div  v-if="AgentDetails.paid =='0'">
            <agent-product-first-purchase-dashboard :data="data"></agent-product-first-purchase-dashboard>
        </div>
        <div v-if="AgentDetails.paid =='1'">
            <agent-product-dashboard :data="data"></agent-product-dashboard>
        </div>
    </div>
</template>
<script>
    export default {
        props:['data'],
        data() {
            return {
                AgentDetails:{},
            }
        },
        mounted () {},
        created(){
            this.fetchAgentDetails();
        },
        methods:
            {
                fetchAgentDetails(){
                    fetch('/api/v1/team/Lists/' + this.data.id +'/agent-details').then(response => response.json())
                        .then(response => {
                            this.AgentDetails = response;
                            console.log(this.AgentDetails.paid)
                        })
                        .catch(error => console.log(error))
                },
            }
    }
</script>

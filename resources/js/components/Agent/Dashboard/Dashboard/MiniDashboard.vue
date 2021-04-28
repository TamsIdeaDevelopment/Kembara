<template>
    <div>
        <div v-if="AgentDetails.paid == 0 && AgentDetails.agent_levels_id.id >= 5">
            <div class="container-fluid">
                <section class="pricing-section ptb-100 gray-light-bg ">
                    <div class="container ">
                        <div class="row justify-content-center ">
                            <div class="col-md-8 ">
                                <br>
                                <br>
                                <div class="section-heading text-center mb-5 ">
                                    <h2>Pakej untuk Mini Ejen KEMBARA Meals </h2>
                                    <p CLASS="lead ">Setiap ejen KEMBARA Meals yang baru mendaftar, perlu membuat pembelian pertama Pakej Usahawan KEMBARA yang merangkumi produk-produk berikut:</p>
                                </div>
                            </div>
                        </div>
                        <agent-mini-package-lists :data="this.AgentDetails"></agent-mini-package-lists>
                    </div>
                </section>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['data'],
        data() {
            return {
                AgentDetails:[],
            }
        },
        mounted() {
        },
        watch: {
            data() {}
        },
        created(){
            this.fetchAgentDetails();
        },
        methods: {
            fetchAgentDetails(){
                fetch('/api/v1/team/Lists/' + this.data.id +'/agent-info').then(response => response.json())
                    .then(response => {
                        this.AgentDetails = response.data;
                        console.log(this.AgentDetails.agent_levels_id.id)

                    })
                    .catch(error => console.log(error))
            },
        }

    }

</script>

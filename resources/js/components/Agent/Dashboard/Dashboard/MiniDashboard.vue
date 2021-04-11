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
                        <div class="row justify-content-center ">
                            <div class="col-lg-4 col-md ">
                                <div class="card text-center single-pricing-pack ">
                                    <div class="pt-4 ">
                                        <h5>Pakej A</h5>
                                    </div>
                                    <div class="card-header py-4 border-0 pricing-header ">
                                        <div class="h1 text-center mb-0 ">RM<span class="price font-weight-bolder ">447</span></div>
                                    </div>
                                    <div class="pricing-img mt-4 ">
                                        <img src="assets2/img/basic.svg " alt="pricing img " class="img-fluid ">
                                    </div>
                                    <div class="card-body ">
                                        <ul class="list-unstyled text-sm mb-4 pricing-feature-list ">
                                            <li>10 Pek Beef Rendang With Pilaf Rice</li>
                                            <li>10 Pek Nasi Lemak With Chicken Rendang</li>
                                            <li>10 Pek Chicken Masak Merah With Tomato Rice</li>
                                            <br>
                                        </ul>
                                        <a :href="'/cart-miniagent-item/'+data.id+'/1'" class="btn btn-light-danger btn-shadow-hover font-weight-bold mr-3">Beli Sekarang</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md ">
                                <div class="card popular-price text-center single-pricing-pack ">
                                    <div class="pt-4 ">
                                        <h5>Pakej B</h5>
                                    </div>
                                    <div class="card-header py-4 border-0 pricing-header ">
                                        <div class="h1 text-center mb-0 ">RM<span class="price font-weight-bolder ">626</span></div>
                                    </div>
                                    <div class="pricing-img mt-4 ">
                                        <img src="assets2/img/standard.svg " alt="pricing img " class="img-fluid ">
                                    </div>
                                    <div class="card-body ">
                                        <ul class="list-unstyled text-sm mb-4 pricing-feature-list ">
                                            <li>10 Pek Beef Rendang With Pilaf Rice</li>
                                            <li>10 Pek Nasi Lemak With Chicken Rendang</li>
                                            <li>10 Pek Chicken Masak Merah With Tomato Rice</li>
                                            <li>10 Pek Lamb Kuzi With Hujan Panas Rice</li>
                                        </ul>
                                        <a :href="'cart-miniagent-item/'+data.id+'/2'" class="btn btn-light-danger btn-shadow-hover font-weight-bold mr-3" >Beli Sekarang</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</template>
<script>
    import { EventBus } from "../../../../app";
    export default {
        props: ['data'],
        data() {
            return {
                AgentDetails:[],
                errors:[],
                Carts: [],
                Count: [],
                Totals: [],
                minimum_order:0,
            }
        },
        mounted() {
            EventBus.$on('updateDashboardCart', () => {
                this.fetchCart();
            });
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

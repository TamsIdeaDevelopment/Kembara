<template>
    <div class="modal fade newAgentPrice" id="newAgentPrice" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form @submit.prevent="CreateRolesPrice">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Agent Price</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Agent</label>
                            <div class="row" v-if="('agent_levels_id' in errors)">
                                <div class="col">
                                    <label class="text-danger">{{errors['agent_levels_id']}}</label>
                                </div>
                            </div>
                            <select class="form-control select2" style="width:100%" id="create-agent-price-roles"  v-model="AgentPrice.agent_levels_id">
                                <option v-for="ParentName in this.$parent.$parent.ParentNames" :value="ParentName.id">{{ ParentName.name }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Semenanjung</label>
                            <div class="row" v-if="('price' in errors)">
                                <div class="col">
                                    <label class="text-danger">{{errors['price']}}</label>
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">RM</span></div>
                                <input type="text"  class="form-control"  v-model="AgentPrice.price"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Sabah & Sarawak</label>
                            <div class="row" v-if="('ss_price' in errors)">
                                <div class="col">
                                    <label class="text-danger">{{errors['ss_price']}}</label>
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">RM</span></div>
                                <input type="text"  class="form-control"  v-model="AgentPrice.ss_price"/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary font-weight-bold">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        props: {},
        data(){
            return{
                AgentPrice:{
                    agent_levels_id: '',
                    product_id: '',
                    price: '',
                    minimum_order: '',
                },
                errors: [],
            }
        },
        created() {
//            this.getParentName();
        },
        mounted () {

            $('#create-agent-price-roles').select2({
                placeholder: "Select",
                allowClear: true
            });
            $("#create-agent-price-roles").change(function(){
                this.AgentPrice.agent_levels_id = $("#create-agent-price-roles").val();
            }.bind(this));
        },
        methods:
            {
//                getParentName(){
//                    axios.get('/api/v1/roles/Lists/' + this.$parent.$parent.data +'/agent-dropdown')
//                        .then(function (response) {
//                            this.ParentNames = response.data;
//                        }.bind(this));
//                },
                CreateRolesPrice() {
                    this.errors = [];
                    if((this.AgentPrice.price !== '') && (this.AgentPrice.agent_levels_id !== ''))
                    {
                        var url = '/api/v1/product/Creates/create-agent-price-product', method = 'post';

                        fetch(url, {
                            method: method,
                            body: JSON.stringify({
                                agent_levels_id: this.AgentPrice.agent_levels_id,
                                product_id:this.$parent.$parent.Products.id,
                                price: this.AgentPrice.price,
                                minimum_order: this.AgentPrice.minimum_order,
                            }),
                            headers: {
                                'content-type': 'application/json'
                            }
                        }).then((response) => {

                            VueEvent.$emit('fetchProduct');
                            VueEvent.$emit('fetchPriceAndMOQ');
                            VueEvent.$emit('fetchRole');
                            this.clearForm();
                            this.errors = [];
                            $('.newAgentPrice').click();

                            toastr.options = {
                                "closeButton": true,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": false,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            };

                            toastr.success("Successfully Register New Agent Price.", "Agent Price Created");
                        })
                    }

                    if(!this.AgentPrice.price)
                    {
                        this.errors['price'] = "Please enter the price"
                    }if
                    (!this.AgentPrice.agent_levels_id)
                    {
                        this.errors['agent_levels_id'] = "Please select the agent"
                    }
                },
                clearForm(){
                    this.AgentPrice = {
                        agent_levels_id: '',
                        product_id: '',
                        price: '',
                        minimum_order: '',
                    }
                }
            }
    }


</script>

<template>
    <div class="row ">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-custom">
                        <div class="card-header flex-wrap py-5">
                            <div class="card-title">
                                <h3 class="card-label">
                                    <span class="nav-icon mr-3">
                                        <i class="flaticon-price-tag text-primary"></i>
                                    </span>
                                    Agent Price
                                </h3>
                            </div>
                            <div class="card-toolbar">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".newAgentPrice">
                                    <i class="flaticon-price-tag"></i> New Agent Price
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form @submit.prevent="UpdateRolesPrice">
                                        <div class="card-body p-0 pl-0">
                                            <div class="form-group" v-for="(Role,index) in $parent.RolesPriceMOQ">
                                                <h6 class="text-primary">{{Role.agent_levels_id.name}}</h6>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <label>Semenanjung</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text">RM</span></div>
                                                            <input type="text" class="form-control" v-model="$parent.RolesPriceMOQ[index].price" placeholder="RM"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>Sabah & Sarawak</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text">RM</span></div>
                                                            <input type="text" class="form-control" v-model="$parent.RolesPriceMOQ[index].ss_price" placeholder="RM"/>
                                                        </div>
                                                    </div>
<!--                                                    <div class="col-lg-4">-->
<!--                                                        <label>Singapura & Brunei</label>-->
<!--                                                        <div class="input-group">-->
<!--                                                            <div class="input-group-prepend"><span class="input-group-text">$</span></div>-->
<!--                                                            <input type="text" class="form-control" v-model="$parent.RolesPriceMOQ[index].sg_brn_price" placeholder="RM"/>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer pb-5 pr-0" style="display: flex; justify-content: flex-end">
                                            <button type="submit" class="btn btn-primary mt-n5">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <price-modal-create></price-modal-create>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        props: {},
        data(){
            return{
                errors: [],
            }
        },
        created() {
        },
        mounted () {},
        methods:
            {
                UpdateRolesPrice()
                {
                        var url = '/api/v1/product/Updates/agent-price-products', method = 'post';

                        fetch(url, {
                            method: method,
                            body: JSON.stringify(this.$parent.RolesPriceMOQ),
                            headers: {
                                'content-type': 'application/json'
                            }
                        }).then(async response => {
                            const data = await response.json();
                            VueEvent.$emit('fetchProduct');
                            VueEvent.$emit('fetchPriceAndMOQ');
                            VueEvent.$emit('fetchRole');

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

                            toastr.success("Successfully Update Agent Price.", "Agent Price Updated");
                        })
                }
            }
    }


</script>

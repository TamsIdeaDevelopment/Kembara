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
                                        <i class="flaticon-shopping-basket text-primary"></i>
                                    </span>
                                    Agent MOQ
                                </h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form @submit.prevent="UpdateRolesPrice">
                                        <div class="card-body p-0 pl-0">
                                            <div class="form-group" v-for="(Role,index) in $parent.RolesPriceMOQ">
                                                <label>{{Role.agent_levels_id.name}}</label>
                                                <input type="text" class="form-control" v-model="$parent.RolesPriceMOQ[index].minimum_order" placeholder="RM"/>
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
                        toastr.success("Successfully Update Agent MOQ.", "Agent MOQ Updated");
                    })
                }
            }
    }


</script>

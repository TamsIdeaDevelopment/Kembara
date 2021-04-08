<template>
    <div class="row ">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="card-title">
                        <span class="nav-icon mr-3">
                            <i class="flaticon-coins text-primary"></i>
                        </span>
                        Point
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form  @submit.prevent="UpdatePoint">
                        <div class="card-body p-0 pl-0">
                            <div class="form-group">
                                <label>Point</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon-coins text-primary"></i></span></div>
                                    <input  type="text" class="form-control" v-model="$parent.AgentDetails.point"/>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer pr-0" style="display: flex; justify-content: flex-end">
                            <button type="submit" class="btn btn-primary mt-n5">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                errors: [],
                States: [],
                territories: [],
                options:[],
                state_id: '',
            }
        },
        created() {
        },

        mounted () {
        },
        methods:
            {
                UpdatePoint() {
                    var url = '/api/v1/team/Updates/'+ this.$parent.AgentDetails.id +'/update-membership-point', method = 'post';

                    fetch(url, {
                        method: method,
                        body: JSON.stringify({
                            point: this.$parent.AgentDetails.point,
                        }),
                        headers: {
                            'content-type': 'application/json'
                        }
                    }).then((response) => {
                        VueEvent.$emit('fetchAgentDetails');
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

                        toastr.success("Successfully update membership point.", "Membership Updated");
                    })

                },
            }
    }


</script>

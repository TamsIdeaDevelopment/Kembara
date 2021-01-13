<template>
    <div class="modal fade updateState" id="updateState" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form @submit.prevent="UpdateState">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Roles</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>State Name <span class="text-danger">*</span></label>
                            <div class="row" v-if="('name' in errors)">
                                <div class="col">
                                    <label class="text-danger">{{errors['name']}}</label>
                                </div>
                            </div>
                            <input type="text"  class="form-control"  v-model="State.name"/>
                        </div>
                        <div class="form-group">
                            <label>Short Code</label>
                            <input type="text"  class="form-control"  v-model="State.shortcode"/>
                        </div>
                        <div class="form-group">
                            <label>Quota</label>
                            <input type="text"  class="form-control"  v-model="State.quota"/>
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
        props: ['data'],
        data(){
            return{
                State:[],
                errors: [],
            }
        },
        watch: {
            'data': function() {
                this.State = this.data;
            }
        },
        created() {},
        mounted () {},
        methods:
            {
                UpdateState() {
                    this.errors = [];
                    if((this.State.name !== ''))
                    {
                        var url = '/api/v1/state/Updates/'+ this.State.id +'/update-state', method = 'post';

                        fetch(url, {
                            method: method,
                            body: JSON.stringify({
                                name: this.State.name,
                                shortcode:this.State.shortcode,
                                quota: this.State.quota,
                                total: this.State.total,
                            }),
                            headers: {
                                'content-type': 'application/json'
                            }
                        }).then((response) => {

                            VueEvent.$emit('fetchState');
                            this.errors = [];
                            $('.updateState').click();

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

                            toastr.success("Successfully Update State.", "State Updated");
                        })
                    }

                    if(!this.State.name)
                    {
                        this.errors['name'] = "Please enter the role name"
                    }
                }
            }
    }


</script>
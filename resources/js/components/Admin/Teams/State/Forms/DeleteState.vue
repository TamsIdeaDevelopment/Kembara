<template>
    <div class="modal fade deleteState" id="deleteState" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form @submit.prevent="DeleteState">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="exampleModalLabel">Are you sure to delete?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>State Name <span class="text-danger">*</span></label>
                            <input type="text"  class="form-control"  v-model="State.name" disabled/>
                        </div>
                        <div class="form-group">
                            <label>Short Code</label>
                            <input type="text"  class="form-control"  v-model="State.shortcode" disabled/>
                        </div>
                        <div class="form-group">
                            <label>Quota</label>
                            <input type="text"  class="form-control"  v-model="State.quota" disabled/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary font-weight-bold">Delete</button>
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
                DeleteState()
                {
                    var url = '/api/v1/state/Deletes/'+ this.State.id +'/delete-state', method = 'delete';

                    fetch(url, {
                        method: method,
                        body: JSON.stringify(),
                        headers: {
                            'content-type': 'application/json'
                        }
                    }).then((response) => {

                        VueEvent.$emit('fetchState');
                        $('.deleteState').click();

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

                        toastr.success("Successfully Delete State.", "State Deleted");
                    })
                },
            }
    }


</script>
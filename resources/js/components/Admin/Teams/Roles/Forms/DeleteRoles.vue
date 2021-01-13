<template>
    <div class="modal fade deleteRoles" id="deleteRoles" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form @submit.prevent="DeleteRoles">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="exampleModalLabel">Are you sure to delete?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Roles Name <span class="text-danger">*</span></label>
                            <input type="text"  class="form-control"  v-model="Roles.name" disabled/>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text"  class="form-control"  v-model="Roles.description" disabled/>
                        </div>
                        <div class="form-group">
                            <label>Parent</label>
                            <input type="text"  class="form-control"  v-model="Roles.parent" disabled/>
                        </div>
                        <div class="form-group">
                            <label>Remarks</label>
                            <input type="text"  class="form-control"  v-model="Roles.remarks" disabled/>
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
                Roles:[],
            }
        },
        watch: {
            'data': function() {
                this.Roles = this.data;
            }
        },
        created() {},
        mounted () {
            $("#kt_select2_4").change(function(){
                this.Roles.parent = $("#kt_select2_4").val();
            }.bind(this));
        },
        methods:
            {
                DeleteRoles()
                {
                        var url = '/api/v1/roles/Deletes/'+ this.Roles.id +'/delete-roles', method = 'delete';

                        fetch(url, {
                            method: method,
                            body: JSON.stringify(),
                            headers: {
                                'content-type': 'application/json'
                            }
                        }).then((response) => {

                            VueEvent.$emit('fetchRole');
                            $('.deleteRoles').click();

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

                            toastr.success("Successfully Delete Role.", "Role Deleted");
                        })
                },
            }
    }


</script>
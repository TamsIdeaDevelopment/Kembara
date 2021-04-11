<template>
    <div class="modal fade" id="deletePackage" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form @submit.prevent="deletePackage">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger">Are you sure you want to delete?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" v-model="Package.name" disabled/>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control" v-model="Package.description" disabled/>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label>Semenanjung Retail</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text">RM</span></div>
                                        <input type="text" class="form-control" v-model="Package.retail_price"disabled/>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label>Sabah & Sarawak Retail</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text">RM</span></div>
                                        <input type="text" class="form-control" v-model="Package.ss_retail_price"disabled/>
                                    </div>
                                </div>
                            </div>
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
                Package:[],
            }
        },
        watch: {
            'data': function() {
                this.Package = this.data;
            }
        },
        created() {},
        mounted () {},
        methods:
            {
                deletePackage()
                {
                    var url = '/api/v1/product/Deletes/'+ this.Package.id +'/package', method = 'post';

                    fetch(url, {
                        method: method,
                        body: JSON.stringify(),
                        headers: {
                            'content-type': 'application/json'
                        }
                    }).then((response) => {

                        VueEvent.$emit('fetchPackage');
                        $('#deletePackage').click();
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

                        toastr.success("Successfully deleted the package.", "Package is Deleted");
                    })
                },
            }
    }


</script>

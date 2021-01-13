<template>
    <div class="modal fade deleteTerritory" id="deleteTerritory" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form @submit.prevent="DeleteTerritory">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="exampleModalLabel">Are you sure to delete?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Territory Name</label>
                            <input type="text"  class="form-control"  v-model="Territory.name" disabled/>
                        </div>
                        <div class="form-group">
                            <label>Quota</label>
                            <input type="text"  class="form-control"  v-model="Territory.quota" disabled/>
                        </div>
                        <div class="form-group">
                            <label>State</label>
                            <input type="text"  class="form-control"  v-model="this.state_name" disabled/>

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
                Territory:[],
                state_name:'',
            }
        },
        watch: {
            'data': function() {
                this.Territory = this.data;
                this.state_name = this.Territory.state.name;
            }
        },
        created() {},
        mounted () {},
        methods:
            {
                DeleteTerritory()
                {
                    var url = '/api/v1/territory/Deletes/'+ this.Territory.id +'/delete-territory', method = 'delete';

                    fetch(url, {
                        method: method,
                        body: JSON.stringify(),
                        headers: {
                            'content-type': 'application/json'
                        }
                    }).then((response) => {

                        VueEvent.$emit('fetchTerritory');
                        $('.deleteTerritory').click();

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

                        toastr.success("Successfully Delete Territory.", "Territory Deleted");
                    })
                },
            }
    }


</script>
<template>
    <div class="modal fade updateTerritory" id="updateTerritory" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form @submit.prevent="UpdateTerritory">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Territory</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Territory Name <span class="text-danger">*</span></label>
                            <div class="row" v-if="('name' in errors)">
                                <div class="col">
                                    <label class="text-danger">{{errors['name']}}</label>
                                </div>
                            </div>
                            <input type="text"  class="form-control"  v-model="Territory.name"/>
                        </div>
                        <div class="form-group">
                            <label>Quota</label>
                            <input type="text"  class="form-control"  v-model="Territory.quota"/>
                        </div>
                        <div class="form-group">
                            <label>State</label>
                            <div class="row" v-if="('state' in errors)">
                                <div class="col">
                                    <label class="text-danger">{{errors['state']}}</label>
                                </div>
                            </div>
                            <select class="form-control select2" style="width:100%" id="update-select-territory" v-model="state_id">
                                <option v-for="State in States" :value="State.id">{{ State.name }}</option>
                            </select>
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
                States: [],
                Territory:[],
                state_id: '',
                errors: [],
            }
        },
        watch: {
            'data': function() {
                this.Territory = this.data;
                this.state_id = this.Territory.state.id;
            }
        },
        created() {
            this.getStateName();
        },
        mounted () {
            $('#update-select-territory').select2({
                placeholder: "Select",
                allowClear: true
            });
            $("#update-select-territory").change(function(){
                this.state_id = $("#update-select-territory").val();
            }.bind(this));
        },
        methods:
            {
                getStateName(){
                    axios.get('/api/v1/state/Lists/list-state')
                        .then(function (response) {
                            this.States = response.data;
                        }.bind(this));
                },
                UpdateTerritory() {
                    //alert(this.Territory.state)
                    this.errors = [];
                    if((this.Territory.name !== '') && (this.state_id !== ''))
                    {
                        var url = '/api/v1/territory/Updates/'+ this.Territory.id +'/update-territory', method = 'post';

                        fetch(url, {
                            method: method,
                            body: JSON.stringify({
                                name: this.Territory.name,
                                quota:this.Territory.quota,
                                state: this.state_id,
                            }),
                            headers: {
                                'content-type': 'application/json'
                            }
                        }).then((response) => {
                            this.state_id =''
                            VueEvent.$emit('fetchTerritory');
                            this.errors = [];
                            $('.updateTerritory').click();

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

                            toastr.success("Successfully Update Territory.", "Territory Updated");
                        })
                    }

                    if(!this.Territory.name)
                    {
                        this.errors['name'] = "Please enter the territory name"
                    }
                    if(!this.state_id)
                    {
                        this.errors['state'] = "Please select the state"
                    }
                }
            }
    }


</script>
<template>
    <div class="modal fade updateRoles" id="updateRoles" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form @submit.prevent="UpdateRoles">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Roles</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Roles Name <span class="text-danger">*</span></label>
                            <div class="row" v-if="('name' in errors)">
                                <div class="col">
                                    <label class="text-danger">{{errors['name']}}</label>
                                </div>
                            </div>
                            <input type="text"  class="form-control"  v-model="Roles.name"/>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text"  class="form-control"  v-model="Roles.description"/>
                        </div>
                        <div class="form-group">
                            <label>Parent</label>
                            <div class="row" v-if="('parent' in errors)">
                                <div class="col">
                                    <label class="text-danger">{{errors['parent']}}</label>
                                </div>
                            </div>
                            <select class="form-control select2" style="width:100%" id="update-select-roles" v-model="Roles.parent">
                                <option v-for="ParentName in ParentNames" :value="ParentName.name" v-if="ParentName.name == Roles.parent ? 'selected': 'true' ">{{ ParentName.name }}</option>
                                <!--<option v-for="ParentName in ParentNames" :value="ParentName.name">{{ ParentName.name }}</option>-->
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Remarks</label>
                            <input type="text"  class="form-control"  v-model="Roles.remarks"/>
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
                selected:'',
                ParentNames: [],
                Roles:[],
                errors: [],
            }
        },
        watch: {
            'data': function() {
                this.Roles = this.data;
            }
        },
        created() {
            this.getParentName();
        },
        mounted () {
            $('#update-select-roles').select2({
                placeholder: "Select",
                allowClear: true
            });
            $("#update-select-roles").change(function(){
                this.Roles.parent = $("#update-select-roles").val();
            }.bind(this));
        },
        methods:
            {
                getParentName(){
                    axios.get('/api/v1/roles/Lists/parent-roles')
                        .then(function (response) {
                            this.ParentNames = response.data;
                        }.bind(this));
                },
                UpdateRoles() {
                    this.errors = [];
                    if((this.Roles.name !== '') && (this.Roles.parent !== ''))
                    {
                        var url = '/api/v1/roles/Updates/'+ this.Roles.id +'/update-roles', method = 'post';

                        fetch(url, {
                            method: method,
                            body: JSON.stringify({
                                name: this.Roles.name,
                                description:this.Roles.description,
                                parent: this.Roles.parent,
                                remarks: this.Roles.remarks,
                            }),
                            headers: {
                                'content-type': 'application/json'
                            }
                        }).then((response) => {

                            VueEvent.$emit('fetchRole');
                            //this.clearForm();
                            this.errors = [];
                            $('.updateRoles').click();

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

                            toastr.success("Successfully Update Role.", "Role Updated");
                        })
                    }

                    if(!this.Roles.name)
                    {
                        this.errors['name'] = "Please enter the role name"
                    }
                    if(!this.Roles.parent)
                    {
                        this.errors['parent'] = "Please select the Parent"
                    }
                },
                clearForm(){
                    this.Roles = {
                        'name': '',
                        'description': '',
                        'parent': '',
                        'remarks': '',
                    }
                }
            }
    }


</script>
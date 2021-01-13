<template>
    <div>
        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
            <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Parent</th>
                <th>Remark</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(Role, index) in data">
                <td>{{index+1}}</td>
                <td>{{Role.name}}</td>
                <td>{{Role.description}}</td>
                <td>{{Role.parent}}</td>
                <td>{{Role.remarks}}</td>
                <td>
                    <a href="javascript:void(0);" class="btn btn-sm btn-clean btn-icon"  data-toggle="modal" v-on:click="openEditRecord(Role)" title="Update">
                    <span class="svg-icon svg-icon-md">
                        <i class="text-primary fas fa-pencil-alt"></i>
                    </span>
                    </a>
                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon"   data-toggle="modal" v-on:click="openDeleteRecord(Role)" title="Delete">
                    <span class="svg-icon svg-icon-md">
                        <i class="text-danger far fa-trash-alt"></i>
                    </span>
                    </a>
                </td>
            </tr>
            </tbody>
        </table>
        <roles-form-update :data="this.Roles"></roles-form-update>
        <roles-form-delete :data="this.Roles"></roles-form-delete>
    </div>
</template>
<script>
    export default {
        props: ['data'],
        data() {
            return {
                Roles:[],
                dataTable:null,
                editing: false,
            }
        },
        mounted() {},
        watch: {
            data() {}
        },
        created(){},
        methods: {
            openEditRecord(data){
                $(".updateRoles").modal('show');
                this.Roles = data;
            },
            openDeleteRecord(data){
                $(".deleteRoles").modal('show');
                this.Roles = data;
            },
        }

    }

</script>
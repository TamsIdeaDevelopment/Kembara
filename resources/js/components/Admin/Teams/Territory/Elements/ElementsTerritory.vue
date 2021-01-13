<template>
    <div>
        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
            <thead>
            <tr>
                <th>No</th>
                <th>State</th>
                <th>Name</th>
                <th>Quota</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(Territory, index) in data">
                <td>{{index+1}}</td>
                <td>{{Territory.state.name}}</td>
                <td>{{Territory.name}}</td>
                <td>{{Territory.quota}}</td>
                <td>
                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon "   data-toggle="modal" v-on:click="openEditRecord(Territory)" title="Delete">
                    <span class="svg-icon svg-icon-md">
                        <i class="text-primary fas fa-pencil-alt"></i>
                    </span>
                    </a>
                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon " v-on:click="openDeleteRecord(Territory)" title="Delete">
                    <span class="svg-icon svg-icon-md">
                        <i class="text-danger far fa-trash-alt"></i>
                    </span>
                    </a>
                </td>
            </tr>
            </tbody>
        </table>
        <territory-form-update :data="this.Territories"></territory-form-update>
        <territory-form-delete :data="this.Territories"></territory-form-delete>
    </div>
</template>
<script>
    export default {
        props: ['data'],
        data() {
            return {
                Territories:[],
                dataTable:null,
                editing: false,
            }
        },
        mounted() {
            VueEvent.$on('updateTable', () => {
                this.updateTable();
            });
        },
        watch: {
            data() {}
        },
        created(){},
        methods:
            {
                openEditRecord(data){
                    $(".updateTerritory").modal('show');
                    this.Territories = data;
                },
                openDeleteRecord(data){
                    $(".deleteTerritory").modal('show');
                    this.Territories = data;
                },
            }

    }

</script>
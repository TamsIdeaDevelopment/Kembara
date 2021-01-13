<template>
    <div>
        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
            <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Short Code</th>
                <th>Quota</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(State, index) in data">
                <td>{{index+1}}</td>
                <td>{{State.name}}</td>
                <td>{{State.shortcode}}</td>
                <td>{{State.quota}}</td>
                <td>
                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon"  data-toggle="modal" v-on:click="openEditRecord(State)"  title="Update">
                    <span class="svg-icon svg-icon-md">
                        <i class="text-primary fas fa-pencil-alt"></i>
                    </span>
                    </a>
                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon"  data-toggle="modal" v-on:click="openDeleteRecord(State)" title="Delete">
                    <span class="svg-icon svg-icon-md">
                        <i class="text-danger far fa-trash-alt"></i>
                    </span>
                    </a>
                </td>
            </tr>
            </tbody>
        </table>
        <state-form-update :data="this.States"></state-form-update>
        <state-form-delete :data="this.States"></state-form-delete>
    </div>
</template>
<script>
    export default {
        props: ['data'],
        data() {
            return {
                States:[],
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
            data() {

            }
        },
        created(){

        },
        methods: {
            openEditRecord(data){
                $(".updateState").modal('show');
                this.States = data;
            },
            openDeleteRecord(data){
                $(".deleteState").modal('show');
                this.States = data;
            },
        }

    }

</script>
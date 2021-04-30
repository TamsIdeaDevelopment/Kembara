<template>
    <div>
        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
            <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Payment Method</th>
                <th>Level</th>
                <th>Date</th>
                <th>Leader</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(Team, index) in data">
                <td>{{index+1}}</td>
                <td><a :href="'/agent-details/'+Team.user_id.id">KM{{String('00000' + Team.member_no).slice(-5)}}</a></td>
                <td>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                    <div class="symbol" v-if="Team.user_id.avatar">
                                        <div class="symbol-label  w-50px h-50px" :style="'background-image:url('+ image_source + Team.user_id.avatar +')'"></div>
                                    </div>
                                    <div class="symbol" v-if="!Team.user_id.avatar">
                                        <div class="symbol-label  w-50px h-50px"> <i class="flaticon2-user"></i></div>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="mt-1">
                                        {{Team.user_id.name}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </td>
                <td>
                    <span v-if="Team.status =='1'" class="label label-success label-pill label-inline mr-2">Active</span>
                    <span v-if="Team.status =='2'" class="label label-danger label-pill label-inline mr-2">Not Active</span>
                </td>
                <td>
                    <span v-if="!Team.user_id.payment_api_key" class="label label-warning label-pill label-inline mr-2">Not Active {{Team.user_id.payment_api_key }}</span>
                    <span v-if="Team.user_id.payment_api_key" class="label label-success label-pill label-inline mr-2">Active</span>
                </td>
                <td>{{Team.agent_levels_id.name}}</td>
                <td>{{Team.created_at}}</td>
                <td><a :href="'/agent-details/'+Team.leader_id.user_id">KM{{String('00000' + Team.leader_id.member_no).slice(-5)}}</a></td>
                <td>
                    <div class="row mb-1">
                        <div class="col-12">
                            <a :href="'/agent-details/'+Team.user_id.id" class="btn btn-sm btn-primary">Edit</a>
                        </div>
                    </div>
                    <!--<div class="row mb-1">-->
                        <!--<div class="col-12">-->
                            <!--<a class="btn btn-sm btn-danger"  data-toggle="modal" v-on:click="openDeleteRecord(Team)">Delete</a>-->
                        <!--</div>-->
                    <!--</div>-->
                </td>
            </tr>
            </tbody>
        </table>
        <team-form-delete :data="this.Teams"></team-form-delete>
    </div>
</template>
<script>
    export default {
        props: ['data'],
        data() {
            return {
                image_source: 'storage/ProfilePicture/',
                Teams:[],
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
//            openEditRecord(data){
//                $(".updateState").modal('show');
//                this.States = data;
//            },
            openDeleteRecord(data){
                $(".deleteTeam").modal('show');
                this.Teams = data;
            },
        }

    }

</script>

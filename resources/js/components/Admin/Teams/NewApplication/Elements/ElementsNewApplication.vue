<template>
    <div>
        <table class="table table-separate table-head-custom table-checkable" id="new-application-table">
            <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Payment Status</th>
                <th>Level</th>
                <th>Leader</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(NewApplication, index) in data">
                <td>{{index+1}}</td>
                <td><a :href="'/agent-details/'+NewApplication.user_id.id">TMP{{String('00000' + NewApplication.id).slice(-5)}}</a></td>
                <td>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                    <div class="symbol" v-if="NewApplication.user_id.avatar">
                                        <div class="symbol-label  w-50px h-50px" :style="'background-image:url('+ image_source + NewApplication.user_id.avatar +')'"></div>
                                    </div>
                                    <div class="symbol" v-if="!NewApplication.user_id.avatar">
                                        <div class="symbol-label  w-50px h-50px"> <i class="flaticon2-user"></i></div>
                                    </div>
                                </div>
                                <div class="col-8">
                                    {{NewApplication.user_id.name}}
                                </div>
                            </div>
                        </div>
                    </div>

                </td>
                <td>
                    <span v-if="NewApplication.status =='0'" class="label label-warning label-pill label-inline mr-2">Pending</span>
                </td>
                <td>
                    <span v-if="NewApplication.paid =='0'" class="label label-danger label-pill label-inline mr-2">Pending</span>
                    <span v-if="NewApplication.paid =='1'" class="label label-success label-pill label-inline mr-2">Paid</span>
                </td>
                <td>{{NewApplication.agent_levels_id.name}}</td>
                <td>
                    <a :href="'/agent-details/'+NewApplication.leader_id.user_id" v-if="NewApplication.leader_id.HQ == 0">KM{{String('00000' + NewApplication.leader_id.member_no).slice(-5)}}</a>
                    <a v-if="NewApplication.leader_id.HQ == 1">HQ</a>
                </td>
                <td>{{NewApplication.created_at}}</td>
                <td>
                    <div class="row mb-1">
                        <div class="col-12">
                            <a :href="'/agent-details/'+NewApplication.user_id.id" class="btn btn-sm btn-primary">Edit</a>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-12">
                            <a class="btn btn-sm btn-success"  data-toggle="modal" v-on:click="openEditRecord(NewApplication)">Approve</a>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-12">
                            <a class="btn btn-sm btn-danger"  data-toggle="modal" v-on:click="openDeleteRecord(NewApplication)">Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <agent-approve-form-update :data="this.NewApplication"></agent-approve-form-update>
        <new-application-form-delete :data="this.NewApplication"></new-application-form-delete>
    </div>
</template>
<script>
    export default {
        props: ['data'],
        data() {
            return {
                image_source: 'storage/ProfilePicture/',
                NewApplication:[],
                LeaderName:[],
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
        methods: {
            fetchAgentDetails(data){
                fetch('/api/v1/team/Lists/' + data.leader_id.user_id +'/agent-info').then(response => response.json())
                    .then(response => {
                        this.LeaderName = response.data.user_id.name;
                    })
                    .catch(error => console.log(error))
            },
            openEditRecord(data){
                this.fetchAgentDetails(data);
                $(".updateApproveAgent").modal('show');
                this.NewApplication = data;
            },
            openDeleteRecord(data){
                $(".deleteNewApplication").modal('show');
                this.NewApplication = data;
            },
        }

    }

</script>
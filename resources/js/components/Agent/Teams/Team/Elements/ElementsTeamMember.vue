<template>
    <table style="width:100%" class="table table-separate table-head-custom table-checkable responsive display nowrap" id="table-team-member">
        <thead>
        <tr>
            <th data-priority="1">#</th>
            <th data-priority="1">ID</th>
            <th>Name</th>
            <th>Status</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(Team, index) in data">
            <td>{{index+1}}</td>
            <td>
                <a v-if="!Team.member_no" :href="'/agent-details/'+Team.id">TMP{{String('00000' + Team.id).slice(-5)}}</a>
                <a v-if="Team.member_no" :href="'/agent-details/'+Team.id">KM{{String('00000' + Team.member_no).slice(-5)}}</a>
            </td>
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
                <span v-if="Team.status =='0'" class="label label-warning label-pill label-inline mr-2">Pending</span>
                <span v-if="Team.status =='1'" class="label label-success label-pill label-inline mr-2">Active</span>
                <span v-if="Team.status =='2'" class="label label-danger label-pill label-inline mr-2">Not Active</span>
            </td>
            <td>{{Team.created_at}}</td>
            <td>
                <div class="row mb-1">
                    <div class="col-12">
                        <a :href="'/agent-details/'+Team.id" class="btn btn-sm btn-primary">View</a>
                    </div>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
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
//            openDeleteRecord(data){
//                $(".deleteState").modal('show');
//                this.States = data;
//            },
        }

    }

</script>
<template>
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="card-label">List of Team
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-separate table-head-custom table-checkable text-left responsive display nowrap" id="kt_datatable" style="width: 100%">
                <thead>
                <tr>
                    <th >#</th>
                    <th >ID</th>
                    <th data-priority="1">Name</th>
                    <th>Level</th>
                    <th>State</th>
                    <th>Territory</th>
                    <th data-priority="2"></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(Team, index) in data">
                    <td>{{index+1}}</td>
                    <td>KM{{String('00000' + Team.member_no).slice(-5)}}</td>
                    <td>
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="symbol" v-if="Team.user_id.avatar">
                                            <div class="symbol-label  w-50px h-50px" :style="'background-image:url('+ image_source + Team.user_id.avatar +')'"></div>
                                        </div>
                                        <div class="symbol" v-if="!Team.user_id.avatar">
                                            <div class="symbol-label  w-50px h-50px"> <i class="flaticon2-user"></i></div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="mt-1">
                                            {{Team.user_id.name}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                <span v-if="Team.HQ == 0">
                    {{Team.agent_levels_id.name}}
                </span>
                        <span v-if="Team.HQ == 1">
                    HQ
                </span>
                    </td>
                    <td>
                <span v-if="Team.HQ == 0">
                    {{Team.state_id.name}}
                </span>
                        <span v-if="Team.HQ == 1">
                    HQ
                </span>
                    </td>
                    <td>
                <span v-if="Team.HQ == 0">
                    {{Team.territory_id.name}}
                </span>
                        <span v-if="Team.HQ == 1">
                    HQ
                </span>
                    </td>
                    <td>
                        <div class="row mb-1">
                            <div class="col-12">
                                <a :href="'invite/KM' + String('00000' + Team.member_no).slice(-5)" class="btn btn-sm btn-primary">Join Now</a>
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
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
            console.log(this.data)
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
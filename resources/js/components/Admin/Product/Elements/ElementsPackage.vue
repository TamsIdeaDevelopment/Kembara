<template>
    <div>
        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Price (SM)</th>
                <th>Price (SS)</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(Package, index) in data">
                <td>{{index+1}}</td>
                <td>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="symbol" v-if="Package.featured_image">
                                        <div class="symbol-label  w-50px h-50px" :style="'background-image:url('+ image_source + Package.featured_image +')'"></div>
                                    </div>
                                    <div class="symbol" v-if="!Package.featured_image">
                                        <div class="symbol-label  w-70px h-70px"> <i class="fas fa-box"></i></div>
                                    </div>
                                </div>
                                <div class="col-auto mt-1">
                                    <span class="">{{Package.name}}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </td>
                <td>RM {{Package.retail_price}}</td>
                <td>RM {{Package.ss_retail_price}}</td>
                <td>
                    <div class="row mb-1">
                        <div class="col-lg-5 mb-1">
                            <a :href="'/view-package/'+Package.id" class="btn btn-sm btn-primary">View</a>
                        </div>
                        <div class="col-lg-5">
                            <a class="btn btn-sm btn-danger"  data-toggle="modal" v-on:click="openDeleteRecord(Package)">Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <package-form-delete :data="this.Package"></package-form-delete>
    </div>
</template>
<script>
    export default {
        props: ['data'],
        data() {
            return {
                image_source: 'storage/Product/',
                Package:[],
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
            openDeleteRecord(data){
                $("#deletePackage").modal('show');
                this.Package = data;
            },
        }

    }

</script>

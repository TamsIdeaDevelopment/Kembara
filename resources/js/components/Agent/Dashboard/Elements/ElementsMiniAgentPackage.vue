<template>
    <div>
        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
            <thead>
            <tr>
                <th>#</th>
                <th>Package Name</th>
                <th>Price</th>
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
                <td>
                    <div v-if="$parent.$parent.data.country == 'Malaysia'">
                        <div v-if="$parent.$parent.data.east_west == 'Semenanjung'">
                            RM {{Package.retail_price}}
                        </div>
                        <div v-if="$parent.$parent.data.east_west == 'SS'">
                            RM {{Package.ss_retail_price}}
                        </div>
                    </div>
                </td>
                <td>
                    <div class="row mb-1">
                        <div class="col-lg-3">
                            <a class="btn btn-sm btn-primary"  data-toggle="modal" v-on:click="viewDetailsPackage(Package)">View</a>
                        </div>
                        <div class="col-lg-5">
                            <a :href="'/cart-miniagent-item/'+$parent.$parent.data.id+'/'+Package.id" class="btn btn-sm btn-primary">Buy Now</a>
                        </div>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

<!--        begin: View Package Details Modal   -->
        <div class="modal fade" id="viewPackage" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text">Package Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Package Name</label>
                                <input type="text" class="form-control" v-model="Package.name" disabled/>
                            </div>
                            <div class="form-group">
                                <label>Descriptions</label>
                                <textarea cols="30" rows="10" class="form-control" v-model="Package.description" disabled></textarea>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label>Price</label>
                                            <div v-if="$parent.$parent.data.country == 'Malaysia'">
                                                <div v-if="$parent.$parent.data.east_west == 'Semenanjung'">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text">RM</span></div>
                                                        <input type="text" class="form-control" v-model="Package.retail_price"disabled/>
                                                    </div>
                                                </div>
                                                <div v-if="$parent.$parent.data.east_west == 'SS'">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text">RM</span></div>
                                                        <input type="text" class="form-control" v-model="Package.ss_retail_price"disabled/>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                        </div>
                </div>
            </div>
        </div>
<!--        end: View Package Details Modal -->
    </div>
</template>
<script>
    export default {
        props: ['data'],
        data() {
            return {
                image_source: 'storage/Package/',
                Package:[],
                dataTable:null,
                editing: false,
            }
        },
        mounted() {
        },
        watch: {
            data() {}
        },
        created(){},
        methods: {
            viewDetailsPackage(data){
                $("#viewPackage").modal('show');
                this.Package = data;
            },
        }

    }

</script>

<template>
    <div>
        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
            <thead>
            <tr>
                <th></th>
                <th>No</th>
                <th>Status</th>
                <th>Buyer</th>
                <th>Date</th>
                <th>Total</th>
                <th>Tracking</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(Shipment, index) in data">
                <td>
                    <div class="checkbox-inline">
                        <label class="checkbox  checkbox-sm">
                            <input type="checkbox"  v-model="$parent.shipment_selected" :value="Shipment" @change="$parent.selectShipment()"/>
                            <span></span>
                        </label>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-auto">
                                    <a target="_blank" :href="'/'+Shipment.id+'/order-details'" class="">#{{String('000000' + Shipment.id).slice(-6)}}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </td>
                <td>
                    <span v-if="Shipment.delivery_status == 0" class="label label-warning label-pill label-inline mr-2">Processing</span>
                    <span v-if="Shipment.delivery_status == 1" class="label label-success label-pill label-inline mr-2">Shipped</span>
                </td>
                <td>{{Shipment.buyer_id.name}}</td>
                <td>{{Shipment.created_at}}</td>
                <td>RM {{Shipment.total}}</td>
                <td>
                    <div class="row">
                        <div class="col-lg-9">
                            <!--<input class="form-control" style="width: 100%" type="text" v-model="Shipment.tracking_no">-->
                            <textarea class="form-control" style="" type="text" v-model="Shipment.tracking_no"></textarea>
                        </div>
                        <div class="col-lg-3">
                            <a @click="updateTracking(Shipment.id,Shipment.tracking_no)" class="btn btn-primary">Save</a>
                        </div>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
    export default {
        props: ['data'],
        data() {
            return {
                image_source: 'storage/Product/',
                Shipment:[],
                dataTable:null,
                editing: false,
                errors: [],
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
            updateTracking(order_id,tracking_no)
            {
                console.log(tracking_no);
                this.errors = [];
                if((tracking_no !== null) && (tracking_no !== ''))
                {
                    var url = '/api/v1/orders/HQ/Updates/' + order_id +'/'+ tracking_no +'/update-shipment', method = 'post';

                    fetch(url, {
                        method: method,
                        body: JSON.stringify(),
                        headers: {
                            'content-type': 'application/json'
                        }
                    }).then(async response => {
                        const data = await response.json();
                        VueEvent.$emit('fetchShipment');

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

                        toastr.success("Successfully Update Tracking No.", "Tracking No Updated");
                    })
                }
                if((tracking_no === null) || (tracking_no == '')){
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

                    toastr.error("Please Insert The Tracking No.", "Failed");
                }
            },
            openDeleteRecord(data){
                $(".deleteProduct").modal('show');
                this.Shipment = data;
            },
        }

    }

</script>
<template>
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <h3 class="card-label">Shipment
                    <span class="d-block text-muted pt-2 font-size-sm">List of Shipment</span>
                </h3>
            </div>
            <div class="card-toolbar">
                <div class="row">
                    <download-excel
                            class   = "btn"
                            style="background-color: #3699FF; color: white;"
                            :data   = "json_data"
                            type    = "xls"
                            worksheet = "My Worksheet"
                            name="shipment">

                        Download Excel
                    </download-excel>
                </div>
            </div>
        </div>
        <div class="card-body">
            <admin-shipping-element :data="this.Shipment"></admin-shipping-element>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                Shipment:[],
                dataTable:null,
                shipment_selected:[],
                shipment_details:[],
                json_fields:[],
                json_data: [],
                json_meta: [
                    [
                        {
                            'key': 'charset',
                            'value': 'utf-8'
                        }
                    ]
                ],
            }
        },
        created(){
            this.fetchShipment();
        },
        mounted() {
            VueEvent.$on('fetchShipment', () => {
                this.fetchShipment();
            });
        },

        methods : {
            selectShipment(){
                this.shipment_details = [];
                    for(let i = 0; i < this.shipment_selected.length; i++){
                    this.shipment_details.push(
                        {

                            'No' : i+1,
                            'Category' : 'Bags & Luggages',
                            'Parcel Content*' : 'Foods',
                            'Parcel Value(RM)*' :'7.90',
                            'Weight (kg)*' : '0.98',
                            'Pick Up Date*' : '',
                            'Sender Name*' : 'Kembara Meals',
                            'Sender Company' : 'Kembara Meals Sdn Bhd',
                            'Sender Contact*' : '019-868 6297',
                            'Sender Alt Contact' : '',
                            'Sender Email' : '',
                            'Sender Address' : 'No. CS23A, Jalan Puteri 2A/6, 43000 Kajang, Selangor',
                            'Sender Postcode*' : '43000',
                            'Sender City*' : 'Kajang',
                            'receiver_name': this.shipment_selected[i].deliver_to,
                            'receiver_company': "",
                            'receiver_contact': this.shipment_selected[i].deliver_to_phone_no,
                            'receiver_alt_contact': "",
                            'receiver_email': "",
                            'receiver_address': this.shipment_selected[i].shipping_address,
                            'receiver_postcode': this.shipment_selected[i].postcode,
                            'receiver_city': this.shipment_selected[i].city,
                            'courier_company': "",
                            'alt_courier_company': "",
                            'tracking_sms': "",
                            'drop_off': "",
                            'reference': '# '+String('000000' + this.shipment_selected[i].id).slice(-6),
                        }
                    );
                }
                this.json_data = this.shipment_details;
            },
            fetchShipment(){
                fetch('/api/v1/orders/HQ/Lists/list-shipment').then(response => response.json())
                    .then(response => {
                        this.Shipment = response.data;
//                        for(let i = 0; i < this.Shipment.length; i++){
//                            this.shipment_details.push(
//                                {
//
//                                    'No' : i+1,
//                                    'Category' : 'Bags & Luggages',
//                                    'Parcel Content*' : 'Foods',
//                                    'Parcel Value(RM)*' :'7.90',
//                                    'Weight (kg)*' : '0.98',
//                                    'Pick Up Date*' : '',
//                                    'Sender Name*' : 'Kembara Meals',
//                                    'Sender Company' : 'Kembara Meals Sdn Bhd',
//                                    'Sender Contact*' : '019-868 6297',
//                                    'Sender Alt Contact' : '',
//                                    'Sender Email' : '',
//                                    'Sender Address' : 'No. CS23A, Jalan Puteri 2A/6, 43000 Kajang, Selangor',
//                                    'Sender Postcode*' : '43000',
//                                    'Sender City*' : 'Kajang',
//                                    'receiver_name': this.Shipment[i].deliver_to,
//                                    'receiver_company': "",
//                                    'receiver_contact': this.Shipment[i].deliver_to_phone_no,
//                                    'receiver_alt_contact': "",
//                                    'receiver_email': "",
//                                    'receiver_address': this.Shipment[i].shipping_address,
//                                    'receiver_postcode': this.Shipment[i].postcode,
//                                    'receiver_city': this.Shipment[i].city,
//                                    'courier_company': "",
//                                    'alt_courier_company': "",
//                                    'tracking_sms': "",
//                                    'drop_off': "",
//                                    'reference': String('000000' + this.Shipment[i].id).slice(-6),
//                                }
//                        );
//                        }
//
//                        this.json_data = this.shipment_details;

                        $('#kt_datatable').DataTable().destroy();
                        this.$nextTick(() =>
                        {
                            $('#kt_datatable').DataTable(
                                {
                                    responsive: true,
                                    pagingType: 'full_numbers',
                                    columnDefs: [
                                        { "width": "10px", "targets": 0 },
                                        { "width": "50px", "targets": 1 },
                                        { "width": "50px", "targets": 2 },
                                        { "width": "50px", "targets": 3 },
                                        { "width": "50px", "targets": 4 },
                                        { "width": "250px", "targets": 5 },
                                        { "width": "250px", "targets": 6 },
                                        {
                                            //targets: 3,
                                            width: '150px',
                                            title: 'Actions',
                                            orderable: false,
                                            render: function(data, type, full, meta) {

                                            },
                                        },
                                    ],
                                }
                            );
                        });

                    })
                    .catch(error => console.log(error))
            },
        }
    }

</script>

<template>
    <div class="row">
        <div class="col-lg-12 col-xxl-12">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="card-title">
                        <span class="nav-icon mr-3">
                            <i class="flaticon2-image-file text-primary"></i>
                        </span>
                        Profile Image
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row  text-center">
                        <div class="col-lg-12">
                            <div class="card card-custom gutter-b">
                                <div class="card-header justify-content-center">
                                    <div class="text-center mt-5 mb-5">
                                        <div class="symbol" v-if="$parent.details.avatar">
                                            <div class="symbol-label w-250px h-250px"  :style="'background-image:url('+ image_source + $parent.details.avatar +')'"></div>
                                        </div>
                                        <div class="symbol" v-if="!$parent.details.avatar">
                                            <div class="symbol-label  w-250px h-250px"> <i  style="font-size: 150px"class="flaticon2-user"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        props: {},
        data(){
            return{
                photo: '',
                image_source: 'storage/ProfilePicture/',
            }
        },
        created() {

        },
        methods: {
            selectFile(event) {
                this.photo = event.target.files[0];

            },
            UploadImages()
            {
                let currentObj = this;
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }

                let formData = new FormData();
                formData.append("image", this.photo);
                let vm= this;
                axios.post('api/v1/profile/'+ this.$parent.details.id +'/change-profile-picture', formData, config)
                    .then(function (data) {
                        location.reload();
                    })
                    .catch(function (error) {
                        currentObj.output = error;
                    });
            },
        }
    }


</script>
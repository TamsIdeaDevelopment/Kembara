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
                                        <div class="symbol">
                                            <div class="symbol-label  w-250px h-250px" :style="'background-image:url('+ image_source + $parent.details.avatar +')'"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form method="post" @submit.prevent="UploadImages" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12 col-xxl-12">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-xxl-3 col-form-label text-lg-right">Upload Files:</label>
                                    <div class="col-lg-7 col-xxl-7">
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile" @change="selectFile"/>
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                        <small><strong>*No special characters in a file name. E.g., ! @ # ? ] } )</strong></small>
                                        </br>
                                        <small><strong>*Max size: 2MB</strong></small>
                                    </div>
                                    <div class="col-lg-3 col-xxl-3"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-xxl-12">
                                <div class="card-footer pr-0" style="display: flex; justify-content: flex-end">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </div>
                            </div>
                        </div>
                    </form>
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

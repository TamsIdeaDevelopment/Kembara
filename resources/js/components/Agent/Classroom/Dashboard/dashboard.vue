<template>
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-xxl-12 ">
                    <div class="card-custom gutter-b">
                        <div class="card-body d-flex flex-column">
                            <div class="row">
                                <div class="col-lg-4 col-xxl-2">
                                    <div class="row">
                                        <div class="col-lg-12 col-xxl-12">
                                            <div class="navi navi-bold navi-hover navi-active navi-link-rounded">
                                                <ul class="navi-item mb-2 nav nav-link" id="myTab" role="tablist">
                                                    <li class="nav-item">
                                                        <div class="card bg-warning card-custom gutter-b">
                                                            <div class="card-header">
                                                                <h6 class="text-white card-title">List Classroom</h6>

                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="nav-item" v-for="(Classroom, index) in Classrooms">
                                                        <div class="card card-custom gutter-b">
                                                            <div class="card-header  ribbon ribbon-clip ribbon-left">
                                                                <div class="ribbon-target" style="top: 15px; height: 45px;">
                                                                    <span class="ribbon-inner bg-success"></span>
                                                                    <i class="flaticon2-open-text-book text-white"></i>
                                                                </div>
                                                                <a class="nav-link navi-link py-4" :id="Classroom.id" data-toggle="tab" href="#"  @click="openTab(Classroom)" aria-controls="change-password">
                                                                    <span class="nav-icon">
                                                                    </span>
                                                                    <span class="nav-text h6">{{Classroom.name}}</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-xxl-10">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="tab-content" id="myTabContent">
                                                <div v-if="!tabActive">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="card card-custom gutter-b">
                                                                <div class="card-body">
                                                                    <ul class="nav nav-tabs nav-tabs-space-lg nav-tabs-line nav-tabs-bold nav-tabs-line-3x" role="tablist">
                                                                        <li class="nav-item mr-3">
                                                                            <a class="nav-link">
                                                                                <h3 class="">
                                                                                    <span class="nav-icon mr-3">
                                                                                        <i class="flaticon2-open-text-book text-primary"></i>
                                                                                    </span>
                                                                                    Classroom
                                                                                </h3>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="card card-custom gutter-b">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="carousel-inner pt-9">
                                                                                <div class="carousel-item active">
                                                                                    <div class="flex-grow-1">
                                                                                        <h3 class="font-size-h4 text-dark-75 text-hover-primary font-weight-bold">Mari mengasah skill berniaga dengan mengikuti classroom yang disediakan oleh kami</h3>
                                                                                        <p class="text-dark-75 font-size-lg font-weight-normal pt-2">
                                                                                            Perkara pertama yang perlu anda tahu tetang perniagaan ialah berani mengambil risiko.Dan perkara ini juga yang membuatkan ramai usahawan berada di takut lama kerana takut akan risiko.Tidak perlu khuatir. Dengan menyertai Team Kembara Meals, kami akan bimbing anda dengan formula khas untuk mengawal risiko dan berjaya dalam perniagaan.
                                                                                        </p>
                                                                                        <p class="text-dark-75 font-size-lg font-weight-normal pt-2">
                                                                                            Berniaga ni nampak je senang. Tapi sebenarnya, banyak perkara yang perlu dititikberatkan.Sebagai usahawan pertama kali,sudah pastinya anda tidak tahu tentang cabang-cabang perniagaan yang banyak sehingga keliru untuk mula daripada mana.Anda juga mungkin tidak jumpa lagi sumber-sumber ilmu dan bimbinganyang dapat membantu anda untuk mendapatkan result yang anda mahu.
                                                                                        </p>
                                                                                        <p class="text-dark-75 font-size-lg font-weight-normal pt-2">
                                                                                            Percaya tak bila peluang sebenarnya ada di sekitar kita? Namun, kita tidak pandai melihat dan merebut peluang yang ada. Dan ada di antara kita yang menyesal kerana tidak merebut peluang untuk mengubah kehidupan. Jika ini adalah peluang yang anda cari selama ini, teruskan membaca. InsyaAllah, ia mampu mengubah kehidupan anda dan keluarga                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="">
                                                                                        <span class="font-size-h4 text-primary text-hover-primary font-weight-bold pt-3 pb-5 d-block text-uppercase">Video</span>
                                                                                        <div class="d-inline d-flex justify-content-center">
                                                                                            <iframe width="750" height="400" :src="'https://www.youtube.com/embed/tRMY12LSUYQ'">
                                                                                            </iframe>
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
                                                </div>
                                                <agent-classroom-elements v-if="tabActive" :data="Classroom"></agent-classroom-elements>
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
    </div>
</template>
<script>
    export default {
        props:['data'],
        data() {
            return {
                Classrooms:[],
                Classroom:[],
                tabActive:false,
                image_source: 'storage/ProfilePicture/',

            }
        },
        created(){
            this.FetchClassroom();
        },
        mounted() {
            VueEvent.$on('FetchClassroom', () => {
                this.FetchClassroom();
            });
        },

        methods : {
            openTab(data) {
                this.tabActive =false;
                this.tabActive =true;
                this.Classroom = [];
                this.Classroom = data;
            },
            FetchClassroom(){
                fetch('api/v1/Classroom/Team/Lists/all-classroom').then(response => response.json())
                    .then(response => {
                        this.Classrooms = response.data;
                    })
                    .catch(error => console.log(error))
            },
        }
    }
</script>
@extends('layouts.landing.layout')

@section('content')

    <div id="preloader">
        <div class="loader1">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!--loader end-->

    <!--header section start-->
    <header class="header">
        <!--start navbar-->
        <nav class="navbar navbar-expand-lg fixed-top bg-transparent">
            <div class="container">
                <a class="navbar-brand" href="{{ route('/') }}">
                    <img src="/assets2/image/kembara-logo-depan.png" alt="logo" class="img-fluid" style="width:150px; height: 100px;" />
                </a>
                <a href="{{ route('login') }}">
                    <button class="btn btn-block primary-solid-btn border-radius mt-4 mb-3">
                        Login
                    </button>
                </a>
                {{--<button class="btn btn-light" type="button">--}}
                {{--<span>Login</span>--}}
                {{--</button>--}}
                {{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
                {{--<span class="ti-menu"></span>--}}
                {{--</button>--}}

            </div>
        </nav>
    </header>
    <!--header section end-->

    <!--body content wrap start-->
    <div class="main">

        <!--hero background image with content slider start-->
        <!--desktop version-->
        <section class="hero-section hero-bg-2 ptb-100 hidden-xs">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-9 col-lg-12">
                        <div class="hero-slider-content text-white text-center my-lg-5">
                            <br>
                            <br>
                            <h3 class="text-white">PENDAPATAN ANDA TERJEJAS AKIBAT PKP? KETAHUI BAGAIMANA EJEN KAMI MAMPU TAMBAH PENDAPATAN DENGAN PRODUK<br> READY-TO-EAT (RTE)!</h3>
                            <p class="lead">Waktu getir dan susah dalam pandemik yang melanda seluruh dunia ini memang tidak disangka-sangka.<br>Ada yang terpaksa dipotong gaji dan ada juga yang terpaksa diberhentikan kerja.<br><br> Tapi,jangan jadikan pandemik ini sebagai
                                pematah semangat anda. Kami di Kembara Meals <br>ingin berkongsi rezeki kepada kepada anda yang terjejas.</p>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-8">
                        <div class="image-wrap">
                            <iframe width="750" height="400" src="https://www.youtube.com/embed/tRMY12LSUYQ">
                            </iframe>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--mobile version-->
        <section class="hero-section hero-bg-2 ptb-100 visible-xs">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-9 col-lg-12">
                        <div class="hero-slider-content text-white text-center my-lg-5">
                            <br>
                            <br>
                            <h4 class="text-white">PENDAPATAN ANDA TERJEJAS AKIBAT PKP? KETAHUI BAGAIMANA EJEN KAMI MAMPU TAMBAH
                                PENDAPATAN DENGAN PRODUK READY-TO-EAT (RTE)!</h4>
                            <p class="lead">Waktu getir dan susah dalam pandemik yang melanda seluruh dunia ini memang tidak
                                disangka-sangka.Ada yang terpaksa dipotong gaji dan ada juga yang terpaksa diberhentikan
                                kerja.<br><br> Tapi,jangan jadikan pandemik ini sebagai
                                pematah semangat anda. Kami di Kembara Meals ingin berkongsi rezeki kepada kepada anda
                                yang
                                terjejas.</p>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-8">
                        <div class="image-wrap">
                            <iframe width="350" height="200" src="https://www.youtube.com/embed/tRMY12LSUYQ">
                            </iframe>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--hero background image with content slider end-->
        <!--desktop version-->
        <section class="our-portfolio-section ptb-100 hidden-xs">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="section-heading text-center mb-5 ">
                            <h4>KETAHUI BAGAIMANA EJEN KAMI JANA PENDAPATAN DENGAN <br>PRODUK READY-TO-EAT (RTE)</h4>
                            <p class="lead">Peluang tak akan datang bergolek sekiranya anda tidak memulakan langkah.</p>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-6">
                        <a href="#daftar-sekarang">
                            <button class="btn btn-block secondary-solid-btn border-radius mt-4 mb-3">
                                <h6>AYUH SERAI TEAM KEMBARA MEALS SEKARANG!</h6>
                                Saya mahu menjana pendapatan bersama kembara meals
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!--mobile version-->
        <section class="our-portfolio-section ptb-10 visible-xs">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="section-heading text-center mb-5 ">
                            <h4>KETAHUI BAGAIMANA EJEN KAMI JANA PENDAPATAN DENGAN PRODUK READY-TO-EAT (RTE)</h4>
                            <p class="lead">Peluang tak akan datang bergolek sekiranya anda tidak memulakan langkah.</p>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-6">
                        <a href="#daftar-sekarang">
                            <button class="btn btn-block secondary-solid-btn border-radius mt-4 mb-3" >
                                <p>AYUH SERAI TEAM KEMBARA MEALS SEKARANG!</p>
                                Saya mahu menjana pendapatan bersama kembara meals
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!--desktop version-->
        <section class="our-portfolio-section ptb-100 hidden-xs">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="section-heading text-center mb-5">
                            <br>
                            <br>
                            <h3>Sebelum menjadi usahawan yang berjaya,ini beberapa perkara <br>penting yang perlu anda fahami.</h3>
                            <p class="lead">Ramai bertanggapan bahawa menjadi usahawan adalah perkara yang mudah dan tidak perlu bimbingan. <br>Sekiranya menjadi usahawan itu sesenang ABC, sudah tentu ramai telah menjadi jutawan sekarang. Tapi, realitinya?</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--mobile version-->
        <section class="our-portfolio-section ptb-10 visible-xs">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="section-heading text-center mb-5">
                            <br>
                            <br>
                            <h4>Sebelum menjadi usahawan yang berjaya,ini beberapa perkara penting yang perlu anda fahami.
                            </h4>
                            <p class="lead">Ramai bertanggapan bahawa menjadi usahawan adalah perkara yang mudah dan tidak perlu
                                bimbingan.Sekiranya menjadi usahawan itu sesenang ABC, sudah tentu ramai telah menjadi
                                jutawan sekarang. Tapi, realitinya?</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--desktop version-->
        <section class="about-us-section pb-100 hidden-xs">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-12 col-lg-6">
                        <br>
                        <br>
                        <div class="video-promo-content mb-md-4 mb-lg-0">
                            <h4>Nak berniaga, tapi tiada hala tuju? <br>Tiada bimbingan?</h4>
                            <p class="lead">Berniaga ni nampak je senang. Tapi sebenarnya, banyak perkara yang perlu dititikberatkan.Sebagai usahawan pertama kali,sudah pastinya anda tidak tahu tentang cabang-cabang perniagaan yang banyak sehingga keliru untuk mula daripada
                                mana.Anda juga mungkin tidak jumpa lagi sumber-sumber ilmu dan bimbinganyang dapat membantu anda untuk mendapatkan result yang anda mahu.</p>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="image-wrap">
                            <img src="/assets2/image/1 .jpg" alt="video" class="img-fluid rounded">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--mobile version-->
        <section class="about-us-section pb-100 visible-xs">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-12 col-lg-6">
                        <div class="image-wrap">
                            <img src="/assets2/image/1 .jpg" alt="video" class="img-fluid rounded">
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="video-promo-content mb-md-4 mb-lg-0">
                            <h4>Nak berniaga, tapi tiada hala tuju? Tiada bimbingan?</h4>
                            <p class="lead">Berniaga ni nampak je senang. Tapi sebenarnya, banyak perkara yang perlu
                                dititikberatkan.Sebagai usahawan pertama kali,sudah pastinya anda tidak tahu tentang
                                cabang-cabang perniagaan yang banyak sehingga keliru untuk mula daripada
                                mana.Anda juga mungkin tidak jumpa lagi sumber-sumber ilmu dan bimbinganyang dapat membantu anda
                                untuk mendapatkan result yang anda mahu.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--destop version-->
        <section class="about-us-section pb-100 hidden-xs">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-12 col-lg-6">
                        <div class="image-wrap">
                            <img src="/assets2/image/2.JPG" alt="video" class="img-fluid rounded">
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="video-promo-content mb-md-4 mb-lg-0">
                            <h4>Anda Takut nak mula sebab<br>risau risiko GAGAL</h4>
                            <p class="lead">Perkara pertama yang perlu anda tahu tetang perniagaan ialah berani mengambil risiko.Dan perkara ini juga yang membuatkan ramai usahawan berada di takut lama kerana takut akan risiko.Tidak perlu khuatir. Dengan menyertai Team
                                Kembara Meals, kami akan bimbing anda dengan formula khas untuk mengawal risiko dan berjaya dalam perniagaan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--mobile version-->
        <section class="about-us-section pb-100 visible-xs">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-12 col-lg-6">
                        <div class="image-wrap">
                            <img src="/assets2/image/2.JPG" alt="video" class="img-fluid rounded">
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="video-promo-content mb-md-4 mb-lg-0">
                            <h4>Anda Takut nak mula sebab<br>risau risiko GAGAL</h4>
                            <p class="lead">Perkara pertama yang perlu anda tahu tetang perniagaan ialah berani mengambil
                                risiko.Dan perkara ini juga yang membuatkan ramai usahawan berada di takut lama kerana takut
                                akan risiko.Tidak perlu khuatir. Dengan menyertai Team
                                Kembara Meals, kami akan bimbing anda dengan formula khas untuk mengawal risiko dan berjaya
                                dalam perniagaan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--desktop version-->
        <section class="about-us-section pb-100 hidden-xs">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-12 col-lg-6">
                        <div class="video-promo-content mb-md-4 mb-lg-0">
                            <h4>Peluang yang ada di depan mata anda LESAP begitu sahaja.Di mana SILAPNYA?</h4>
                            <p class="lead">Percaya tak bila peluang sebenarnya ada di sekitar kita? Namun, kita tidak pandai melihat dan merebut peluang yang ada. Dan ada di antara kita yang menyesal kerana tidak merebut peluang untuk mengubah kehidupan. Jika ini adalah
                                peluang yang anda cari selama ini, teruskan membaca. InsyaAllah, ia mampu mengubah kehidupan anda dan keluarga</p>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="image-wrap">
                            <img src="/assets2/image/3.jpg" alt="video" class="img-fluid rounded">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--mobile version-->
        <section class="about-us-section pb-100 visible-xs">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-12 col-lg-6">
                        <div class="image-wrap">
                            <img src="/assets2/image/3.jpg" alt="video" class="img-fluid rounded">
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="video-promo-content mb-md-4 mb-lg-0">
                            <h4>Peluang yang ada di depan mata anda LESAP begitu sahaja.Di mana SILAPNYA?</h4>
                            <p class="lead">Percaya tak bila peluang sebenarnya ada di sekitar kita? Namun, kita tidak pandai
                                melihat dan merebut peluang yang ada. Dan ada di antara kita yang menyesal kerana tidak merebut
                                peluang untuk mengubah kehidupan. Jika ini adalah
                                peluang yang anda cari selama ini, teruskan membaca. InsyaAllah, ia mampu mengubah kehidupan
                                anda dan keluarga</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--desktop version-->
        <section class="our-portfolio-section ptb-100 hidden-xs">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="section-heading text-center mb-5">
                            <h3>Zero Pengetahuan mengenai selok-belok perniagaan? <br>Jangan malu, jangan segan Biar KEMBARA bantu.</h3>
                            <p class="lead">Jangan salahkan diri sendiri sekiranya belum berjaya.Anda hanya belum jumpa sumber <br>bimbingan yang betul dari segi FIZIKAL dan MENTAL. Bersama Kembara Meals, kami <br>ingin membantu anda sehingga anda mampu berdiri dengan
                                kaki sendiri</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--mobile version-->
        <section class="our-portfolio-section ptb-100 visible-xs">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="section-heading text-center mb-5">
                            <h4>Zero Pengetahuan mengenai selok-belok perniagaan? Jangan malu, jangan segan Biar KEMBARA
                                bantu.</h4>
                            <p class="lead">Jangan salahkan diri sendiri sekiranya belum berjaya.Anda hanya belum jumpa sumber
                                bimbingan yang betul dari segi FIZIKAL dan MENTAL. Bersama Kembara Meals, kami ingin
                                membantu anda sehingga anda mampu berdiri dengan
                                kaki sendiri</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--testimonial section start-->
        <!--desktop version-->
        <section class="testimonial-section ptb-10 hidden-xs">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-9 col-lg-12">
                        <div class="section-heading mb-5 text-center">
                            <br>
                            <h5>Kembara Meals adalah satu syarikat bumiputera yang mengeluarkan produk makanan halal tahan lama.<br> Produk Kembara Meals direvolusikan dengan teknologi "Self-Heating" iaitu makanan boleh panas sendiri <br>dengan menggunakan
                                apa sahaja jenis air.</h5>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="owl-carousel owl-theme client-testimonial custom-arrow custom-arrow-bottom-center mb-5">
                            <div class="item">
                                <img src="/assets2/image/slider1.jpg" alt="client" width="50" class="img-fluid rounded" />
                            </div>
                            <div class="item">
                                <img src="/assets2/image/slider2.jpg" alt="client" width="50" class="img-fluid rounded" />
                            </div>
                            <div class="item">
                                <img src="/assets2/image/slider3.jpg" alt="client" width="50" class="img-fluid rounded" />
                            </div>
                            <div class="item">
                                <img src="/assets2/image/slider4.jpg" alt="client" width="50" class="img-fluid rounded" />
                            </div>
                            <div class="item">
                                <img src="/assets2/image/slider5.jpg" alt="client" width="50" class="img-fluid rounded" />
                            </div>
                            <div class="item">
                                <img src="/assets2/image/slider6.jpg" alt="client" width="50" class="img-fluid rounded" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--testimonial section end-->
        <br>
        <br>
        <!--mobile version-->
        <section class="testimonial-section ptb-10 visible-xs">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-9 col-lg-12">
                        <div class="section-heading mb-5 text-center">
                            <br>
                            <h5>Kembara Meals adalah satu syarikat bumiputera yang mengeluarkan produk makanan halal tahan
                                lama. Produk Kembara Meals direvolusikan dengan teknologi "Self-Heating" iaitu makanan boleh
                                panas sendiri dengan menggunakan
                                apa sahaja jenis air.</h5>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="owl-carousel owl-theme client-testimonial custom-arrow custom-arrow-bottom-center mb-5">
                            <div class="item">
                                <img src="/assets2/image/slider1.jpg" alt="client" width="50" class="img-fluid rounded" />
                            </div>
                            <div class="item">
                                <img src="/assets2/image/slider2.jpg" alt="client" width="50" class="img-fluid rounded" />
                            </div>
                            <div class="item">
                                <img src="/assets2/image/slider3.jpg" alt="client" width="50" class="img-fluid rounded" />
                            </div>
                            <div class="item">
                                <img src="/assets2/image/slider4.jpg" alt="client" width="50" class="img-fluid rounded" />
                            </div>
                            <div class="item">
                                <img src="/assets2/image/slider5.jpg" alt="client" width="50" class="img-fluid rounded" />
                            </div>
                            <div class="item">
                                <img src="/assets2/image/slider6.jpg" alt="client" width="50" class="img-fluid rounded" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--desktop version-->
        <section class="about-us-section pb-100 hidden-xs">
            <div class="container">
                <br>
                <br>
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-12 col-lg-6">
                        <div class="image-wrap">
                            <img src="/assets2/image/1. Siapa di sebalik KEMBARA.jpg " alt="video " class="img-fluid rounded ">
                        </div>
                    </div>
                    <div class=" col-md-12 col-lg-6 ">
                        <div class="video-promo-content mb-md-4 mb-lg-0 ">
                            <h4>Siapa di sebalik KEMBARA?</h4>
                            <p class="lead ">Berdepan dengan kesukaran untuk mendapatkan makanan halal dan berpatutan ketika berada di luar negara selama 5 tahun telah mencetuskan idea kepada pemilik jenama Kembara Adventure Meals, Muhamad Faiz Zakariah untuk mengusahakan
                                perniagaan makanan sedia dimkan.<br><br> Tercetusnyaidea untuk Faiz mencipta KEMBARA, makanan segera yang lebih sihat dan diperbuat daripada bahan masakan yang sebenar dan diiktiraf HALAL oleh JAKIM. Bukan itu sahaja, Kembara
                                bukanlah sekadar makanan segera yang biasa. Ia direvolusikan dengan teknologi "Self-Heating " iaitu makanan boleh panas sendiri dengan menggunakan apa sahaja jenis air</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--mobile version-->
        <section class="about-us-section pb-100 visible-xs">
            <div class="container">
                <br>
                <br>
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-12 col-lg-6">
                        <div class="image-wrap">
                            <img src="/assets2/image/1. Siapa di sebalik KEMBARA.jpg " alt="video " class="img-fluid rounded ">
                        </div>
                    </div>
                    <div class=" col-md-12 col-lg-6 ">
                        <div class="video-promo-content mb-md-4 mb-lg-0 ">
                            <h4>Siapa di sebalik KEMBARA?</h4>
                            <p class="lead ">Berdepan dengan kesukaran untuk mendapatkan makanan halal dan berpatutan ketika
                                berada di luar negara selama 5 tahun telah mencetuskan idea kepada pemilik jenama Kembara
                                Adventure Meals, Muhamad Faiz Zakariah untuk mengusahakan
                                perniagaan makanan sedia dimkan.<br><br> Tercetusnyaidea untuk Faiz mencipta KEMBARA, makanan
                                segera yang lebih sihat dan diperbuat daripada bahan masakan yang sebenar dan diiktiraf HALAL
                                oleh JAKIM. Bukan itu sahaja, Kembara
                                bukanlah sekadar makanan segera yang biasa. Ia direvolusikan dengan teknologi "Self-Heating "
                                iaitu makanan boleh panas sendiri dengan menggunakan apa sahaja jenis air</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--desktop version-->
        <section class="about-us-section pb-100 hidden-xs">
            <div class="container ">
                <div class="row justify-content-between align-items-center ">
                    <div class="col-md-12 col-lg-6 ">
                        <div class="video-promo-content mb-md-4 mb-lg-0 ">
                            <h4>KEMBARA juga bermula dari bawah</h4>
                            <p class="lead ">Kembara diasaskan pada tahun 2017. Sewaktu itu, HQ kami hanya beroperasi dari rumah.Seperti perniagaan lain, KEMBARA bermula dari bawah dan kami ingin memacu perniagaan ini ke tahap yang lebih tinggi bersama anda.<br><br>Dengan
                                azam dan matlamat yang jelas, kami ingin bangunkan 1 jenama produk makanan segera yang sihat, cepat dan berteknologi tinggi supaya rakyat Malaysia boleh menikmati apabila mereka dalam keadaan yang sukar untuk mendapatkan
                                makanan yang sihat & halal pada waktu yang singkat.</p>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 ">
                        <div class="image-wrap ">
                            <img src="/assets2/image/2. KEMBARA juga bermula dari bawah.jpg" alt="video" class="img-fluid rounded">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--mobile version-->
        <section class="about-us-section pb-100 visible-xs">
            <div class="container ">
                <div class="row justify-content-between align-items-center ">
                    <div class="col-md-12 col-lg-6 ">
                        <div class="image-wrap ">
                            <img src="/assets2/image/2. KEMBARA juga bermula dari bawah.jpg" alt="video" class="img-fluid rounded">
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 ">
                        <div class="video-promo-content mb-md-4 mb-lg-0 ">
                            <h4>KEMBARA juga bermula dari bawah</h4>
                            <p class="lead ">Kembara diasaskan pada tahun 2017. Sewaktu itu, HQ kami hanya beroperasi dari
                                rumah.Seperti perniagaan lain, KEMBARA bermula dari bawah dan kami ingin memacu perniagaan ini
                                ke tahap yang lebih tinggi bersama anda.<br><br>Dengan
                                azam dan matlamat yang jelas, kami ingin bangunkan 1 jenama produk makanan segera yang sihat,
                                cepat dan berteknologi tinggi supaya rakyat Malaysia boleh menikmati apabila mereka dalam
                                keadaan yang sukar untuk mendapatkan
                                makanan yang sihat & halal pada waktu yang singkat.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--desktop version-->
        <section class="about-us-section pb-100 hidden-xs">
            <div class="container ">
                <br>
                <br>
                <div class="row justify-content-between align-items-center ">
                    <div class="col-md-12 col-lg-6 ">
                        <div class="image-wrap ">
                            <img src="/assets2/image/3. Tanpa Ejen, KEMBARA bukanlah siapa-siapa.jpg " alt="video " class="img-fluid rounded ">
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 ">
                        <div class="video-promo-content mb-md-4 mb-lg-0 ">
                            <h4>Tanpa Ejen, KEMBARA bukanlah siapa-siapa</h4>
                            <p class="lead ">KEMBARA mulai dikenal ramai hasil Kerjasama HQ dan rangkaian ejen-ejen kami di seluruh Malaysia.KEMBARA tidak akan berada pada tahap sekarang, tanpa sokongan & Kerjasama yang tidak berbelah bahagi daripada ejen-ejen kami.Hasil
                                usaha dan kerja keras daripada HQ & rangkaian Ejen, jenama Kembara semakin berkembang dan seterusnya telah berjaya membantu ramai ejen menjana pendapatan sampingan yang lumayan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--mobile version-->
        <section class="about-us-section pb-100 visible-xs">
            <div class="container ">
                <br>
                <br>
                <div class="row justify-content-between align-items-center ">
                    <div class="col-md-12 col-lg-6 ">
                        <div class="image-wrap ">
                            <img src="/assets2/image/3. Tanpa Ejen, KEMBARA bukanlah siapa-siapa.jpg " alt="video "
                                 class="img-fluid rounded ">
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 ">
                        <div class="video-promo-content mb-md-4 mb-lg-0 ">
                            <h4>Tanpa Ejen, KEMBARA bukanlah siapa-siapa</h4>
                            <p class="lead ">KEMBARA mulai dikenal ramai hasil Kerjasama HQ dan rangkaian ejen-ejen kami di
                                seluruh Malaysia.KEMBARA tidak akan berada pada tahap sekarang, tanpa sokongan & Kerjasama yang
                                tidak berbelah bahagi daripada ejen-ejen kami.Hasil
                                usaha dan kerja keras daripada HQ & rangkaian Ejen, jenama Kembara semakin berkembang dan
                                seterusnya telah berjaya membantu ramai ejen menjana pendapatan sampingan yang lumayan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- second slider -->
        <!--desktop version-->
        <section class="testimonial-section ptb-10 hidden-xs">
            <div class="container ">
                <div class="row justify-content-center ">
                    <div class="col-md-9 col-lg-12 ">
                        <div class="section-heading mb-5 text-center ">
                            <br>
                            <h3>KETAHUI BAGAIMANA ANDA MAMPU JANA INCOME DI WAKTU <br>PANDEMIK DENGAN PRODUK RTE</h3>

                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-12 col-lg-12 ">
                        <div class="owl-carousel owl-theme client-testimonial custom-arrow custom-arrow-bottom-center mb-5 ">
                            <div class="item ">
                                <img src="/assets2/image/1011.jpg " alt="client " width="50 " class="img-fluid rounded " />
                            </div>
                            <div class="item ">
                                <img src="/assets2/image/1012.jpg " alt="client " width="50 " class="img-fluid rounded " />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--mobile version-->
        <section class="testimonial-section ptb-10 visible-xs">
            <div class="container ">
                <div class="row justify-content-center ">
                    <div class="col-md-9 col-lg-12 ">
                        <div class="section-heading mb-5 text-center ">
                            <br>
                            <h4>KETAHUI BAGAIMANA ANDA MAMPU JANA INCOME DI WAKTU PANDEMIK DENGAN PRODUK RTE</h4>

                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-12 col-lg-12 ">
                        <div class="owl-carousel owl-theme client-testimonial custom-arrow custom-arrow-bottom-center mb-5 ">
                            <div class="item ">
                                <img src="/assets2/image/1011.jpg " alt="client " width="50 " class="img-fluid rounded " />
                            </div>
                            <div class="item ">
                                <img src="/assets2/image/1012.jpg " alt="client " width="50 " class="img-fluid rounded " />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--services section start-->
        <section class="services-section ptb-100 gray-light-bg ">
            <div class="container ">
                <div class="row justify-content-center ">
                    <div class="col-md-8 ">
                        <div class="section-heading text-center mb-5 ">
                            <br>
                            <h3>Ini kelebihan menjadi ejen KEMBARA Meals</h3>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-lg-6 col-md-6 col-sm-6 ">
                        <div class="services-single d-flex p-5 my-md-3 my-lg-3 my-sm-0 shadow-sm white-bg rounded ">
                            <div class="service-icon mr-4 ">
                                <span class="ti-announcement icon-md color-secondary "></span>
                            </div>
                            <div class="services-content-wrap ">
                                <h5>Alat Sokongan Permasaran</h5>
                                <p class="mb-0 ">Hendak berniaga, faktor permasaran adalah antara <br>yang penting Jangan risau, KEMBARA Meals akan memberikan bahan-bahan permasaran yang efektif<br> dan dapat membantu anda membuat jualan.
                                </p>
                                <br>
                                <br>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 ">
                        <div class="services-single d-flex p-5 my-md-3 my-lg-3 my-sm-0 shadow-sm white-bg rounded ">
                            <div class="service-icon mr-4 ">
                                <span class="ti-light-bulb icon-md color-secondary "></span>
                            </div>
                            <div class="services-content-wrap ">
                                <h5>One-To-One class bersama Founder</h5>
                                <p class="mb-0 ">Dengan menjadi ejen KEMBARA Meals, anda akan<br>dijemput khas untuk kelas online direct bersama<br>Founder KEMBARA Meals,iaitu En Muhammad Faiz Zakariah yang membolehkan anda menimba ilmu dan menanyakan soalan/tips sebanyak
                                    yang boleh.</p>
                                <br>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 ">
                        <div class="services-single d-flex p-5 my-md-3 my-lg-3 my-sm-0 shadow-sm white-bg rounded ">
                            <div class="service-icon mr-4 ">
                                <span class="ti-headphone-alt icon-md color-secondary "></span>
                            </div>
                            <div class="services-content-wrap ">
                                <h5>Produk Mudah Jual</h5>
                                <p class="mb-0 ">KEMBARA Meals ada sebuah syariat yang mengeluarkan sebuah produk yang unik dan kurang persaingan di Malaysia. Dengan bimbingan kami, Insyallah impian anda untuk menjadi usahawan berjaya, boleh direalisasikan.</p>
                                <br>
                                <br>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 ">
                        <div class="services-single d-flex p-5 my-md-3 my-lg-3 my-sm-0 shadow-sm white-bg rounded ">
                            <div class="service-icon mr-4 ">
                                <span class="ti-bell icon-md color-secondary "></span>
                            </div>
                            <div class="services-content-wrap ">
                                <h5>Reward Menarik Menanti Yang Mencapai Target</h5>
                                <p class="mb-0 ">Bersama KEMBARA Meals, kami amat menghargai usaha anda dalam ingin menapai target jualan. Jadi, dengan itu, KEMBARA Meals akan menyediakan reward istimewa sebagai penghargaan kepada anda yang bekerja keras dan bersemangat
                                    membina empayar bersama kami. </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
        </section>
        <!--services section end-->

        <!--promo section start-->
        <!--desktop version-->
        <section class="promo-section gradient-bg ptb-100 hidden-xs">
            <div class="container ">
                <div class="row justify-content-around align-items-center ">
                    <div class="col-md-7 ">
                        <div class="subscribe-content ">
                            <br>
                            <br>
                            <br>
                            <h4 class="app-business-content text-center text-white ">Peluang tidak akan datang dua kali.<br>Rebut peluang ini sekarang</h4>

                            <br>
                            <br>
                            <br>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="action-btn text-lg-right text-sm-left ">
                            <a href="#daftar-sekarang" class="btn secondary-solid-btn ">Saya mahu jana pendapatan bersama <br>kembara Meals</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--promo section end-->
        <!--mobile version-->
        <section class="promo-section gradient-bg ptb-100 visible-xs ">
            <div class="container ">
                <div class="row justify-content-around align-items-center ">
                    <div class="col-md-7 ">
                        <div class="subscribe-content ">

                            <h4 class="app-business-content text-center text-white ">Peluang tidak akan datang dua
                                kali.Rebut peluang ini sekarang</h4>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="action-btn text-lg-right text-sm-left ">
                            <a href="#daftar-sekarang" class="btn secondary-solid-btn ">Saya mahu jana pendapatan bersama kembara
                                Meals</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--promo section end-->
        <!--our pricing section start-->
        <section class="pricing-section ptb-100 gray-light-bg ">
            <div class="container ">
                <div class="row justify-content-center ">
                    <div class="col-md-8 ">
                        <br>
                        <br>
                        <div class="section-heading text-center mb-5 ">
                            <h2>Daftar Sebagai Ejen KEMBARA Meals</h2>
                            <p CLASS="lead ">Setiap ejen KEMBARA Meals yang baru mendaftar, perlu membuat pembelian pertama Pakej Usahawan KEMBARA yang merangkumi produk-produk berikut:</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center ">
                    <div class="col-lg-4 col-md ">
                        <div class="card text-center single-pricing-pack ">
                            <div class="pt-4 ">
                                <h5>Pakej A</h5>
                            </div>
                            <div class="card-header py-4 border-0 pricing-header ">
                                <div class="h1 text-center mb-0 ">RM<span class="price font-weight-bolder ">447</span></div>
                            </div>
                            <div class="pricing-img mt-4 ">
                                <img src="/assets2/img/basic.svg " alt="pricing img " class="img-fluid ">
                            </div>
                            <div class="card-body ">
                                <ul class="list-unstyled text-sm mb-4 pricing-feature-list ">
                                    <li>10 Pek Beef Rendang With Pilaf Rice</li>
                                    <li>10 Pek Nasi Lemak With Chicken Rendang</li>
                                    <li>10 Pek Chicken Masak Merah With Tomato Rice</li>
                                    <br>
                                </ul>
                                <a href="#daftar-sekarang" class="btn secondary-solid-btn mb-3 ">Daftar Sekarang</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md ">
                        <div class="card popular-price text-center single-pricing-pack ">
                            <div class="pt-4 ">
                                <h5>Pakej B</h5>
                            </div>
                            <div class="card-header py-4 border-0 pricing-header ">
                                <div class="h1 text-center mb-0 ">RM<span class="price font-weight-bolder ">626</span></div>
                            </div>
                            <div class="pricing-img mt-4 ">
                                <img src="/assets2/img/standard.svg " alt="pricing img " class="img-fluid ">
                            </div>
                            <div class="card-body ">
                                <ul class="list-unstyled text-sm mb-4 pricing-feature-list ">
                                    <li>10 Pek Beef Rendang With Pilaf Rice</li>
                                    <li>10 Pek Nasi Lemak With Chicken Rendang</li>
                                    <li>10 Pek Chicken Masak Merah With Tomato Rice</li>
                                    <li>10 Pek Lamb Kuzi With Hujan Panas Rice</li>
                                </ul>
                                <a href="#daftar-sekarang" class="btn secondary-solid-btn mb-3 " >Daftar Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--team two section start-->
        <section class="team-two-section ptb-100 ">
            <div class="container ">
                <div class="row justify-content-center ">
                    <div class="col-md-8 col-lg-8 ">
                        <br>
                        <br>
                        <div class="section-heading text-center mb-5 ">
                            <h2>Kisah Disebalik Kejayaan Usahawan Bimbingan Kembara Meals</h2>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-3 ">
                        <div class="staff-member ">
                            <div class="card gray-light-bg text-center border-0 ">
                                <img src="/assets2/image/FAIQ.jpg " alt="team image " class="card-img-top ">
                                <div class="card-body ">
                                    <h5 class="teacher mb-0 ">FAIQ</h5>
                                    <span>Agent Shah Alam</span>
                                </div>
                            </div>
                            <div class="overlay d-flex align-items-center justify-content-center ">
                                <div class="overlay-inner ">
                                    <p class="teacher-quote ">saya bermula dengan 3 kotak pada tahun 2018, tapi Alhamdulillah kini setiap bulan saya berjaya menjual beratus kotak
                                        hasil sokongan dari HQ. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 ">
                        <div class="staff-member ">
                            <div class="card gray-light-bg text-center border-0 ">
                                <img src="/assets2/image/FIRDAUS.jpg " alt="team image " class="card-img-top ">
                                <div class="card-body ">
                                    <h5 class="teacher mb-0 ">FIRDAUS</h5>
                                    <span>Agent Melaka</span>
                                </div>
                            </div>
                            <div class="overlay d-flex align-items-center justify-content-center ">
                                <div class="overlay-inner ">
                                    <p class="teacher-quote ">Dulu saya ingatkan sales saya sampai takat 3 angka ja, tapi hasil ilmu dan bimbingan dari HQ saya mampu meroket dan
                                        mempunyai team sendiri yang semakin berkembang.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 ">
                        <div class="staff-member ">
                            <div class="card gray-light-bg text-center border-0 ">
                                <img src="/assets2/image/NORHANA.jpg " alt="team image " class="img-fluid ">
                                <div class="card-body ">
                                    <h5 class="teacher mb-0 ">NORHANA</h5>
                                    <span>Agent Kota Bharu</span>
                                </div>
                            </div>
                            <div class="overlay d-flex align-items-center justify-content-center ">
                                <div class="overlay-inner ">
                                    <p class="teacher-quote ">Pada awalnya nak cuba menjual sahaja sebab saya suka produk Kembara ni, tapi siapa sangka kini saya boleh menjana
                                        pendapatan sehingga 4 angka sebulan.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 ">
                        <div class="staff-member ">
                            <div class="card gray-light-bg text-center border-0 ">
                                <img src="/assets2/image/SHAFIQAH.jpg " alt="team image " class="card-img-top ">
                                <div class="card-body ">
                                    <h5 class="teacher mb-0 ">SHAFIQAH</h5>
                                    <span>Agent Ampang</span>
                                </div>
                            </div>
                            <div class="overlay d-flex align-items-center justify-content-center ">
                                <div class="overlay-inner ">
                                    <p class="teacher-quote ">Di atas permintaan yang tinggi, Alhamdulillah saya berjaya menjadi top agent 2019 dan insyaAllah akan ditaja untuk
                                        menunaikan umrah sebagai reward atas pencapaian saya. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
        </section>
        <!--team two section end-->

        <!--desktop version-->
        <section class="promo-section gradient-bg ptb-100 hidden-xs">
            <div class="container ">
                <div class="row justify-content-around align-items-center ">
                    <div class="col-md-7 ">
                        <div class="subscribe-content ">
                            <br>
                            <br>
                            <h4 class="app-business-content text-center text-white ">JAMINAN REFUND 100% KEPADA EJEN<br>YANG BARU BERMULA</h4>
                            <p class="app-business-content text-center text-white ">KEMBARA memberi jaminan kepada ejen-ejen yang baru<br>bermula untuk refund 100% sekiranya stock yang dibeli pertama<br>kali tidak terjual,3 bulan sebelum tarikh luput produk.</p>
                            <br>
                            <br>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="action-btn text-lg-right text-sm-left ">
                            <a href="#daftar-sekarang" class="btn secondary-solid-btn ">Saya mahu jana pendapatan bersama <br>kembara Meals</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--mobile version-->
        <section class="promo-section gradient-bg ptb-100 visible-xs">
            <div class="container ">
                <div class="row justify-content-around align-items-center ">
                    <div class="col-md-7 ">
                        <div class="subscribe-content ">
                            <br>
                            <br>
                            <h4 class="app-business-content text-center text-white ">JAMINAN REFUND 100% KEPADA EJEN YANG
                                BARU BERMULA</h4>
                            <p class="app-business-content text-center text-white ">KEMBARA memberi jaminan kepada ejen-ejen
                                yang baru bermula untuk refund 100% sekiranya stock yang dibeli pertama kali tidak
                                terjual,3 bulan sebelum tarikh luput produk.</p>
                            <br>
                            <br>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="action-btn text-lg-right text-sm-left ">
                            <a href="#daftar-sekarang" class="btn secondary-solid-btn ">Saya mahu jana pendapatan bersama kembara
                                Meals</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--desktop version-->
        <section class="our-portfolio-section ptb-100 hidden-xs">
            <div class="container ">
                <div class="row justify-content-center ">
                    <div class="col-lg-8 ">
                        <div class="section-heading text-center mb-5 ">
                            <br>
                            <h3>Kenapa Tunggu Lagi?<br> Rebutlah peluang keemasan ini dengan<br> sertai ejen KEMBARA Meals Sekarang!</h3>
                            <p class="lead ">Langkah pertam untuk menggapai impian? Isi borang pendaftaran ini dahulu dan <br>team KEMBARA Meals akan bantu anda ke peringkat seterusnya.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--mobile version-->
        <section class="our-portfolio-section ptb-100 visible-xs">
            <div class="container ">
                <div class="row justify-content-center ">
                    <div class="col-lg-8 ">
                        <div class="section-heading text-center mb-5 ">
                            <br>
                            <h3>Kenapa Tunggu Lagi? Rebutlah peluang keemasan ini dengan sertai ejen KEMBARA Meals
                                Sekarang!</h3>
                            <p class="lead ">Langkah pertam untuk menggapai impian? Isi borang pendaftaran ini dahulu dan
                                <br>team KEMBARA Meals akan bantu anda ke peringkat seterusnya.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="daftar-sekarang" class="our-portfolio-section ptb-100 ">
            <div class="container ">
                <div class="row justify-content-center ">
                    <div class="col-md-5 col-lg-8 ">
                        <div class="card login-signup-card shadow-lg mb-0 ">
                            <div class="card-body px-md-5 py-5 ">
                                <div class="section-heading text-center mb-5 ">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            @if($user->avatar)
                                                <img src="{{asset('storage/ProfilePicture/'.$user->avatar)}}" width="150" height="150" class="img-fluid shadow-sm mr-3 " />
                                            @endif
                                            @if(!$user->avatar)
                                                <i style="font-size: 100px" class="far fa-user-circle"></i>
                                            @endif
                                        </div>
                                        <div class="col-lg-9 ">
                                            <div class="d-flex ">
                                                <table style="margin-top: 10px" width="100%">
                                                    <tr>
                                                        <td width="30%"></td>
                                                        <td width="1%"></td>
                                                        <td width="69%"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: left">Leader</td>
                                                        <td>:</td>
                                                        <td><span class="text-primary">{{$user->name}} </span></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: left">Level</td>
                                                        <td>:</td>
                                                        <td><span class="text-primary">{{$agent_levels->name}}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: left">Membership</td>
                                                        <td>:</td>
                                                        <td><span class="text-primary">KM{{str_pad($leader->member_no, 5, '0', STR_PAD_LEFT)}}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: left">Phone</td>
                                                        <td>:</td>
                                                        <td><span class="text-primary">{{$user->phone_no}} </span></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form class="login-signup-form " method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group ">
                                        <div class="input-group input-group-merge ">
                                            <div class="input-icon ">
                                                <span class="color-primary "></span>
                                            </div>
                                            <select class="form-control   @error('name') is-invalid @enderror" name="level" required>
                                                @foreach($list_levels as $list_level)
                                                    <option value="{{$list_level->id}}">{{$list_level->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('level')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="input-group input-group-merge ">
                                            <div class="input-icon ">
                                                <span class="color-primary "></span>
                                            </div>
                                            <input class="form-control  @error('name') is-invalid @enderror" type="text" placeholder="Fullname" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus/>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="input-group input-group-merge ">
                                            <div class="input-icon ">
                                                <span class="color-primary "></span>
                                            </div>
                                            <input id="nric" type="text" class="form-control @error('nric') is-invalid @enderror"
                                                   name="nric" value="{{ old('nric') }}" required autocomplete="nric" autofocus placeholder="NRIC">
                                            @error('nric')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="input-group input-group-merge ">
                                            <div class="input-icon ">
                                                <span class="color-primary "></span>
                                            </div>
                                            <div class="input-group-prepend"><span class="input-group-text">+6</span></div>
                                            <input id="phone_no" type="tel"
                                                   class="form-control @error('phone_no') is-invalid @enderror" name="phone_no"
                                                   value="{{ old('phone_no') }}" required autocomplete="phone" maxlength="11" placeholder="Phone No (0123456789)"/>

                                            @error('phone_no')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="input-group input-group-merge ">
                                            <div class="input-icon ">
                                                <span class="color-primary "></span>
                                            </div>
                                            <input class="form-control  @error('email') is-invalid @enderror" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" />
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="input-group input-group-merge ">
                                            <div class="input-icon ">
                                                <span class="color-primary "></span>
                                            </div>
                                            <input id="facebook" type="text" class="form-control @error('facebook') is-invalid @enderror"
                                                   name="facebook" value="{{ old('facebook') }}" autocomplete="facebook" placeholder="Facebook URL(Optional)">

                                            @error('facebook')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="input-group input-group-merge ">
                                            <div class="input-icon ">
                                                <span class="color-primary "></span>
                                            </div>
                                            <input id="instagram" type="text" class="form-control @error('instagram') is-invalid @enderror"
                                                   name="instagram" value="{{ old('instagram') }}" autocomplete="instagram"  placeholder="Instagram URL(Optional)">

                                            @error('instagram')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="input-group input-group-merge ">
                                            <div class="input-icon ">
                                                <span class="color-primary "></span>
                                            </div>
                                            <input id="shopee" type="text" class="form-control @error('shopee') is-invalid @enderror"
                                                   name="shopee" value="{{ old('shopee') }}" autocomplete="shopee"  placeholder="Shopee URL(Optional)">

                                            @error('shopee')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="input-group input-group-merge ">
                                            <div class="input-icon ">
                                                <span class="color-primary "></span>
                                            </div>
                                            <input id="lazada" type="text" class="form-control @error('lazada') is-invalid @enderror"
                                                   name="lazada" value="{{ old('lazada') }}" autocomplete="lazada"  placeholder="Lazada URL(Optional)">

                                            @error('lazada')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="input-group input-group-merge ">
                                            <div class="input-icon ">
                                                <span class="color-primary "></span>
                                            </div>
                                            <input id="company_name" type="company_name"
                                                   class="form-control @error('company_name') is-invalid @enderror" name="company_name"
                                                   value="{{ old('company_name') }}" autocomplete="company_name" placeholder="Company Name(Optional)">

                                            @error('company_name')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="input-group input-group-merge ">
                                            <div class="input-icon ">
                                                <span class="color-primary "></span>
                                            </div>
                                            <input id="ssm" type="ssm" class="form-control @error('ssm') is-invalid @enderror" name="ssm"
                                                   value="{{ old('ssm') }}" autocomplete="ssm"  placeholder="SSM(Optional)">

                                            @error('ssm')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="input-group input-group-merge ">
                                            <div class="input-icon ">
                                                <span class="color-primary "></span>
                                            </div>
                                            <input id="address_1" type="text" class="form-control @error('address_1') is-invalid @enderror"
                                                   name="address_1" value="{{ old('address_1') }}" required autocomplete="address" autofocus  placeholder="Address">

                                            @error('address_1')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="input-group input-group-merge ">
                                            <div class="input-icon ">
                                                <span class="color-primary "></span>
                                            </div>
                                            <input id="city" type="text" class="form-control @error('city') is-invalid @enderror"
                                                   name="city" value="{{ old('city') }}" required autocomplete="city" autofocus  placeholder="City">

                                            @error('city')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div id="app">
                                            <state-territory-component></state-territory-component>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="input-group input-group-merge ">
                                            <div class="input-icon ">
                                                <span class="color-primary "></span>
                                            </div>
                                            <input id="postcode" type="text" class="form-control @error('postcode') is-invalid @enderror"
                                                   name="postcode" value="{{ old('postcode') }}" required autocomplete="postcode" autofocus  placeholder="Postcode">

                                            @error('postcode')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="input-group input-group-merge ">
                                            <div class="input-icon ">
                                                <span class="color-primary "></span>
                                            </div>
{{--                                            <input id="country" type="text" class="form-control @error('country') is-invalid @enderror"--}}
{{--                                                   name="country" value="{{ old('country') }}" required autocomplete="country" autofocus  placeholder="Country">--}}

                                            <select class="form-control" style="width:100%" id="update-select-country" name="country" required>
                                                <option value="Malaysia">Malaysia</option>
                                            </select>
                                            @error('country')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="input-group input-group-merge ">
                                            <div class="input-icon ">
                                                <span class="color-primary "></span>
                                            </div>
                                            <input class="form-control  @error('password') is-invalid @enderror" type="password" placeholder="Password"  name="password" required autocomplete="new-password" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="input-group input-group-merge ">
                                            <div class="input-icon ">
                                                <span class="color-primary "></span>
                                            </div>
                                            <input class="form-control" type="password" placeholder="Confirm Password" name="password_confirmation" />
                                            <input type="hidden" name="leader" value="{{$user->id}}">
                                            <input type="hidden" name="leader_level" value="{{$agent_levels->id}}">
                                            {{--<input type="hidden" name="territory" value="{{$leader->territory_id}}">--}}
                                            {{--<input type="hidden" name="state" value="{{$leader->state_id}}">--}}

                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-block secondary-solid-btn border-radius mt-4 mb-3 ">
                                        Daftar
                                    </button>
                                </form>

                            </div>
                            <div class="card-footer px-md-5 bg-transparent border-top "><small>By registering you agree to the Kembara</small>
                                <a href="# " class="small ">Term of Use</a></div>
                        </div>
                    </div> </div>
            </div>
        </section>

        <!--desktop version-->
        <section class="our-portfolio-section ptb-100 hidden-xs">
            <div class="container ">
                <div class="row justify-content-center ">
                    <div class="col-lg-8 ">
                        <div class="section-heading text-center mb-5 ">
                            <br>
                            <br>
                            <br>
                            <h3>SOALAN LAZIM</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--mobile version-->
        <section class="our-portfolio-section ptb-100 visible-xs">
            <div class="container ">
                <div class="row justify-content-center ">
                    <div class="col-lg-8 ">
                        <div class="section-heading text-center mb-5 ">
                            <h3>SOALAN LAZIM</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--promo section start-->
        <section class="promo-section ptb-100">
            <div class="container">

                <!--pricing faq start-->
                <div class="row">
                    <div class="col-lg-6">
                        <div id="accordion-1" class="accordion accordion-faq">
                            <!-- Accordion card 1 -->
                            <div class="card">
                                <div class="card-header py-4" id="heading-1-1" data-toggle="collapse" role="button" data-target="#collapse-1-1" aria-expanded="false" aria-controls="collapse-1-1">
                                    <h6 class="mb-0"><span class="ti-receipt mr-3"></span> Bagaimana produk makanan KEMBARA Meals mampu bertahan sehingga 2 tahun?</h6>
                                </div>
                                <div id="collapse-1-1" class="collapse" aria-labelledby="heading-1-1" data-parent="#accordion-1">
                                    <div class="card-body">
                                        <p>Produk KEMBARA mampu bertahan selama 2 tahun dan tidak perlu di simpan di dalam peti sejuk. Ini kerana, setiap pek
                                            makanan telah di Steril pada suhu dan tekanan yang tinggi, sehingga menyababkan Microb mati dan tidak lagi mampu membiak
                                            dan merosakkan makanan. Dengan Teknologi ini, kini kitab oleh menikmati makanan segera yang lebih sihat tanpa bahan
                                            pengawet tambahan.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Accordion card 2 -->
                            <div class="card">
                                <div class="card-header py-4" id="heading-1-2" data-toggle="collapse" role="button" data-target="#collapse-1-2" aria-expanded="false" aria-controls="collapse-1-2">
                                    <h6 class="mb-0"><span class="ti-receipt mr-3"></span> Sekiranya stok yang saya beli pertama kali tidak terjual, adakah saya akan mendapat refund?</h6>
                                </div>
                                <div id="collapse-1-2" class="collapse" aria-labelledby="heading-1-2" data-parent="#accordion-1">
                                    <div class="card-body">
                                        <p>Sekiranya stok yang dibeli buat pertama kali tidak terjual, HQ memberi jaminan untuk memulangkan wang dengan syarat stok
                                            mesti diberikan 3 bulan sebelum expired.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div id="accordion-2" class="accordion accordion-faq">
                            <!-- Accordion card 1 -->
                            <div class="card">
                                <div class="card-header py-4" id="heading-2-1" data-toggle="collapse" role="button" data-target="#collapse-2-1" aria-expanded="false" aria-controls="collapse-2-1">
                                    <h6 class="mb-0"><span class="ti-receipt mr-3"></span> Apakah syarat utama?</h6><br>
                                </div>
                                <div id="collapse-2-1" class="collapse" aria-labelledby="heading-2-1" data-parent="#accordion-2">
                                    <div class="card-body">
                                        <p>1. Komitmen, 2. Komitmen, 3. Komitmen</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Accordion card 2 -->
                            <div class="card">
                                <div class="card-header py-4" id="heading-2-2" data-toggle="collapse" role="button" data-target="#collapse-2-2" aria-expanded="false" aria-controls="collapse-2-2">
                                    <h6 class="mb-0"><span class="ti-receipt mr-3"></span> Jika ada pertanyaan, siapakah saya harus hubungi?</h6><br>
                                </div>
                                <div id="collapse-2-2" class="collapse" aria-labelledby="heading-2-2" data-parent="#accordion-2">
                                    <div class="card-body">
                                        <p>Sebarang pertanyaan lanjut boleh hubungi di talian +6019-868-6297</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--pricing faq end-->
            </div>
        </section>
        <!--promo section end-->
        <br>
        <br>
        <!--call to action section start-->
        <section class="call-to-action py-5 gray-light-bg ">
            <div class="container ">
                <div class="row justify-content-around align-items-center ">
                    <div class="col-md-7 ">
                        <div class="subscribe-content ">
                            <h3 class="mb-1 ">Anda Adalah Bakal Usahawan Yang Akan Kami Bimbing </h3>

                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="action-btn text-lg-right text-sm-left ">
                            <a href="#daftar-sekarang" class="btn secondary-solid-btn ">Saya Nak Sertai KEMBARA Meals</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--call to action section end-->



    </div>
    <!--body content wrap end-->

    <!--footer section start-->
    <footer class="footer-section ">
        <!--footer top start-->
        <div class="footer-top gradient-bg ">
            <div class="container ">
                <div class="row align-items-center justify-content-between ">
                    <div class="col-md-5 col-lg-5 ">
                        <p class="text-white ">Copyrights © 2020. Kembara Meals All Right Reserved
                    </div>
                </div>
            </div>
        </div>
        <!--footer top end-->

    </footer>
    <!--footer section end-->

    <!--bottom to top button start-->
    <button class="scroll-top scroll-to-target " data-target="html ">
        <span class="ti-angle-up "></span>
    </button>

@endsection

@extends('layouts.front_app')
@section('title', 'Beranda')
@section('style')
<link href="{{asset('/front/css/testimonial/testimonial1-10.css')}}" rel="stylesheet">
<style>
    .wrap-feature5-box .card-body {
        padding: 30px;
    }

    .wrap-feature5-box .card-body .icon-space {
        padding: 0px 30px 20px 0px;
        font-size: 45px;
        margin: 0px;
    }

    .wrap-feature5-box .card-body p {
        margin-bottom: 0px;
    }
</style>
@endsection
@section('content')
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Slider  -->
    <!-- ============================================================== -->
    <div class="bg-light">
        <section id="slider-sec" class="slider2">
            <div id="slider2" class="carousel bs-slider slide  control-round indicators-line" data-ride="carousel"
                data-pause="hover" data-interval="7000">
                <ol class="carousel-indicators hide">
                    <li data-target="#slider2" data-slide-to="0" class="active"></li>
                    <li data-target="#slider2" data-slide-to="1"></li>
                    <li data-target="#slider2" data-slide-to="2"></li>
                </ol>
                <!-- Wrapper For Slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <!-- Slide Background --><img src="{{asset('front/images/slider/slide1.jpg')}}"
                            alt="We are Digital Agency" class="slide-image" />
                        <!-- Slide Text Layer -->
                        <div class="slide-text slide_style_left">
                            <div class="col-sm-12">
                                <div class="row m-0 form-data">
                                    <div class="col-md-9 col-lg-9 p-10">
                                        <h2 data-animation="animated zoomInRight" class="title text-white">
                                            Selamat
                                            Datang di CoST</h2>
                                    </div>
                                    <div class="col-md-9 col-lg-9 p-10">
                                        <p data-animation="animated fadeInLeft"
                                            class="m-t-40 m-b-40 hidden-sm-down text-white op-8">We offer
                                            services
                                            in various jonar of Accounting. Let us take your all worry
                                            regarding
                                            your daily accounting and take rest.</p>
                                    </div>
                                    <div class="col-5 col-sm-9 col-lg-6 p-10">
                                        <input type="text" name="search"
                                            placeholder="Silahkan ketik disini untuk mencari data"
                                            class="bg-white font-14 p-l-20 form-control b-0" />
                                    </div>
                                    <div class="col-3 col-sm-9 col-lg-4 p-10">
                                        <select name="" id="" aria-placeholder="Entitas" class="form-control">
                                            <option value="">Entitas I</option>
                                            <option value="">Entitas I</option>
                                            <option value="">Entitas I</option>
                                            <option value="">Entitas I</option>
                                        </select>
                                    </div>
                                    <div class="col-4 col-sm-3 col-lg-2 p-10 text-center">
                                        <button class="bg-danger-gradiant b-0 text-white font-14 form-control"><i
                                                class="ti-search m-r-10"></i>Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Slide -->
                    <!-- Second Slide -->
                    <div class="carousel-item">
                        <!-- Slide Background -->
                        <video width="100%" autoplay loop>
                            <source src="front/images/slider/welding.mp4" type="video/mp4"> Your browser
                            does not support HTML5 video.
                        </video>
                        <div class="bs-slider-overlay"></div>
                        <!-- Slide Text Layer -->
                        <div class="slide-text">
                            <div class="col-md-9 col-lg-6">
                                <h2 data-animation="animated flipInX" class="title text-white">Machinery and
                                    Hardware Company.</h2>
                            </div>
                            <div class="col-md-8 col-lg-5">
                                <p data-animation="animated lightSpeedIn" class="m-t-40 m-b-40 hidden-sm-down">We offer
                                    services in various jonar
                                    of Accounting. Let us take your all worry regarding your daily
                                    accounting and take rest.</p>
                            </div>
                            <div class="col-sm-12 btn-pad">
                                <a class="btn btn-info-gradiant btn-md btn-arrow" data-animation="animated fadeInUp"
                                    data-toggle="collapse" href="#">
                                    <span>Ask for Question <i class="ti-arrow-right"></i></span> </a>
                            </div>
                        </div>
                    </div>
                    <!-- End of Slide -->
                    <!-- Third Slide -->
                    <div class="carousel-item">
                        <!-- Slide Background --><img src="{{asset('front/images/slider/slide2.jpg')}}"
                            alt="Building Magical Apps" class="slide-image" />
                        <!-- Slide Text Layer -->
                        <div class="slide-text">
                            <div class="col-md-9 col-lg-6">
                                <h2 data-animation="animated flipInX" class="title text-white">Machinery and
                                    Hardware Company, which makes Quality Products</h2>
                            </div>
                            <div class="col-md-8 col-lg-5">
                                <p data-animation="animated lightSpeedIn" class="m-t-40 m-b-40 hidden-sm-down">We offer
                                    services in various jonar
                                    of Accounting. Let us take your all worry regarding your daily
                                    accounting and take rest.</p>
                            </div>
                            <div class="col-sm-12 btn-pad">
                                <a class="btn btn-info-gradiant btn-md btn-arrow" data-animation="animated fadeInUp"
                                    data-toggle="collapse" href="#">
                                    <span>Ask for Question <i class="ti-arrow-right"></i></span> </a>
                            </div>
                        </div>
                    </div>
                    <!-- End of Slide -->
                    <!-- End of Wrapper For Slides -->
                    <!-- Slider Control -->
                    <div class="slider-control">
                        <!-- Left Control -->
                        <a class="left carousel-control-prev text-white font-14" href="#slider2" role="button"
                            data-slide="prev"> <span class="ti-arrow-left" aria-hidden="true"></span> <b
                                class="sr-only font-normal">Previous</b> </a>
                        <!-- Right Control -->
                        <a class="right carousel-control-next text-white font-14" href="#slider2" role="button"
                            data-slide="next"> <span class="ti-arrow-right" aria-hidden="true"></span> <b
                                class="sr-only font-normal">Next</b> </a>
                    </div>
                    <!-- End of Slider Control -->
                </div>
            </div>
            <!-- End Slider -->
            <!-- Slider Modal -->
            <div class="modal bd-example-modal-lg fade" id="video" tabindex="-1" role="dialog"
                aria-labelledby="modalTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitle">Your Video Title Here</h5>
                            <button type="button" class="close font-20" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="ti-close"></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <video width="100%" controls>
                                <source src="front/images/slider/welding.mp4" type="video/mp4"> Your browser
                                does not support HTML5 video.
                            </video>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Slider Modal -->
        </section>
    </div>
</div>
<!-- ============================================================== -->
<!-- Testimonial 3  -->
<!-- ============================================================== -->
<div class="testimonial3 spacer bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 text-center">
                <h2 class="title">Entitas yang Tersedia</h2>
                <h6 class="subtitle">Data entitas yang terdapat pada Dinas Perhubungan Kab. Lombok Barat. <a
                        href="">Klik tab untuk
                        melihat detail.</a> </h6>
            </div>
        </div>
        <!-- Row  -->
        <div class="owl-carousel owl-theme testi3 m-t-40">
            <!-- item -->
            <div class="item" data-aos="fade-up">
                <div class="card card-shadow">
                    <div class="card-body">

                        <div class="d-flex no-block align-items-center">
                            <span class="thumb-img"><i class="fa fa-road fa-2x"></i></span>
                            <div class="m-l-20">
                                <h6 class="m-b-0 customer">Jalan </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- item -->
            <!-- item -->
            <div class="item" data-aos="fade-up">
                <div class="card card-shadow">
                    <div class="card-body">

                        <div class="d-flex no-block align-items-center">
                            <span class="thumb-img"><i class="fa fa-plane fa-2x"></i></span>
                            <div class="m-l-20">
                                <h6 class="m-b-0 customer">Bandara</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- item -->
            <!-- item -->
            <div class="item" data-aos="fade-left">
                <div class="card card-shadow">
                    <div class="card-body">
                        <div class="d-flex no-block align-items-center">
                            <span class="thumb-img"><i class="fa fa-ship fa-2x"></i></span>
                            <div class="m-l-20">
                                <h6 class="m-b-0 customer">Pelabuhan</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- item -->
            <!-- item -->
            <div class="item">
                <div class="card card-shadow">
                    <div class="card-body">
                        <div class="d-flex no-block align-items-center">
                            <span class="thumb-img"><i class="fa fa-diamond fa-2x"></i></span>
                            <div class="m-l-20">
                                <h6 class="m-b-0 customer">Tambang</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- item -->
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Testimonial 3  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- End Feature 8  -->
<!-- ============================================================== -->
<div class="spacer feature8">
    <div class="container">
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-6">
                <h2 class="font-bold">Entitas dan Projek</h2>
                <p>Data jumlah entitas, client, dan proyek yang dikerjakan oleh Dinas Perhubungan Kab. Lombok Barat</p>
                <ul class="list-block m-b-30">
                    <li>
                        <div class="col-lg-12 col-md-12">
                            <div class="d-flex no-block">
                                <div class="display-5"><i class="icon-Eyeglasses-Smiley text-danger"></i></div>
                                <div class="m-l-20">
                                    <h1 class="font-light counter m-b-0">2625</h1>
                                    <h6 class="text-muted font-13 text-uppercase">Jumlah Entitas di Lombok Barat</h6>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="col-lg-12 col-md-12">
                            <div class="d-flex no-block">
                                <div class="display-5"><i class="icon-Business-ManWoman text-danger"></i></div>
                                <div class="m-l-20">
                                    <h1 class="font-light counter m-b-0">105</h1>
                                    <h6 class="text-muted font-13 text-uppercase">Jumlah Client</h6>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="col-lg-12 col-md-12">
                            <div class="d-flex no-block">
                                <div class="display-5"><i class="icon-Coffee text-danger"></i></div>
                                <div class="m-l-20">
                                    <h1 class="font-light counter m-b-0">105</h1>
                                    <h6 class="text-muted font-13 text-uppercase">Jumlah Proyek</h6>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- Column -->
            <div class="col-lg-6">
                <div class="p-20">
                    <img src="{{asset('front/images/features/8.jpg')}}" alt="wrapkit" class="img-responsive img-shadow"
                        data-aos="flip-right" data-aos-duration="1200" />
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- Row -->
    </div>
</div>
<!-- ============================================================== -->
<!-- End Feature 8  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Projects  -->
<!-- ============================================================== -->
<div class="spacer feature2 bg-dark" id="work">
    <div class="container">
        <!-- Row  -->
        <div class="row justify-content-center">
            <div class="col-md-7 text-center">
                <h2 class="title text-white font-bold">Proyek Terbaru</h2>
                <h6 class="subtitle">Proyek terbaru yang tengah maupun telah dikerjakan oleh Dinas Perhubungan Kab.
                    Lombok Barat</h6>
            </div>
        </div>
        <!-- Row  -->
        <div class="row m-t-40 popup-gallery">
            <!-- Column -->
            <div class="col-md-4">
                <div class="card" data-aos="flip-left" data-aos-duration="1200">
                    <a href="{{asset('front/images/project/1.jpg')}}" class="img-ho" title="Bridge at NY Central"><img
                            class="card-img-top" src="{{asset('front/images/project/1.jpg')}}"
                            alt="wrappixel kit" /></a>
                    <div class="bg-dark">
                        <p class="m-b-0 font-16 m-t-20 subtitle">Bridge at NY Central</p>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-4">
                <div class="card" data-aos="flip-up" data-aos-duration="1200">
                    <a href="{{asset('front/images/project/2.jpg')}}" class="img-ho" title="Pine Tree Building"><img
                            class="card-img-top" src="{{asset('front/images/project/2.jpg')}}"
                            alt="wrappixel kit" /></a>
                    <div class="bg-dark">
                        <p class="m-b-0 font-16 m-t-20 subtitle">Pine Tree Building</p>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-4">
                <div class="card" data-aos="flip-right" data-aos-duration="1200">
                    <a href="{{asset('front/images/project/3.jpg')}}" class="img-ho"
                        title="Rodger and Sons Factory"><img class="card-img-top"
                            src="{{asset('front/images/project/3.jpg')}}" alt="wrappixel kit" /></a>
                    <div class="bg-dark">
                        <p class="m-b-0 font-16 m-t-20 subtitle">Rodger and Sons Factory</p>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-4">
                <div class="card" data-aos="flip-left" data-aos-duration="1200">
                    <a href="{{asset('front/images/project/4.jpg')}}" class="img-ho" title="Largest Construction"><img
                            class="card-img-top" src="{{asset('front/images/project/4.jpg')}}"
                            alt="wrappixel kit" /></a>
                    <div class="bg-dark">
                        <p class="m-b-0 font-16 m-t-20 subtitle">Largest Construction</p>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-4">
                <div class="card" data-aos="flip-up" data-aos-duration="1200">
                    <a href="{{asset('front/images/project/5.jpg')}}" class="img-ho" title="Mechanical Work"><img
                            class="card-img-top" src="{{asset('front/images/project/5.jpg')}}"
                            alt="wrappixel kit" /></a>
                    <div class="bg-dark">
                        <p class="m-b-0 font-16 m-t-20 subtitle">Mechanical Work</p>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-4">
                <div class="card" data-aos="flip-right" data-aos-duration="1200">
                    <a href="{{asset('front/images/project/6.jpg')}}" class="img-ho" title="Power & Energy Project"><img
                            class="card-img-top" src="{{asset('front/images/project/6.jpg')}}"
                            alt="wrappixel kit" /></a>
                    <div class="bg-dark">
                        <p class="m-b-0 font-16 m-t-20 subtitle">Power & Energy Project</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Projects -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- call to action -->
<!-- ============================================================== -->
<div class="mini-spacer bg-yellow text-white">
    <div class="container">
        <div class="d-flex">
            <div class="display-7 align-self-center">
                <h3 class="">We are leading Manufacturing and Exporting company</h3>
                <h6 class="font-16">You will feel great using our quality products and services</h6>
            </div>
            <div class="ml-auto m-t-10 m-b-10">
                <button class="btn btn-info-gradiant btn-md">Contact Us</button>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- call to action -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
@endsection
@section('script')
<script src="{{asset('/front/assets/node_modules/owl.carousel/dist/owl.carousel.min.js')}}"></script>
<script src="{{asset('/front/js/testimonial/testimonial.js')}}"></script>
@endsection
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('front/images/favicon.png')}}">
    <title>CoST - @yield('title')</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('/front/assets/node_modules/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- This is for the animation CSS -->
    <link href="{{asset('/front/assets/node_modules/aos/dist/aos.css')}}" rel="stylesheet">
    <link href="{{asset('/front/assets/node_modules/bootstrap-touch-slider/bootstrap-touch-slider.css')}}"
        rel="stylesheet" media="all">
    <link href="{{asset('/front/assets/node_modules/magnific-popup/dist/magnific-popup.css')}}" rel="stylesheet">
    <!-- This css we made it from our predefine componenet
    we just copy that css and paste here you can also do that -->
    <link href="{{asset('/front/css/demo.css')}}" rel="stylesheet">
    <!-- Common style CSS -->
    <link href="{{asset('/front/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('/front/css/yourstyle.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    @yield('style')
</head>

<body class="">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Wrapkit</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->
        <div class="topbar">
            <!-- ============================================================== -->
            <!-- Header 14  -->
            <!-- ============================================================== -->
            <div class="header14 po-relative">
                <!-- Topbar  -->
                <div class="h14-topbar">
                    <div class="container">
                        <nav class="navbar navbar-expand-lg font-14">
                            <a class="navbar-brand hidden-lg-up" href="#">Top Menu</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header14a"
                                aria-controls="header14a" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="sl-icon-options"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="header14a">
                                <ul class="navbar-nav">
                                    <li class="nav-item"><a class="nav-link"></a></li>
                                </ul>
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item"><a class="nav-link"><i class="fa fa-clock-o"></i> Senin - Jumat
                                            |
                                            8:00-16:00 | Sabtu & Minggu - Tutup</a></li>

                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <!-- Infobar  -->
                <div class="h14-infobar">
                    <div class="container">
                        <nav class="navbar navbar-expand-lg h14-info-bar">
                            <a class="navbar-brand"><img src="{{asset('front/images/cost_logo.png')}}" height="40px"
                                    alt="wrapkit" /></a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#h14-info"
                                aria-controls="h14-info" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="sl-icon-options-vertical"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="h14-info">
                                <ul class="navbar-nav ml-auto text-uppercase">
                                    <li class="nav-item">
                                        <a class="nav-link">
                                            <div class="display-6 m-r-10"><i class="icon-Mail"></i></div>
                                            <div><small>Email</small>
                                                <h6 class="font-bold font-14">info@gmail.com</h6>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link">
                                            <div class="display-6 m-r-10"><i class="icon-Phone-2"></i></div>
                                            <div><small>Telp</small>
                                                <h6 class="font-bold">(0370) 638433</h6>
                                            </div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <!-- Navbar  -->
                <div class="h14-navbar">
                    <div class="container">
                        <nav class="navbar navbar-expand-lg h14-nav">
                            <a class="hidden-lg-up">Navigation</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header14"
                                aria-controls="header14" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="ti-menu"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="header14">
                                <div class="hover-dropdown">
                                    <ul class="navbar-nav">
                                        <li class="nav-item dropdown mega-dropdown active"> <a
                                                class="nav-link dropdown-toggle" href="{{url('/')}}"
                                                id="h6-mega-dropdown" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                Beranda </i>
                                            </a>
                                        </li>
                                        <li class="nav-item dropdown "> <a class="nav-link dropdown-toggle" href="#"
                                                id="h6-mega-dropdown1" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                Entitas <i class="fa fa-angle-down m-l-5"></i>
                                            </a>
                                            <ul class="b-none dropdown-menu font-14 animated fadeInUp">
                                                <li><a class="dropdown-item" href="#" target="_blank">Entitas I</a></li>
                                                <li><a class="dropdown-item" href="#" target="_blank">Entitas II</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#" target="_blank">Entitas III</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#"
                                                id="h6-dropdown" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                Dokummen <i class="fa fa-angle-down m-l-5"></i>
                                            </a>
                                            <ul class="b-none dropdown-menu font-14 animated fadeInUp">
                                                <li><a class="dropdown-item" href="../../wrapkit/pages-aboutus.html"
                                                        target="_blank">About Us</a></li>
                                                <li><a class="dropdown-item" href="../../wrapkit/pages-pricing.html"
                                                        target="_blank">Pricing</a></li>
                                                <li><a class="dropdown-item" href="../../wrapkit/pages-services.html"
                                                        target="_blank">Services</a></li>
                                                <li class="divider" role="separator"></li>
                                                <li><a class="dropdown-item"
                                                        href="../../wrapkit/pages-portfolio-detail.html"
                                                        target="_blank">Portfolio Detail</a></li>
                                                <li class="divider" role="separator"></li>
                                                <li><a class="dropdown-item" href="../../wrapkit/pages-blog.html"
                                                        target="_blank">Blog</a></li>
                                                <li><a class="dropdown-item" href="../../wrapkit/pages-blog-detail.html"
                                                        target="_blank">Blog Single</a></li>
                                                <li><a class="dropdown-item" href="../../wrapkit/pages-contact-us.html"
                                                        target="_blank">Contact Us</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#"
                                                id="h6-dropdown1" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                FAQ </i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item search dropdown"><a class="nav-link dropdown-toggle"
                                            href="javascript:void(0)" id="h14-sdropdown" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false"><i class="fa fa-search"></i></a>
                                        <div class="dropdown-menu b-none dropdown-menu-right animated fadeInDown"
                                            aria-labelledby="h14-sdropdown">
                                            <input class="form-control" type="text" placeholder="Type & hit enter" />
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Header 14  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            @yield('content')

            <!-- ============================================================== -->
            <!-- footer 3  -->
            <!-- ============================================================== -->
            <div class="footer3 bg-dark font-14">
                <div class="f3-topbar container">
                    <div class="d-flex">
                        <div class="d-flex no-block align-items-center">
                            <span>Lorem ipsum dolor sit amet, <span class="text-white">consectetur adipiscing
                                    elit</span>, sed do eiusmod
                                <br />tempor incididunt ut labore et dolore magna ad minim.</span>
                        </div>
                        <div class="ml-auto no-shrink align-self-center">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-dark form-control-lg"
                                        placeholder="Sign up for updates">
                                    <span class="input-group-btn">
                                        <button class="btn btn-info-gradiant btn-md" type="button">Go!</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="f3-middle container">
                    <!-- Row  -->
                    <div class="row">
                        <!-- cOLUMN -->
                        <div class="col-lg-3 col-md-6 m-b-30">
                            <h6 class="font-medium text-white">SERVICES</h6>
                            <ul class="general-listing">
                                <li><a href="#"><i class="ti-arrow-right"></i> Website Design</a></li>
                                <li><a href="#"><i class="ti-arrow-right"></i> Mobile App Development</a></li>
                                <li><a href="#"><i class="ti-arrow-right"></i> Search Engine Optimization</a></li>
                                <li><a href="#"><i class="ti-arrow-right"></i> Website Development</a></li>
                            </ul>
                        </div>
                        <!-- cOLUMN -->
                        <!-- cOLUMN -->
                        <div class="col-lg-3 col-md-6 m-b-30">
                            <h6 class="font-medium text-white">PROJECTS</h6>
                            <div class="d-flex no-block align-items-center m-t-20">
                                <div class="thumb m-r-20"><img src="{{asset('front/images/footer/1.jpg')}}"
                                        alt="wrapkit" /></div>
                                <div class="btext"><a href="#" class="link">Hotel nira inn got bigger heding you ever
                                        seen.</a></div>
                            </div>
                            <div class="d-flex no-block align-items-center m-t-20">
                                <div class="thumb m-r-20"><img src="{{asset('front/images/footer/2.jpg')}}"
                                        alt="wrapkit" /></div>
                                <div class="btext"><a href="#" class="link">Hotel nira inn got bigger heding you ever
                                        seen.</a></div>
                            </div>
                        </div>
                        <!-- cOLUMN -->
                        <!-- cOLUMN -->
                        <div class="col-lg-3 col-md-6 m-b-30">
                            <h6 class="font-medium text-white">BLOG</h6>
                            <div class="d-flex no-block align-items-center m-t-20">
                                <div class="thumb m-r-20"><img src="{{asset('front/images/footer/3.jpg')}}"
                                        alt="wrapkit" /></div>
                                <div class="btext"><a href="#" class="link">Hotel nira inn got bigger heding you ever
                                        seen.</a></div>
                            </div>
                            <div class="d-flex no-block align-items-center m-t-20">
                                <div class="thumb m-r-20"><img src="{{asset('front/images/footer/4.jpg')}}"
                                        alt="wrapkit" /></div>
                                <div class="btext"><a href="#" class="link">Hotel nira inn got bigger heding you ever
                                        seen.</a></div>
                            </div>
                        </div>
                        <!-- cOLUMN -->
                        <!-- cOLUMN -->
                        <div class="col-lg-3 col-md-6 m-b-30">
                            <h6 class="font-medium text-white">CONTACT</h6>
                            <div class="d-flex no-block m-b-10 m-t-20">
                                <div class="display-7 m-r-20 align-self-top"><i class="icon-Location-2"></i></div>
                                <div class="info">
                                    <p> 321 Name of Street Avenue,
                                        <br /> Country</p>
                                </div>
                            </div>
                            <div class="d-flex no-block m-b-10">
                                <div class="display-7 m-r-20 align-self-top"><i class="icon-Phone-2"></i></div>
                                <div class="info">
                                    <span class=" db  m-t-5">1 (888) 123 4567</span>
                                </div>
                            </div>
                            <div class="d-flex no-block m-b-30">
                                <div class="display-7 m-r-20 align-self-top"><i class="icon-Mail"></i></div>
                                <div class="info">
                                    <a href="#" class="link db  m-t-5">info@wrappixel.com</a>
                                </div>
                            </div>
                        </div>
                        <!-- cOLUMN -->
                    </div>
                    <!-- Row  -->
                </div>
                <div class="f3-bottom-bar">
                    <div class="container">
                        <div class="d-flex">
                            <span class="m-t-10 m-b-10">Copyright 2017. All Rights Reserved by WrapPixel.</span>
                            <div class="ml-auto m-t-10 m-b-10">
                                <a href="#" class="link"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="link"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="link"><i class="fa fa-linkedin"></i></a>
                                <a href="#" class="link"><i class="fa fa-pinterest"></i></a>
                                <a href="#" class="link"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End footer 3  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Back to top -->
            <!-- ============================================================== -->
            <a class="bt-top btn btn-circle btn-lg btn-info" href="#top"><i class="ti-arrow-up"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{asset('/front/assets/node_modules/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="{{asset('/front/assets/node_modules/popper/dist/popper.min.js')}}"></script>
    <script src="{{asset('/front/assets/node_modules/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- This is for the animation -->
    <script src="{{asset('/front/assets/node_modules/aos/dist/aos.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('/front/js/custom.min.js')}}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <script src="{{asset('/front/assets/node_modules/jquery.touchSwipe.min.js')}}"></script>
    <script src="{{asset('/front/assets/node_modules/bootstrap-touch-slider/bootstrap-touch-slider.js')}}"></script>
    <script src="{{asset('/front/assets/node_modules/magnific-popup/dist/jquery.magnific-popup.min.js')}}"></script>
    @yield('script')
    <script>
        $('#slider2').bsTouchSlider();
        $('.popup-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            tLoading: 'Loading image #%curr%...',
            mainClass: 'mfp-img-mobile',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
            },
            image: {
                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                titleSrc: function (item) {
                    return item.el.attr('title') + '<small>by Jon Doe</small>';
                }
            }
        });
    </script>
</body>

</html>
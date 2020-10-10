<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
    @yield('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#100DD1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above tags *must* come first in the head, any other head content must come *after* these tags-->
    <!-- Title-->
    <title>Join job - join job indonesia</title>
    <!-- Favicon-->
    <link rel="icon" href="https://joinjob.id/asset/logo.jpg">
    <!-- Apple Touch Icon-->
    <link rel="apple-touch-icon" href="img/icons/icon-96x96.png">
    <link rel="apple-touch-icon" sizes="152x152" href="https://joinjob.id/asset/logo.jpg">
    <link rel="apple-touch-icon" sizes="167x167" href="https://joinjob.id/asset/logo.jpg">
    <link rel="apple-touch-icon" sizes="180x180" href="https://joinjob.id/asset/logo.jpg">
    <!-- Stylesheet-->
    <link rel="stylesheet" href="https://designing-world.com/suha-v2.1.0/style.css">
    <link rel="stylesheet" href="{{ asset('asset/custom.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Web App Manifest-->
    <link rel="manifest" href="{{ asset('asset/manifest.json') }}">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3J9YEWTPD6"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-3J9YEWTPD6');
    </script>
    <style>
        .product-thumbnail img{
            height:145px;
        }
        .suha-navbar-toggler {
        position: relative;
        z-index: 1;
        width: 100px;
        cursor: pointer;
        padding: .5rem 0;
        } 
        .footer-nav-area{
        height:auto;
        }
        .catagory-card i{
        color:#3bb3c4;
        }
        .bg-success, .badge-success{
        background-color: #3bb3c4 !important;
        }
        .top-product-card .sale-price{
        color:#3bb3c4;
        }

        .top-product-card .product-rating{
        color:#020310;
        }

        .notification-area .list-group-item .noti-icon{
            background: linear-gradient(to left, #3bb3c4, #3ab4c3);
        }

        .notification-area .list-group-item .noti-icon::before{
        position: absolute;
        width: 10px;
        height: 10px;
        background-color: #fff;
        content: "";
        top: -2px;
        right: -10px;
        border-radius: 50%;
        z-index: 1;
        }
        .notification-area .list-group-item .noti-icon-notif::before{
        position: absolute;
        width: 10px;
        height: 10px;
        background-color: #ea4c62;
        content: "";
        top: -2px;
        right: -2px;
        border-radius: 50%;
        z-index: 1;
        }
    </style>
    @yield('styles')
</head>
<body>
    
    <!-- Preloader-->
    <div class="preloader" id="preloader">
      <div class="spinner-grow text-secondary" role="status">
        <div class="sr-only">Loading...</div>
      </div>
    </div>
    <!-- Preloader-->
    
    <!-- Header Area-->
    <div class="header-area" id="headerArea">
      <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Logo Wrapper-->
        @if(Request::segment(1) == '' || Request::segment(1) == 'home')
        <div class="logo-wrapper">
            <a href="/home"><img src="{{ asset('asset/logo.jpg') }}" alt="joinjob" style="max-height:25px;margin-top: 13px;"></a>
            <p>FAQ</p>
        </div>
        @else
        <!-- Back Button-->
        <div class="back-button"><a href="{{ route('home') }}"><i class="fas fa-arrow-left"></i></a></div>
        @endif

        <!-- Search Form-->
        <div class="top-search-form">
            <form action="/product/search" method="GET" id="Search">
                <input class="form-control" type="search" placeholder="Cari Judul Penawaran Di Provinsi Anda" name="keyword">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <!-- Navbar Toggler--> 
        <div class="suha-navbar-toggler d-flex flex-wrap">
            @guest
                <div class="notification-area" style="margin-top: 5px;">
                  <div class="list-group-item d-flex align-items-center"   style="border:none;"> 
                  <a href="{{ route('login') }}"><span class="noti-icon noti-icon-profil"><i class="fas fa-bell"></i></span> </a>  
                  <a href="{{ route('login') }}"><span class="noti-icon noti-icon-profile"> <i class="fas fa-user-lock"></i></span></a>
                  </div> 
                </div>
            @else
                
                <div class="notification-area" style="margin-top: 5px;">
                  <div class="list-group-item d-flex align-items-center"  style="border:none;">
                    <a href="{{ route('member.notif') }}"><span class="noti-icon noti-icon-notif"><i class="fas fa-bell"></i></span> </a>
                    <a href="{{ route('member.profile') }}"><span class="noti-icon noti-icon-profile"> <i class="fas fa-user-tie"></i></span></a>
                  </div> 
                </div> 
            @endguest
        </div>
      </div>
    </div>
    <!-- Header Area-->

    @guest 
    <!-- PWA Install Alert-->
    <div class="toast pwa-install-alert shadow" id="pwaInstallToast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="8000" data-autohide="true">
      <div class="toast-body">
        <button class="ml-3 close" type="button" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="content d-flex align-items-center mb-2"><img src="{{ asset('asset/logo.jpg') }}" alt="">
          <h6 class="mb-0 text-white">Notifikasi</h6>
        </div>
        <span class="mb-0 d-block text-white">Daftar Langsung JOINJOB.id <strong class="mx-1">FREE</strong>Sign Up</span>
        <a href="{{ route('register') }}">
            <button class="btn btn-primary">Sign Up</button>
        </a>
      </div>
    </div>
    <!-- PWA Install Alert-->
    @else
    
    @endguest

    <!-- BODY CONTENT-->
    <div class="page-content-wrapper">
        <!-- Hero Slides-->
        <div class="hero-slides owl-carousel" style="margin-top:50px;">
            <!-- Single Hero Slide-->
            <div class="single-hero-slide" style="background-image: url('{{ asset('asset/slide1.jpg') }}')">
            <div class="slide-content h-100 d-flex align-items-center">
                <!-- <div class="container">
                <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="1000ms">Amazon Echo</h4>
                <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-wow-duration="1000ms">3rd Generation, Charcoal</p><a class="btn btn-primary btn-sm" href="#" data-animation="fadeInUp" data-delay="800ms" data-wow-duration="1000ms">Buy Now</a>
                </div> -->
            </div>
            </div>
            <!-- Single Hero Slide-->
            <div class="single-hero-slide" style="background-image: url('{{ asset('asset/slide2.jpg') }}')">
            <div class="slide-content h-100 d-flex align-items-center">
                <!-- <div class="container">
                <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="1000ms">Light Candle</h4>
                <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-wow-duration="1000ms">Now only $22</p><a class="btn btn-success btn-sm" href="#" data-animation="fadeInUp" data-delay="500ms" data-wow-duration="1000ms">Buy Now</a>
                </div> -->
            </div>
            </div>
            <!-- Single Hero Slide-->
            <div class="single-hero-slide" style="background-image: url('{{ asset('asset/slide3.jpg') }}')">
            <div class="slide-content h-100 d-flex align-items-center">
                <!-- <div class="container">
                <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="1000ms">Best Furniture</h4>
                <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-wow-duration="1000ms">3 years warranty</p><a class="btn btn-danger btn-sm" href="#" data-animation="fadeInUp" data-delay="800ms" data-wow-duration="1000ms">Buy Now</a>
                </div> -->
            </div>
            </div>
            <!-- Single Hero Slide-->
            <div class="single-hero-slide" style="background-image: url('{{ asset('asset/slide4.jpg') }}')">
            <div class="slide-content h-100 d-flex align-items-center">
                <!-- <div class="container">
                <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="1000ms">Best Furniture</h4>
                <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-wow-duration="1000ms">3 years warranty</p><a class="btn btn-danger btn-sm" href="#" data-animation="fadeInUp" data-delay="800ms" data-wow-duration="1000ms">Buy Now</a>
                </div> -->
            </div>
            </div>
            <!-- Single Hero Slide-->
            <div class="single-hero-slide" style="background-image: url('{{ asset('asset/slide5.jpg') }}')">
            <div class="slide-content h-100 d-flex align-items-center">
                <!-- <div class="container">
                <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="1000ms">Best Furniture</h4>
                <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-wow-duration="1000ms">3 years warranty</p><a class="btn btn-danger btn-sm" href="#" data-animation="fadeInUp" data-delay="800ms" data-wow-duration="1000ms">Buy Now</a>
                </div> -->
            </div>
            </div>
        </div>

        <!-- Product Catagories-->
        <div class="product-catagories-wrapper py-3">
            <div class="container">
            <div class="section-heading">
                <h6 class="ml-1"></h6>
            </div>
            <div class="product-catagory-wrap">
                <div class="row g-3">
                    <!-- Single Catagory Card-->
                    <div class="col-4">
                        <div class="card catagory-card" style="height:142px;">
                            <div class="card-body">
                                <a href="{{ route('category') }}">
                                    <p class="text-black"><i class="fas fa-tasks" style="font-size:50px;"></i></p>
                                    <p class="mt-1 text-black">Kategori Bisnis</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Single Catagory Card-->
                    <div class="col-4">
                        <div class="card catagory-card" style="height:142px;">
                            <div class="card-body">
                                <a href="{{route('product.filter')}}">
                                    <p class="text-black"><i class="fa fa-tags" style="font-size:50px;"></i></p>
                                    <p class="mt-1 text-black">Biaya | Modal</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Single Catagory Card-->
                    <div class="col-4">
                        <div class="card catagory-card" style="height:142px;">
                            <div class="card-body">
                                <a href="{{route('member.product.create')}}">
                                    <p class="text-black"><i class="fa fa-pencil-square-o" style="font-size:50px;"></i></p>
                                    <p class="mt-1 text-black">Posting</p>
                                </a>
                            </div>
                        </div>
                    </div>
                       
                </div>
            </div>
            </div>
        </div>
        
        @yield('content') 
    </div>
    <!-- BODY CONTENT-->


    <!-- Internet Connection Status-->
    <div class="internet-connection-status mt-5" id="internetStatus"></div>
    <!-- Footer Nav-->
    <div class="footer-nav-area" id="footerNav" style="position: inherit;">
      <div class="container   px-0">
        <div class="suha-footer-nav  ">
          <ul class="  d-flex align-items-center justify-content-between pl-0">
            <li class="active">
                <a href="/home">
                    <p><img src="{{ asset('asset/logo.jpg') }}" alt="joinjob" style="max-height:35px;"></p>
                    <p style="margin-top:-10px;">JOINJOB</p>
                    <p style="margin-top:-15px;">Copyright 2020</p>
                    <p style="margin-top:-15px;">Join Informasi Antar Provinsi</p>
                </a>
            </li> 
          </ul>
        </div>
      </div>
    </div>
    <!-- All JavaScript Files-->
    <script src="https://designing-world.com/suha-v2.1.0/js/jquery.min.js"></script>
    <script src="https://designing-world.com/suha-v2.1.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://designing-world.com/suha-v2.1.0/js/waypoints.min.js"></script>
    <script src="https://designing-world.com/suha-v2.1.0/js/jquery.easing.min.js"></script>
    <script src="https://designing-world.com/suha-v2.1.0/js/owl.carousel.min.js"></script>
    <script src="https://designing-world.com/suha-v2.1.0/js/jquery.counterup.min.js"></script>
    <script src="https://designing-world.com/suha-v2.1.0/js/jquery.countdown.min.js"></script>
    <script src="https://designing-world.com/suha-v2.1.0/js/default/jquery.passwordstrength.js"></script>
    <script src="https://designing-world.com/suha-v2.1.0/js/wow.min.js"></script>
    <script src="https://designing-world.com/suha-v2.1.0/js/jarallax.min.js"></script>
    <script src="https://designing-world.com/suha-v2.1.0/js/jarallax-video.min.js"></script>
    <script src="https://designing-world.com/suha-v2.1.0/js/default/dark-mode-switch.js"></script>
    <script src="https://designing-world.com/suha-v2.1.0/js/default/no-internet.js"></script>
    <script src="https://designing-world.com/suha-v2.1.0/js/default/active.js"></script>
    <script src="https://designing-world.com/suha-v2.1.0/js/pwa.js"></script>
    <script>
    function search(){
        document.getElementById("Search").submit();
    }  
    </script> 
    @yield('script')
</body>
</html>
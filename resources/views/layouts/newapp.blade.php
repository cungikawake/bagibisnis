<!DOCTYPE html>
<html lang="id">
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
            height:100px;
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
        .product-title-meta-data::after{
            background:none;
        }
        .top-product-card .product-thumbnail img{
            width:auto;
        }
        
        @media (max-width: 400px){
            .single-hero-slide{
                height: 125px;
                background:contain;
            }
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
        <div class="suha-navbar-toggler d-flex flex-wrap">
            @if(Request::segment(1) == '' || Request::segment(1) == 'home')
                <div class="notification-area" style="margin-top: 5px;">
                  <div class="list-group-item d-flex align-items-center" style="border:none;"> 
                    <div class="dropdown">
                        <div data-toggle="dropdown">
                            <i class="fas fa-bars" style="font-size:25px;color:#38b4c3;"></i> 
                        </div>
                        <div class="dropdown-menu">
                            <a href="/faq" class="dropdown-item"><i class="far fa-question-circle"></i> FAQ</a>     
                        </div>
                    </div>
                    <a href="/home"><img src="{{ asset('asset/logo.jpg') }}" alt="joinjob" style="max-height:29px;margin-left:15px;"></a> 
                  </div> 
                </div>
            @else
                 <!-- Back Button-->
                <div class="back-button"><a href="{{ route('home') }}"><i class="fas fa-arrow-left"></i></a></div>
            @endif 
        </div> 

        <!-- Search Form-->
        <div class="top-search-form">
            <form action="/product/search" method="GET" id="Search">
                <input class="form-control" type="search" placeholder="Cari Judul Penawaran" name="keyword">
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
                    <a href="{{ route('member.profile') }}">
                        <span class="noti-icon noti-icon-profile">
                            @if(!empty(session('member')->logo))
                                <img src="{{ asset('storage/member/'.session('member')->logo) }}" alt="joinjob" style="max-height:29px;border-radius: 50%; border: 1px solid #79c9d4;">
                            @else
                                <i class="fas fa-user-tie"></i>
                            @endif
                        </span>  
                    </a>
                  </div> 
                </div> 
            @endguest 
        </div> 
      </div>
    </div>
    <!-- Header Area-->

    @guest 
    
        @if (isset($_COOKIE['joinjob']))
            <!-- PWA Install Alert-->
            <div class="toast pwa-install-alert shadow" id="pwaInstallToast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="8000" data-autohide="true">
                <div class="toast-header" style="background:#fff;">
                    <button class="ml-3 close" type="button" data-dismiss="toast" aria-label="Close" ><span aria-hidden="true" style="color:#ed052b;">&times;</span></button> 
                    <div class="content d-flex align-items-center mb-2">
                        <img src="{{ asset('asset/logo.jpg') }}" alt="joinjob" style="max-width:50px;">
                        <h3 class="mb-0" style="color:#3ab4c3;margin-left:3%;">AKUN SAYA</h3>
                    </div>
                </div>
                <div class="toast-body" style="background:#3ab4c3;"> 
                    <h6 class="mb-0 d-block text-white">ANDA HARUS KEMBALI <strong class="mx-1">LOGIN</strong></h6>
                    <br>
                    <a href="{{ route('login') }}">
                        <button class="btn btn-primary">Login Lagi</button>
                    </a>
                </div>
            </div>
            <!-- PWA Install Alert-->
        @else
            <!-- PWA Install Alert-->
            <div class="toast pwa-install-alert shadow" id="pwaInstallToast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="8000" data-autohide="true">
                <div class="toast-header" style="background:#fff;">
                    <button class="ml-3 close" type="button" data-dismiss="toast" aria-label="Close" ><span aria-hidden="true" style="color:#ed052b;">&times;</span></button> 
                    <div class="content d-flex align-items-center mb-2">
                        <img src="{{ asset('asset/logo.jpg') }}" alt="joinjob" style="max-width:50px;">
                        <h3 class="mb-0" style="color:#3ab4c3;margin-left:50%;">HALO...</h3>
                    </div>
                </div>
                <div class="toast-body" style="background:#3ab4c3;"> 
                    <h6 class="mb-0 d-block text-white">DAFTAR SEKARANG  <strong class="mx-1">FREE</strong>Sign Up</h6>
                    <br>
                    <a href="{{ route('register') }}">
                        <button class="btn btn-primary">Sign Up</button>
                    </a>
                </div>
            </div>
            <!-- PWA Install Alert-->
        @endif
    @else 
    @endguest

    <!-- BODY CONTENT-->
    <div class="page-content-wrapper">
        <!-- Hero Slides-->
        <div class="hero-slides owl-carousel" style="margin-top:60px;">
            <!-- Single Hero Slide-->
            <div class="single-hero-slide">
            <div class="slide-content h-100 d-flex align-items-center">
                <div class="container">
                    <img src="{{ asset('asset/slide11.jpg') }}">
                </div> 
            </div>
            </div>
            <!-- Single Hero Slide-->
            <div class="single-hero-slide" >
            <div class="slide-content h-100 d-flex align-items-center">
                <div class="container">
                    <img src="{{ asset('asset/slide22.jpg') }}">
                </div> 
            </div>
            </div>
            <!-- Single Hero Slide-->
            <div class="single-hero-slide" >
            <div class="slide-content h-100 d-flex align-items-center">
                <div class="container">
                    <img src="{{ asset('asset/slide33.jpg') }}">
                </div> 
            </div>
            </div>
            <!-- Single Hero Slide-->
            <div class="single-hero-slide">
            <div class="slide-content h-100 d-flex align-items-center">
                <div class="container">
                    <img src="{{ asset('asset/slide44.jpg') }}">
                </div> 
            </div>
            </div>
            <!-- Single Hero Slide-->
            <div class="single-hero-slide">
            <div class="slide-content h-100 d-flex align-items-center">
                <div class="container">
                    <img src="{{ asset('asset/slide55.jpg') }}">
                </div> 
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
                                    <p class="text-black"><i class="fas fa-th-large" style="font-size:50px;"></i></p>
                                    <p class="mt-1 text-black">Kategori</p>
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
                                    <p class="mt-1 text-black">Modal</p>
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
                    <p style="margin-top:-10px;color:#3bb3c4;">JOINJOB</p>
                    <p style="margin-top:-15px;color:#3bb3c4;">Copyright 2020</p>
                    <p style="margin-top:-15px;color:#3bb3c4;">Join Informasi Antar Provinsi</p> 
                    <p style="margin-top:-15px;color:#3bb3c4;">V1.0</p>
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
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	@yield('header')
	
    <!-- General CSS Files -->
    <link rel="stylesheet" href="http://demo.food-express.xyz/assets/modules/bootstrap/dist/css/bootstrap.min.css">
    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="http://demo.food-express.xyz/assets/css/style.css">
    <link rel="stylesheet" href="http://demo.food-express.xyz/assets/css/components.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	 
    <style>
        header.main {
            position: relative;
            z-index: 9999; 
            margin: 0 auto; 
            -webkit-transition: padding .3s ease;
            transition: padding .3s ease;
        }
        .navbar {
            left:0;
            right:0;
            position:relative;
            height:auto;
        }
		.main-fitur.active{
			border:2px solid #212529;
		}
        h2 .fas, h2 .fa{
            font-size:35px; 
        }
        h4, h5{
            font-size:1.0rem;
        }
        .h3, h3{
            font-size:1.3rem;
        }
        .mobile{
			display:none;
		}
		.dekstop{
			display:block;
		}
		a{
			color:#212529;
		}
        .text-black{
			color:#212529;
		}
		.btn-primary, .btn-primary.disabled {
			box-shadow: 0 2px 6px #3bab9f;
			background-color: #3bab9f;
			border-color: #3fc7af;
		}

		.modal-header {
		border-bottom: none;
		}

		.modal-dialog {
		width: 100%;
		height: 100%;
		margin: 0;
		padding: 0;
		}

		.modal-backdrop {
		background-color:#fff;
		opacity:1!important;
			border: 10px solid rgba(136, 136, 136, .4);
		}

		.modal-content {
		height: auto;
		min-height: 100%;
		border-radius: 0;
		background: none;
		box-shadow: none;
		}

		.modal-body {
		text-align: center;
		}

		.modal-body form {
		margin: 0 auto;
		float: none;
		width: 300px;
		}

		.modal-content .close {
		opacity: 1;
		font-size: 30px;
		}

		.navbar-default .navbar-collapse,
		.navbar-default .navbar-form {
		border: none;
		}
		#share
		{
			display:flex;  
			list-style:none;
			float:right;
		}
		#share li{
			display: inline;
			margin-left:10px;

		}

        @media (max-width: 900px){
             
            h2 .fas, h2 .fa{
                font-size:25px; 
            }
            h4, h5{
                font-size:0.6rem;
            }
            .h3, h3{
                font-size:1.0rem;
            }

            .dekstop{
				display:none;
			}
			.mobile{
				display:block;
			}
        }
	</style>
	@yield('styles')
</head>
 
<body>
    <!--================Header Menu Area =================-->
	<header class="header_area">
		<div style="width:100%;">
			<div class="top_menu m0" style="background:#00cccb;">
				<div class="container-fluid">
					<div class="row">
						<div class="col-2"></div>
						<div class="col-8 text-center text-white mt-2">
							<h4>Media Pilihan Bisnis</h4>
						</div>
						<div class="col-2">
							@guest
							@else

							<div class="dropdown">
								<p data-toggle="dropdown" id="menu1" class="text-white"><i class="fas fa-ellipsis-v"></i></p>	 
								<div class="dropdown-menu">
									<a class="dropdown-item" href="#">Tentang Kami</a>
									<a class="dropdown-item" href="#">Syarat & Ketentuan</a>
									<a class="dropdown-item" href="#">Tutorial</a>
									<a class="dropdown-item " href="{{ route('logout') }}"
										onclick="event.preventDefault();
												document.getElementById('logout-form').submit();"> Logout
									</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										{{ csrf_field() }}
									</form> 
								</div>
							</div>
 
							
							@endguest
						</div>
					</div>
				</div>
			</div>

			<div class="main_menu text-black">
				<nav class="navbar navbar-expand-lg navbar-light" style="background: #43ded0; ">
					<div class="container offset">
						<div class="row w-100" style="margin: 0 auto;"> 
							<div class="col-3 mt-10 text-center text-black" data-toggle="modal" data-target="#myModal">
								 
                                    <h2><i class="fas fa-search"></i></h2>
								    <h5 style="margin-top: -10px;" class="text-black" >Search</h5>
								 
							</div>
							<div class="col-6 text-center mt-10">
								<img src="{{ asset('asset/logo.png') }}"  alt="logo" style="max-height:70px;"> 
							</div>
							<div class="col-3 text-center mt-10">
							@guest
								<a href="{{ route('login') }}" class="icons">
                                    <h2><i class="fas fa-user"></i></h2>
                                    <h5 style="margin-top: -10px;" class="text-black">Login</h5> 
                                </a>
							@else
								<!-- <a href="{{ route('logout') }}"
									onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">
									<h2><i class="fas fa-user-tie"></i></h2>
									<h5 style="margin-top: -10px;" class="text-black">Halo, {{auth()->guard('web')->user()->name}}</h5>
								</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form> --> 
								<a href="{{ route('member.profile') }}">
									<h2><i class="fas fa-user-tie"></i></h2>
									<h5 style="margin-top: -10px;" class="text-black">Halo, {{auth()->guard('web')->user()->name}}</h5>
								</a>
							@endguest
							</div>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</header>
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document" style="max-width:100%;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

				</div>
				<div class="modal-body">

					<h1>Cari Produk</h1>
					<form action="/product/search" method="GET">
						<div class="form-group">
							<input class="form-control" type="text" name="keyword" placeholder="Nama produk..." value="{{ old('keyword') }}">
						</div>
						<input type="submit" class="btn btn-primary" value="CARI">
					</form>

				</div> 
			</div>
		</div>
	</div>
	<!--================Header Menu Area =================-->
	
	<!--================Hot Deals Area =================-->
	<section id="main_menu" class="hot_deals_area section_gap" style="margin-top:30px; padding-bottom:20px;">
		<div class="container">
			<div class="row">
				<div class="col-3 text-center main-fitur {{ (Request::segment(2) == 'home' )? 'active': '' }}">
					<a href="{{route('home')}}">
						<h2 class="text-black"><i class="fas fa-home"></i></h2>
						<h4 class="mt-1 text-black">Home</h4>
					</a>
				</div>
				<div class="col-3 text-center main-fitur {{ (Request::segment(1) == 'product' && Request::segment(2) == 'filter')? 'active': '' }}">
					<a href="{{ route('category') }}">
					<a href="{{route('product.filter')}}">
						<h2 class="text-black"><i class="fa fa-box"></i></h2>
						<h4 class="mt-1 text-black">Produk</h4>
					</a>
				</div>
				<div class="col-3 text-center main-fitur {{ (Request::segment(1) == 'category')? 'active': '' }}">
					<a href="{{ route('category') }}">
						<h2 class="text-black"><i class="fas fa-user"></i></h2>
						<h4 class="mt-1 text-black">Member</h4>
					</a>
				</div>
				<div class="col-3 text-center main-fitur {{ (Request::segment(2) == 'product' && Request::segment(3) == 'create')? 'active': ''}}">
					<a href="{{route('member.product.create')}}">
						<h2 class="text-black"><i class="fas fa-money"></i></h2>
						<h4 class="mt-1 text-black">Pendapatan</h4>
					</a>
				</div>
			</div>
		</div>
	</section>
	<!--================End Hot Deals Area =================-->


    <main class="py-4">
        @yield('content')
    </main>
</body>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/7.3/highlight.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
 
@yield('script')
</html>

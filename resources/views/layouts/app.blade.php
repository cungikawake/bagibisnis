<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="icon" href="https://dibisnis.id/asset/logo.png">
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
		.clearfix{
			clear:both;
		}
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
			background:#fff;
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
		.viewer{ 
			background: #aaaaaa9e;
			color: #3fc7af;
			padding: 5px;
			position: absolute;
			z-index: 99;
			width: 20%;
			text-align: right;
			right: 15px;
			font-size: 10px;
			max-height: 35px;
		}
		.img-product{
			height:300px;
		}
		.footer{
			border-top:3px solid #3fc7af;
			padding-top:15px;
		}
		/* The sticky class is added to the header with JS when it reaches its scroll position */
		.sticky-top {
			position: fixed;
			top: 0;
			z-index: 1020;
		}
 
        @media (max-width: 900px){
			.img-product{
				height:150px;
			}
            .viewer{ 
				background: #aaaaaa9e;
				color: #3fc7af;
				padding: 5px;
				position: absolute;
				z-index: 99;
				width: 45%;
				text-align: right;
				right: 15px;
				font-size: 10px;
				max-height: 35px;
			}
            h2 .fas, h2 .fa{
                font-size:25px; 
            }
            h4, h5{
                font-size:1.0rem;
            }
            .h3, h3{
                font-size:1.3rem;
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
	<header class="header_area">
		<div style="width:100%;"> 
			<div class="main_menu text-black">
				<nav  class="navbar navbar-expand-lg  navbar-dark sticky-top" style="background: #fff; border-bottom:3px solid #3fc7af; ">
					<div class="container offset">
						<div class="row w-100" style="margin: 0 auto;"> 
							<div class="col-3 mt-10 text-center text-black">
								<a href="{{ url('/faq') }}">
									<img src="{{ asset('asset/joinjob.png') }}"  alt="logo" style="max-height:30px;">
									<h3 style="color:#3fc7af;">FAQ</h3> 
								</a>
							</div>
							<div class="col-6 text-center mt-10">
								 
							</div>
							<div class="col-3 text-center mt-10">
							@guest
								<a href="{{ route('login') }}" class="icons">
                                    <h2 class="text-black"><i class="fas fa-user-lock"></i></h2>
                                    <h5 style="margin-top: -10px;" class="text-black">Login</h5> 
                                </a>
							@else
								<a href="{{ route('logout') }}"
									onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">
									<h2><i class="fas fa-user-tie"></i></h2>
									<h5 style="margin-top: -10px;" class="text-black">Halo, {{auth()->guard('web')->user()->name}}</h5>
								</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
								<a href="{{ route('member.profile') }}">
									<h2 class="text-black"><i class="fas fa-user-tie"></i></h2>
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

	

    <main class="py-4 content" style="margin-top:50px;">
        <div style="margin-top:20px;">
		@yield('content')
		</div>

		<div style="bottom:0; position:fixed; width:100%;">
		<div class="row">
			<div class="col-md-12 text-center" style="background: #fff; border-top:3px solid #3fc7af;">
				<a href="{{ url('/') }}">
					<img src="{{ asset('asset/joinjob.png') }}"  alt="logo" style="max-height:30px;">
					<h3 style="color:#3fc7af;">JOINJOB</h3> 
					<P style="color:#3fc7af; margin-top:-10px;">Copyright 2020</P> 
					<P style="color:#3fc7af; margin-top:-25px;">Join Bisnis Indonesia</P> 
				</a>
			</div>
		</div>
		</div>
    </main>
	
 
</body>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/7.3/highlight.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>
function search(){
	document.getElementById("Search").submit();
} 
 
</script> 
@yield('script')
</html>

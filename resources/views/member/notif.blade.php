@extends('layouts.user-app')
@section('header')
<title>Notifikasi Penawaran, Join bisnis antar provinsi | dibisnis.id</title>
@endsection
@section('content') 
 
<div class="container">
    <!-- Notifications Area-->
    <div class="notification-area pt-3 pb-2">
        <h6 class="pl-1">Notifications</h6>
        <div class="list-group"> 
            <!-- Single Notification-->
            <a class="list-group-item d-flex align-items-center" href="{{ route('member.profile') }}"><span class="noti-icon"><i class="fas fa-key"></i></span>
            <div class="noti-info">
                <h6 class="mb-0">Masa aktif akun anda sampai {{ date('d-m-Y', strtotime($user->exp_date)) }}</h6>
                
            </div>
            </a>

            @foreach($categories as $category)
            <!-- NOTIF-->
            <div class="list-group-item d-flex align-items-center flash-sale-wrapper">
                <div class="container">
                    <!-- Single Notification-->
                    <a class="list-group-item d-flex align-items-center" href="notification-details.html">
                        <span class="noti-icon">
                            <img src="{{ asset('asset/'.$category['icon']) }}" class="img-fluid" alt="{{ $category['name'] }}">
                        </span>
                        <div class="noti-info">
                            <h6 class="mb-0">{{ $category['name'] }}</h6><span>12 min ago</span>
                        </div>
                    </a> 
                    
                    <!-- Flash Sale Slide-->
                    <div class="flash-sale-slide owl-carousel">
                        @foreach($products[$category['id']] as $product)
                        <!-- Single Flash Sale Card-->
                        <div class="card flash-sale-card">
                            <div class="card-body">
                                <a class="product-thumbnail" href="{{ url('/product/show/' . $product['product_slug']) }}">
                                    <?php 
                                        $images = explode('|', $product['product_image']);
                                    ?>
                                    @foreach($images as $key => $image)
                                        @if($key == 0)
                                            <img class="mb-2" src="{{ asset('storage/products/'.$image) }}" alt="joinjob">
                                        @endif
                                    @endforeach 
                                    <span class="product-title">{{ $product['product_name'] }}</span>
                                    <p class="sale-price">
                                       Biaya | Modal Rp.{{ number_format($product['product_modal']) }}
                                    </p> 
                                </a>
                            </div>
                        </div> 
                        <!-- Single Flash Sale Card-->
                        @endforeach
                    </div>
                    
                </div>
            </div>
            @endforeach
            <!-- Flash Sale Slide-->
        </div>
    </div>
    </div>
@endsection
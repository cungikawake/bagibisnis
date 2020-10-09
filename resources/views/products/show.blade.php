@extends('layouts.app')

@section('header')

<title>{{ $product->name }} | joinjob.id.id</title>
<meta name="keywords" content="{{ $product->name }}">
<meta name="title" content="{{ $product->name }} | joinjob.id.id">
<?php 
    $taglessBody = strip_tags($product->description);
    $images = explode('|', $product->image);
?>
<meta name="description" content="{!! \Illuminate\Support\Str::limit(strip_tags($taglessBody), 200,'...')  !!}">

<link rel="canonical" href="https://joinjob.id.id/" /> 

<!-- Search Engine -->
<meta name="description" content="{!! \Illuminate\Support\Str::limit(strip_tags($taglessBody), 200,'...')  !!}">
<meta name="image" content="{{ asset('storage/products/'.$images[0]) }}">

<!-- Schema.org for Google -->
<meta itemprop="name" content="{{ $product->name }} | joinjob.id.id">
<meta itemprop="description" content="{!! \Illuminate\Support\Str::limit(strip_tags($taglessBody), 200,'...')  !!}">
<meta itemprop="image" content="{{ asset('storage/products/'.$images[0]) }}">

<!-- Open Graph general (Facebook, Pinterest & Google+) -->
<meta name="og:title" content="{{ $product->name }} | joinjob.id.id">
<meta name="og:description" content="{!! \Illuminate\Support\Str::limit(strip_tags($taglessBody), 200,'...')  !!}">
<meta name="og:type" content="article">

<meta property="og:title" content="{{ $product->name }} | joinjob.id.id" />
<meta property="og:url" content="https://joinjob.id.id/" />
<meta property="og:image" content="{{ asset('storage/products/'.$images[0]) }}">
<meta property="og:type" content="article" />

@endsection

@section('content')
    <div class="container" style="margin-top:100px;"> 
        <div class="card">
            <div class="card-body">
                <div class="col-12"><!-- 
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" style="font-size:10px;"><a href="#">Produk</a></li>
                            <li class="breadcrumb-item" style="font-size:10px;"><a href="#"><a href="#">{{ $product->category->name }}</a></a></li>
                            <li class="breadcrumb-item active" aria-current="page" style="font-size:10px;">Detail Produk</li>  
                        </ol>
                    </nav>  --> 
                </div>
                <div class="col-12 col-md-12" style="padding:2px;">
                    
                    <div class="row"> 
                        <div class="col-8">
                            <h4 class="mt-2 text-black">
                                <img src="{{ asset('asset/'.$product->category->icon) }}" alt="{{ $product->category->name }}" style="max-width:40px;">
                                {{$product->category->name}} 
                            </h4>
                        </div>
                        <div class="col-4 text-right">
                            <h4 class="mt-2 text-black">
                                <i class="fas fa-map-marker-alt"></i>
                                {{$product->member->city->name}} - {{$product->member->province->name}} 
                            </h4> 
                        </div>
                        <div class="col-md-12">
                            <a href="{{ url('/product/show/' . $product->slug) }}" > 
                                <div  class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    <ul class="carousel-indicators">
                                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                                        <li data-target="#demo" data-slide-to="1"></li>
                                        <li data-target="#demo" data-slide-to="2"></li>
                                    </ul>       
                                    <!--Slides-->
                                    <div class="carousel-inner" role="listbox">
                                        <?php 
                                            $images = explode('|', $product->image);
                                        ?>
                                        @foreach($images as $key => $image)
                                        <!--First slide-->
                                        <div class="carousel-item @if($key == 0) active @endif">
                                            <img class="d-block w-100 img-product" src="{{ asset('storage/products/'.$image) }}"
                                            alt="image Joinjob">
                                        </div>
                                        <!--/First slide--> 
                                        @endforeach
                                    </div>
                                    <!--/.Slides--> 
                                </div> 
                            </a>
                        </div> 
                    </div>
                </div> 
            </div>
        </div>
    </div>

    <div class="container"> 
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h2 style="color:#212529;">{{ $product->name }}</h2>  
                    </div> 
                    <div class="col-8" style="border:solid 1px #ccc;">
                        <br>
                        <div class="row">
                            <div class="col-4 text-left">
                                <h3 class="text-black p-10">
                                    <i class="fa fa-tags"></i>
                                </h3>
                                <h4 class="mt-1 text-black p-14">Biaya | Modal</h4>
                            </div>
                            <div class="col-8  text-left">
                                <h2 class="p-20" style="color:#3bb3c3;">Rp. {{number_format($product->modal)}}</h2>
                            </div>
                        </div>  
                    </div>
                    <div class="col-4">
                        <br>
                        <div class="row">
                            <div class="col-6">
                                <h4 class="p-10"><i class="fas fa-eye" style="font-size:20px;"></i> {{number_format($product->visitor)}} dilihat</h4>
                            </div>
                            <div class="col-6">
                                <ul id="share" > 
                                    <li> 
                                        <div class="dropdown">
                                            <h4 data-toggle="dropdown" id="menu2" class="text-black p-10"  >
                                            <i class="fas fa-share-alt"></i> Bagikan</h4>

                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="https://www.facebook.com/sharer/sharer.php?u={{ url('/product/show/' . $product->slug) }}"><i class="fab fa-facebook"></i> Facebook</a>
                                                <a class="dropdown-item" href="https://api.whatsapp.com/send?text={{ $product->name  }} %20 {{ url('/product/show/' . $product->slug) }}"><i class="fab fa-whatsapp-square"></i> Whatsapp</a>
                                            </div>
                                        </div> 
                                    </li>
                                </ul>
                            </div>
                        </div> 
                    </div>
                </div>

                <div class="row"> 
                    <div class="col-md-12 text-black">
                        <br>
                        {{ $product->description }} 
                        <br>
                    </div> 
                    
                    <div class="col-12" style="border:solid 1px #ccc; margin-top:20px;">
                        <?php 
                            $data = substr($product->member->phone_number, 1);
                            $phone_number = '62'. $data;
                        ?> 
                        <a href="https://api.whatsapp.com/send?phone={{ $phone_number }}&text=Saya%20tertarik%20untuk%20menjadi%20reseller%20produk%20ini%0A%0A Via%20%20{{ url('/product/show/' . $product->slug) }}">
                            <h3 class="mt-2 text-black" style="margin-left:-5px;"> 
                                Kontak : {{$phone_number}}
                            </h3>
                        </a>    
                    </div>
                </div>

                <div class="row" style="margin-top:20px;"> 
                    <div class="col-6"> 
                        <p class="text-left">
                            <img class="img-fluid" src="{{ asset('storage/member/'.$product->member->logo) }}" alt="{{ $product->member->name }}" style="max-height:150px; border-radius:20%; border:2px solid #3EC7AF;">
                        </p>
                        <h4 class="mt-2 text-black">
                            <i class="fas fa-home"></i>
                            {{$product->member->name}} - {{$product->member->city->name}} | {{$product->member->province->name}}
                        </h4> 
                    </div>
                    <div class="col-6">
                        <a href="{{route('shop_detail', $product->member->shop_name)}}" style=" margin-right:-26px; margin-top:50px;" class="btn btn-primary">
                            <h3>Lihat Detail Profil</h3>
                        </a>
                    </div> 
                </div> 

                 
            </div>
        </div>
    </div>
@endsection
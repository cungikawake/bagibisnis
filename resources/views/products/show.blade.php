@extends('layouts.app')

@section('header')

<title>{{ $product->name }} | dibisnis.id</title>
<meta name="keywords" content="{{ $product->name }}">
<meta name="title" content="{{ $product->name }} | dibisnis.id">
<?php 
    $taglessBody = strip_tags($product->description);
    $images = explode('|', $product->image);
?>
<meta name="description" content="{!! \Illuminate\Support\Str::limit(strip_tags($taglessBody), 200,'...')  !!}">

<link rel="canonical" href="https://dibisnis.id/" /> 
<!-- Search Engine -->
<meta name="description" content="{!! \Illuminate\Support\Str::limit(strip_tags($taglessBody), 200,'...')  !!}">
<meta name="image" content="{{ asset('storage/products/'.$images[0]) }}">
<!-- Schema.org for Google -->
<meta itemprop="name" content="{{ $product->name }} | dibisnis.id">
<meta itemprop="description" content="{!! \Illuminate\Support\Str::limit(strip_tags($taglessBody), 200,'...')  !!}">
<meta itemprop="image" content="{{ asset('storage/products/'.$images[0]) }}">
<!-- Open Graph general (Facebook, Pinterest & Google+) -->
<meta name="og:title" content="{{ $product->name }} | dibisnis.id">
<meta name="og:description" content="{!! \Illuminate\Support\Str::limit(strip_tags($taglessBody), 200,'...')  !!}">
<meta name="og:type" content="article">

<meta property="og:title" content="{{ $product->name }} | dibisnis.id" />
<meta property="og:url" content="https://dibisnis.id/" />
<meta property="og:image" content="{{ asset('storage/products/'.$images[0]) }}">
<meta property="og:type" content="article" />

@endsection

@section('content')
    <div class="container"> 
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h3 style="color:#212529;">{{ $product->name }}</h3>
                        <hr>
                    </div>
                </div>
                  
                <div class="row">
                    <div class="col-md-12 mobile"> 
                        <div class="f_p_item">
                            <div class="f_p_img"> 
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
                                                <img class="d-block w-100" src="{{ asset('storage/products/'.$image) }}"
                                                alt="image dibisnis" style="max-height:350px;">
                                            </div>
                                            <!--/First slide--> 
                                            @endforeach
                                        </div>
                                        <!--/.Slides--> 
                                    </div>  
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-4"> 
                        <p class="text-center">
                            <img class="img-fluid" src="{{ asset('storage/member/'.$product->member->logo) }}" alt="{{ $product->member->name }}" style="max-height:150px; border-radius:20%; border:2px solid #3EC7AF;">
                        </p>
                        
                        <h4 class="mt-2 text-black">
                            <i class="fas fa-home"></i>
                            {{$product->member->shop_name}}
                        </h4>
                        <h4 class="mt-2 text-black">
                            <i class="fas fa-map-marker-alt"></i>
                            {{$product->member->address}}
                        </h4>
                        <h4 class="mt-2 text-black">
                            <i class="fa fa-bookmark"></i>
                            {{$product->category->name}}
                        </h4>
                        
                        <br>
                        <div class="card">
                            <div class="card-body" style="background:#3fc7af;border-radius:10px 10px 0 0;">
                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="text-black">Modal Bisnis</h5>
                                    </div>
                                    <div class="col-6"> 
                                        <p class="text-black">Rp. {{number_format($product->modal)}}</p>
                                    </div> 
                                </div>
                            </div>
                            <div class="card-body" style="background:#3fc7af47;">
                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="text-black">Provit Bisnis</h5>
                                    </div>
                                    <div class="col-6"> 
                                        <p class="text-black">Rp. {{ number_format($product->provit) }}/{{$product->satuan}}</p>
                                    </div> 
                                </div>
                            </div>
                        </div> 
                        <p class="text-right">	
                            <?php 
                                $data = substr($product->member->phone_number, 1);
                                $phone_number = '62'. $data;
                            ?>
                            <a href="https://api.whatsapp.com/send?phone={{ $phone_number }}&text=Saya%20tertarik%20untuk%20menjadi%20reseller%20produk%20ini%0A%0A Via%20%20{{ url('/product/show/' . $product->slug) }}" class="btn btn-primary">
                            <i class="fab fa-whatsapp"></i> Pesan Sekarang
                            </a>

                            <ul id="share"> 
                                <li> 
                                    <div class="dropdown">
                                        <p data-toggle="dropdown" id="menu2" class="text-black"><i class="fas fa-share-alt"></i> Bagikan</p>	 
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="https://www.facebook.com/sharer/sharer.php?u={{ url('/product/show/' . $product->slug) }}"><i class="fab fa-facebook"></i> Facebook</a>
                                            <a class="dropdown-item" href="https://api.whatsapp.com/send?text={{ $product->name  }} %20 {{ url('/product/show/' . $product->slug) }}"><i class="fab fa-whatsapp-square"></i> Whatsapp</a>
                                        </div>
                                    </div> 
                                </li>
                            </ul>
                        </p>
                    </div> 
                    
                    <div class="col-md-8 dekstop">
                            
                        <div class="f_p_item">
                            <div class="f_p_img"> 
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
                                                <img class="d-block w-100" src="{{ asset('storage/products/'.$image) }}"
                                                alt="image dibisnis" style="max-height:350px;">
                                            </div>
                                            <!--/First slide--> 
                                            @endforeach
                                        </div>
                                        <!--/.Slides--> 
                                    </div>  
                            </div>
                        </div>
                    </div>  
                    <div class="col-md-12">
                        <hr>
                    </div>  
                </div> 

                <div class="row">
                    <div class="col-12">
                        <h3 style="color:#212529;">Deskripsi</h3>
                        <hr>
                    </div>
                    <div class="col-md-12">
                        {{ $product->description }}
                        <hr>
                    </div> 
                </div> 
            </div>
        </div>
    </div>
@endsection
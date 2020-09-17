@extends('layouts.app')
@section('header')
<title>Join Bisnis Indonesia | Joinjob.id</title>

<meta name="keywords" content="Join Bisnis Indonesia">
<meta name="title" content="Join Bisnis Indonesia">
 
<meta name="description" content="Joinjob hadir sebagai tempat berbagi informasi dan
memberikan kemudahan mencari berbagai keperluan anda untuk
melakukan kegiatan interaksi dan transaksi dalam satu media website.">

<link rel="canonical" href="https://Joinjob.id/" /> 

<!-- Search Engine -->
<meta name="description" content="Joinjob hadir sebagai tempat berbagi informasi dan
memberikan kemudahan mencari berbagai keperluan anda untuk
melakukan kegiatan interaksi dan transaksi dalam satu media website.">
<meta name="image" content="https://dibisnis.id/asset/logo.png">

<!-- Schema.org for Google -->
<meta itemprop="name" content="Joinjob.id">
<meta itemprop="description" content="Joinjob hadir sebagai tempat berbagi informasi dan
memberikan kemudahan mencari berbagai keperluan anda untuk
melakukan kegiatan interaksi dan transaksi dalam satu media website.">
<meta itemprop="image" content="https://dibisnis.id/asset/logo.png">

<!-- Open Graph general (Facebook, Pinterest & Google+) -->
<meta name="og:title" content="Join Bisnis Indonesia | Joinjob.id">
<meta name="og:description" content="Joinjob hadir sebagai tempat berbagi informasi dan
memberikan kemudahan mencari berbagai keperluan anda untuk
melakukan kegiatan interaksi dan transaksi dalam satu media website.">
<meta name="og:type" content="article">

<meta property="og:title" content="Join Bisnis Indonesia | Joinjob.id" />
<meta property="og:url" content="https://Joinjob.id/" />
<meta property="og:image" content="https://dibisnis.id/asset/logo.png">
<meta property="og:type" content="article" /> 
@endsection

@section('styles')
<style> 
</style>
@endsection

@section('content')
    <div class="container"> 
        <!--slider-->
        <div class="row"> 
            <div  class="carousel slide" data-ride="carousel" style="padding-left:15px; padding-right:15px;">
                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                </ul>       
                <!--Slides-->
                <div class="carousel-inner" role="listbox">
                    <!--First slide-->
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="https://source.unsplash.com/1600x900/?local-business"
                        alt="image Joinjob" style="max-height:500px;">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="https://source.unsplash.com/1600x900/?retail-shopping"
                        alt="image Joinjob" style="max-height:500px;">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="https://source.unsplash.com/1600x900/?product"
                        alt="image Joinjob" style="max-height:500px;">
                    </div>
                    <!--/First slide--> 
                </div>
                <!--/.Slides--> 
            </div> 
        </div>

        @include('layouts.main-menu')

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item" style="font-size:10px;"><a href="#">Semua Bisnis</a></li>
                                @if(isset($province_search))
                                    @if($province_search !='' && $keyword !='')
                                        <li class="breadcrumb-item" style="font-size:10px;"><a href="#">Provinsi {{$province_search}}</a></li>
                                        <li class="breadcrumb-item" style="font-size:10px;"><a href="#">Cari Produk</a></li>
                                        <li class="breadcrumb-item active" aria-current="page" style="font-size:10px;"><a href="#">{{$keyword}} [ {{ $products->total() }} ]</a></li>
                                    
                                    @elseif($province_search !='')
                                        <li class="breadcrumb-item" style="font-size:10px;"><a href="#">Provinsi</a></li>
                                        <li class="breadcrumb-item active" aria-current="page" style="font-size:10px;"><a href="#">{{$province_search}} [ {{ $products->total() }} ]</a></li>
                                    @elseif($keyword !='') 
                                        <li class="breadcrumb-item" style="font-size:10px;"><a href="#">Cari Produk</a></li>
                                        <li class="breadcrumb-item active" aria-current="page" style="font-size:10px;"><a href="#">{{$province_search}} [ {{ $products->total() }} ]</a></li>
                                    @endif
                                
                                @else
                                    <li class="breadcrumb-item active" aria-current="page" style="font-size:10px;"><a href="#">Semua Provinsi [ {{ $products->total() }} ]</a></li> 
                                @endif
                            </ol>
                        </nav> 
                        <hr>
                    </div>
                </div>

                
                <div class="row">
                @foreach($products as $row)  
                    <div class="col-6 col-md-6" style="padding:2px;">
                        <h4 class="mt-2 text-black">
                            <i class="fas fa-map-marker-alt"></i>
                            {{$row->member->province->name}} - {{$row->member->city->name}}
                        </h4>
                        <div class="row"> 
                            <div class="col-md-12">
                                <a href="{{ url('/product/show/' . $row->slug) }}" >
                                    <div class="viewer">
                                        <p><i class="fas fa-eye"></i> {{number_format($row->visitor)}} dilihat</p>
                                    </div>
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
                                                $images = explode('|', $row->image);
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
                            <div class="col-md-12">
                                <a href="{{ url('/product/show/' . $row->slug) }}" >
                                    <h4 style="background: #aaaaaa2e;margin-top:5px;padding: 10px;">{{ $row->product_name }} </h4>
                                </a>
                            </div>
                            <div class="col-md-12">
                                <h4 style="padding: 10px; color:#3fc7af;">Modal Rp. {{number_format($row->modal)}}</h4>
                                <h4 style="padding: 10px; color:#3fc7af;margin-top:-20px;">Provit Rp. {{ number_format($row->provit) }}/{{$row->satuan}}</h4>
                                    
                            </div>
                            <div class="col-md-12">
                                <h4 class="mt-2 text-black" style="background: #aaaaaa2e;margin-top:5px;padding: 10px;">
                                    <i class="fas fa-home"></i>
                                    {{$row->shop_name}} - {{$row->address}}
                                </h4>
                            </div>
                        </div>
                    </div> 
                @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
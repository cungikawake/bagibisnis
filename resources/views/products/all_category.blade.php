@extends('layouts.app')
@section('header')
<title>Semua kategori bisnis, media pilihan bisnis | dibisnis.id</title>

<meta name="keywords" content="Semua kategori bisnis, media pilihan bisnis">
<meta name="title" content="Semua kategori bisnis, media pilihan bisnis">
 
<meta name="description" content="Semua kategori bisnis, media pilihan bisnis. joinjob.id merupakan website yang menyediakan fasilitas pemasaran digital bagi produsen dan distributor">

<link rel="canonical" href="https://joinjob.id/" /> 

<!-- Search Engine -->
<meta name="description" content="Semua kategori bisnis, media pilihan bisnis. Joinjob.id merupakan website yang menyediakan fasilitas pemasaran digital bagi produsen dan distributor">
<meta name="image" content="https://joinjob.id/asset/logo.png">

<!-- Schema.org for Google -->
<meta itemprop="name" content="Semua kategori bisnis, media pilihan bisnis, joinjob.id">
<meta itemprop="description" content="Semua kategori bisnis, media pilihan bisnis. Joinjob.id merupakan website yang menyediakan fasilitas pemasaran digital bagi produsen dan distributor">
<meta itemprop="image" content="https://joinjob.id/asset/logo.png">

<!-- Open Graph general (Facebook, Pinterest & Google+) -->
<meta name="og:title" content="Semua kategori bisnis, media pilihan bisnis, joinjob.id">
<meta name="og:description" content="Semua kategori bisnis, media pilihan bisnis, Joinjob.id merupakan website yang menyediakan fasilitas pemasaran digital bagi produsen dan distributor">
<meta name="og:type" content="article">

<meta property="og:title" content="Semua kategori bisnis, media pilihan bisnis, joinjob.id" />
<meta property="og:url" content="{{ url('product/filter') }}" />
<meta property="og:image" content="https://joinjob.id/asset/logo.png">
<meta property="og:type" content="article" />

@endsection
@section('content')
<style>
.box{ 
    padding:10px;
    margin-bottom:15px;
    text-align:center;
}
.box img{
    border:2px solid #aaa;
    border-radius:15%;
}
.box:hover{
    background:#3AAB9F;
    cursor:pointer;
}
</style>
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
    </div>

    <div class="container"> 
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @foreach($categories as $category)
                        <div class="col-md-3 col-6">
                            <a href="{{ url('category/'.$category->id.'/'.$category->slug) }}">
                                <div class="box">
                                    <img src="https://n7.nextpng.com/sticker-png/884/784/sticker-png-food-icon-grilled-steak-meat-with-sliced-tomato-in-plate-illustration-beef-fruit-barbecue-grill-product.png" alt="{{ $category->name }}" style="max-width:100px;">
                                    <p style="color:#212529;">{{ $category->name }}</p>
                                </div> 
                            </a>
                        </div>
                    @endforeach
                </div> 
            </div>
        </div>
    </div>
@endsection
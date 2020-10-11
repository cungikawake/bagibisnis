@extends('layouts.newapp')
@section('header')
<title>Semua kategori, Join Informasi Antar Provinsi | joinjob.id</title>

<meta name="keywords" content="Semua kategori , Join Informasi Antar Provinsi">
<meta name="title" content="Semua kategori, Join Informasi Antar Provinsi | joinjob.id">
 
<meta name="description" content="Semua kategori , Join Informasi Antar Provinsi. joinjob.id merupakan website yang menyediakan fasilitas pemasaran digital bagi produsen dan distributor">

<link rel="canonical" href="https://joinjob.id/" /> 

<!-- Search Engine -->
<meta name="description" content="Semua kategori , Join Informasi Antar Provinsi. Joinjob.id merupakan website yang menyediakan fasilitas pemasaran digital bagi produsen dan distributor">
<meta name="image" content="https://joinjob.id/asset/logo.png">

<!-- Schema.org for Google -->
<meta itemprop="name" content="Semua kategori, Join Informasi Antar Provinsi, joinjob.id">
<meta itemprop="description" content="Semua kategori , Join Informasi Antar Provinsi. Joinjob.id merupakan website yang menyediakan fasilitas pemasaran digital bagi produsen dan distributor">
<meta itemprop="image" content="https://joinjob.id/asset/logo.png">

<!-- Open Graph general (Facebook, Pinterest & Google+) -->
<meta name="og:title" content="Semua kategori , Join Informasi Antar Provinsi, joinjob.id">
<meta name="og:description" content="Semua kategori , Join Informasi Antar Provinsi. Joinjob.id merupakan website yang menyediakan fasilitas pemasaran digital bagi produsen dan distributor">
<meta name="og:type" content="article">

<meta property="og:title" content="Semua kategori, Join Informasi Antar Provinsi, joinjob.id" />
<meta property="og:url" content="{{ url('product/filter') }}" />
<meta property="og:image" content="https://joinjob.id/asset/logo.png">
<meta property="og:type" content="article" />

@endsection
@section('content')
<!-- Product Catagories-->
<div class="product-catagories-wrapper py-3">
    <div class="container">
        <div class="section-heading">
        <h6 class="ml-1">Join Kategori</h6>
        </div>
        <div class="product-catagory-wrap">
        <div class="row g-3">
            @foreach($categories as $category)
            <!-- Single Catagory Card-->
            <div class="col-md-4">
            <div class="card catagory-card">
                <div class="card-body text-white" style="background:#3bb4c6;">
                    <a href="{{ url('category/'.$category->id.'/'.$category->slug) }}">
                        <img src="{{ asset('asset/'.$category->icon) }}" alt="{{ $category->name }}" style="max-width:100px;">
                        <h4 class="text-white">{{ $category->name }}</h4>
                        <p class="text-white">{{ $category->subtitle }}</p>
                    </a>
                </div>
            </div>
            </div>
            @endforeach
        </div>
        </div>
    </div>
</div> 
@endsection
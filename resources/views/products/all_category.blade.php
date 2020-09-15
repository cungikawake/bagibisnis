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
    border:1px solid #aaa;
    padding:10px;
    margin-bottom:15px;
    text-align:center;
}
.box:hover{
    background:#3AAB9F;
    cursor:pointer;
}
</style>

    <div class="container"> 
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @foreach($categories as $category)
                        <div class="col-md-4 col-6">
                            <a href="{{ url('category/'.$category->id.'/'.$category->slug) }}">
                                <div class="box">
                                    <h3 style="color:#212529;">{{ $category->name }}</h3>
                                </div> 
                            </a>
                        </div>
                    @endforeach
                </div> 
            </div>
        </div>
    </div>
@endsection
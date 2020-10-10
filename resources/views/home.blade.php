@extends('layouts.newapp')
@section('header')
<title>Join Informasi Antar Provinsi | Joinjob.id</title>

<meta name="keywords" content="Join Informasi Antar Provinsi">
<meta name="title" content="Join Informasi Antar Provinsi">
 
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
<meta name="og:title" content="Join Informasi Antar Provinsi | Joinjob.id">
<meta name="og:description" content="Joinjob hadir sebagai tempat berbagi informasi dan
memberikan kemudahan mencari berbagai keperluan anda untuk
melakukan kegiatan interaksi dan transaksi dalam satu media website.">
<meta name="og:type" content="article">

<meta property="og:title" content="Join Informasi Antar Provinsi | Joinjob.id" />
<meta property="og:url" content="https://Joinjob.id/" />
<meta property="og:image" content="https://dibisnis.id/asset/logo.png">
<meta property="og:type" content="article" /> 
@endsection

@section('styles')
 
@endsection

@section('content')
<!-- Top Products-->
<div class="top-products-area clearfix py-3">
    <div class="container">
        <div class="section-heading d-flex align-items-center justify-content-between">
            <h6 class="ml-1">Semua Penawaran - {{ (isset($keyword))? $keyword : '' }}</h6>
            <!-- <a class="btn btn-danger btn-sm" href="shop-grid.html">View All</a> -->
        </div>
        <div class="row g-3">
            @foreach($products as $row) 
            <!-- Single Top Product Card-->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card top-product-card">
                <div class="card-body">
                    <span class="badge badge-success">{{$row->category->name}} </span>
                    <a class="wishlist-btn">
                         
                    </a>
                    <a class="product-thumbnail d-block" href="{{ url('/product/show/' . $row->slug) }}">
                        <?php 
                            $images = explode('|', $row->image);
                        ?>
                        @foreach($images as $key => $image)
                            @if($key == 0)
                                <img class="mb-2" src="{{ asset('storage/products/'.$image) }}" alt="{{$row->category->name}}">
                            @endif
                        @endforeach 
                    </a>
                    <a class="product-title d-block" href="{{ url('/product/show/' . $row->slug) }}">{!! \Illuminate\Support\Str::limit($row->product_name, 50, $end='...') !!}</a>
                    <p class="sale-price">Biaya | Modal Rp. {{number_format($row->modal) }}</p>
                    <div class="product-rating"><i class="fas fa-eye"></i> {{number_format($row->visitor)}} dilihat</div>
                    <hr>
                    <div class="product-rating">
                        {{$row->shop_name}} -  {{$row->tag}}
                    </div>
                    <!-- <a class="btn btn-success btn-sm add2cart-notify" href="#"><i class="lni lni-plus"></i></a> -->
                </div>
                </div>
            </div> 
            @endforeach

            <div class="col-12">
                <hr>
                {{ $products->links() }}
            </div> 
        </div> 

    </div>
</div>
@endsection
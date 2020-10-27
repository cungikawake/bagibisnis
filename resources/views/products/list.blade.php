@extends('layouts.newapp')
@section('header')
<title> Produk Kategori {{ $category->name }}  | joinjob.id</title>
<meta name="keywords" content="Produk Kategori {{ $category->name }}, Join Informasi Antar Provinsi">
<meta name="title" content="Produk Kategori {{ $category->name }}, Join Informasi Antar Provinsi">
 
<meta name="description" content="Produk Kategori {{ $category->name }}, Joinjob hadir sebagai tempat berbagi informasi dan
memberikan kemudahan mencari berbagai keperluan anda untuk
melakukan kegiatan interaksi dan transaksi dalam satu media website.">

<link rel="canonical" href="https://Joinjob.id/" /> 

<!-- Search Engine -->
<meta name="description" content="Produk Kategori {{ $category->name }}, Joinjob hadir sebagai tempat berbagi informasi dan
memberikan kemudahan mencari berbagai keperluan anda untuk
melakukan kegiatan interaksi dan transaksi dalam satu media website.">
<meta name="image" content="https://dibisnis.id/asset/logo.png">

<!-- Schema.org for Google -->
<meta itemprop="name" content="Joinjob.id">
<meta itemprop="description" content="Produk Kategori {{ $category->name }}, Joinjob hadir sebagai tempat berbagi informasi dan
memberikan kemudahan mencari berbagai keperluan anda untuk
melakukan kegiatan interaksi dan transaksi dalam satu media website.">
<meta itemprop="image" content="https://dibisnis.id/asset/logo.png">

<!-- Open Graph general (Facebook, Pinterest & Google+) -->
<!--meta-->
<meta property="og:locale" content="id_ID" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Produk Kategori {{ $category->name }}  - joinjob.id" />
<meta property="og:description" content="@yield('title'), JOINJOB merupakan media untuk melakukan penawaran dengan
bentuk tabel baris. JOINJOB hadir sebagai tempat berbagi informasi dan memberikan kemudahan mencari berbagai keperluan anda untuk
melakukan kegiatan interaksi dalam satu media website." />
<meta property="og:url" content="https://joinjob.id/" />
<meta property="og:site_name" content="joinjob.id" />
<meta property="og:image" content="https://joinjob.id/asset/logo.jpg" />
<meta property="og:image:secure_url" content="https://joinjob.id/asset/logo.jpg" />
<meta property="og:image" content="https://joinjob.id/asset/logo.jpg" />
<meta property="og:image:secure_url" content="https://joinjob.id/asset/logo.jpg" />
<meta property="og:image" content="https://joinjob.id/asset/logo.jpg" />
<meta property="og:image:secure_url" content="https://joinjob.id/asset/logo.jpg" />
<meta property="og:image" content="https://joinjob.id/asset/logo.jpg" />
<meta property="og:image:secure_url" content="https://joinjob.id/asset/logo.jpg" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:description" content="JOINJOB merupakan media untuk melakukan penawaran dengan
bentuk tabel baris. JOINJOB hadir sebagai tempat berbagi informasi dan memberikan kemudahan mencari berbagai keperluan anda untuk
melakukan kegiatan interaksi dalam satu media website." />
<meta name="twitter:title" content="Produk Kategori {{ $category->name }}  - joinjob.id" />
<meta name="twitter:image" content="https://joinjob.id/asset/logo.jpg" />
 
@endsection
@section('content')
<!-- Top Products-->
<div class="top-products-area clearfix py-3">
    <div class="container">
        <div class="section-heading d-flex align-items-center justify-content-between">
            <h6 class="ml-1">Semua Kategori {{ $category->name }}</h6>
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
                                <img class="mb-2" src="{{ asset('storage/products/'.$image) }}" alt="">
                            @endif
                        @endforeach 
                    </a>
                    <a style="min-height:30px;max-height:30px;font-size:12px;" class="product-title d-block" href="{{ url('/product/show/' . $row->slug) }}">{!! \Illuminate\Support\Str::limit($row->name, 50, $end='...') !!}</a>
                    <p class="sale-price">Modal </p>
                    <p class="sale-price">Rp. {{number_format($row->modal) }}</p>

                    <div class="product-rating"><i class="fas fa-eye"></i> {{number_format($row->visitor)}} dilihat</div>
                    <hr>
                    <div class="product-rating" style="text-transform: uppercase;min-height:30px;max-height:30px;">
                        {{$row->member->name}} <i class="fas fa-arrow-right" style="color:#3bb3c4;"></i> {{$row->tag}}
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
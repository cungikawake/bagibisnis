@extends('layouts.newapp')
@section('header')
<title>Join Informasi Antar Provinsi | Joinjob.id</title>

<!--meta-->
<meta name="description" content="Joinjob merupakan media untuk melakukan penawaran dengan bentuk tabel baris. JOINJOB hadir sebagai tempat berbagi informasi dan memberikan kemudahan mencari berbagai keperluan anda untuk melakukan kegiatan interaksi dalam satu media website."/>

<meta property="og:locale" content="id_ID" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Join Informasi Antar Provinsi - joinjob.id" />
<meta property="og:description" content="Joinjob merupakan media untuk melakukan penawaran dengan bentuk tabel baris. JOINJOB hadir sebagai tempat berbagi informasi dan memberikan kemudahan mencari berbagai keperluan anda untuk melakukan kegiatan interaksi dalam satu media website." />
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
<meta name="twitter:description" content="JOINJOB merupakan media untuk melakukan penawaran dengan bentuk tabel baris. JOINJOB hadir sebagai tempat berbagi informasi dan memberikan kemudahan mencari berbagai keperluan anda untuk melakukan kegiatan interaksi dalam satu media website." />
<meta name="twitter:title" content="Join Informasi Antar Provinsi" />
<meta name="twitter:image" content="https://joinjob.id/asset/logo.jpg" />

@endsection

@section('styles')
 
@endsection

@section('content')
<!-- Top Products-->
<div class="top-products-area clearfix py-3">
    <div class="container">
        <div class="section-heading d-flex align-items-center justify-content-between">
            <h6 class="ml-1">Semua Penawaran {{ (isset($keyword))? '- '.$keyword : '' }}</h6>
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
                                <img class="mb-2" src="{{ asset('storage/products/'.$image) }}" alt="{{$row->category->name}}" >
                            @endif
                        @endforeach 
                    </a>
                    <a style="min-height:30px;max-height:30px;font-size:12px;" class="product-title d-block" href="{{ url('/product/show/' . $row->slug) }}">
                    {!! \Illuminate\Support\Str::limit($row->product_name, 30, $end='...') !!}
                    </a>
                    <p class="sale-price">Modal</p>
                    <p class="sale-price">Rp. {{number_format($row->modal) }}</p>
                    <div class="product-rating"><i class="fas fa-eye"></i> {{number_format($row->visitor)}} dilihat</div>
                    <hr>
                    <div class="product-rating" style="text-transform: uppercase;min-height:30px;max-height:30px;">
                        {{$row->shop_name}}  <i class="fas fa-arrow-right" style="color:#3bb3c4;"></i> {{$row->tag}}
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
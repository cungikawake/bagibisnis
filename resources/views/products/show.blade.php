@extends('layouts.prod-app')

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
<!--meta-->
<meta property="og:locale" content="id_ID" />
<meta property="og:type" content="website" />
<meta property="og:title" content="{{ $product->name }} | joinjob.id.id" />
<meta property="og:description" content="{!! \Illuminate\Support\Str::limit(strip_tags($taglessBody), 200,'...')  !!}" />
<meta property="og:url" content="https://joinjob.id/" />
<meta property="og:site_name" content="joinjob.id" />
<meta property="og:image" content="{{ asset('storage/products/'.$images[0]) }}" />
<meta property="og:image:secure_url" content="{{ asset('storage/products/'.$images[0]) }}" />
<meta property="og:image" content="{{ asset('storage/products/'.$images[0]) }}" />
<meta property="og:image:secure_url" content="{{ asset('storage/products/'.$images[0]) }}" />
<meta property="og:image" content="{{ asset('storage/products/'.$images[0]) }}" />
<meta property="og:image:secure_url" content="{{ asset('storage/products/'.$images[0]) }}" />
<meta property="og:image" content="{{ asset('storage/products/'.$images[0]) }}" />
<meta property="og:image:secure_url" content="{{ asset('storage/products/'.$images[0]) }}" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:description" content="{!! \Illuminate\Support\Str::limit(strip_tags($taglessBody), 200,'...')  !!}" />
<meta name="twitter:title" content="{{ $product->name }} | joinjob.id.id" />
<meta name="twitter:image" content="{{ asset('storage/products/'.$images[0]) }}" />


<meta property="og:title" content="{{ $product->name }} | joinjob.id.id" /> 
<meta property="og:image" content="{{ asset('storage/products/'.$images[0]) }}">
<meta property="og:type" content="article" />

@endsection

@section('content')
<style> 
</style>
<!-- Product Slides-->
<div class="product-slides owl-carousel">
    <?php 
        $images = explode('|', $product->image);
    ?>
    @foreach($images as $key => $image)
    <!-- Single Hero Slide-->
    <div class="single-product-slide" style="background-image: url('{{ asset('storage/products/'.$image) }}')"></div>
    @endforeach 
</div>


<!-- Product Title & Meta Data-->
<div class="product-title-meta-data bg-white mb-3 py-3">
    <div class="container d-flex justify-content-between">
        <div class="p-title-price">
            <h6 class="mb-1">{{ $product->name }}</h6>
            <p class="sale-price mb-0" style="font-size:18px; color:#17a2b8;">Biaya | Modal <span>Rp. {{number_format($product->modal)}}</span></p>
        </div>
        <div class="p-wishlist-share dropdown">
            <div data-toggle="dropdown">
                <i class="fas fa-share-alt"></i> Bagikan
            </div>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="https://www.facebook.com/sharer/sharer.php?u={{ url('/product/show/' . $product->slug) }}"><i class="fab fa-facebook"></i> Facebook</a>
                <a class="dropdown-item" href="https://api.whatsapp.com/send?text={{ $product->name  }} %20 {{ url('/product/show/' . $product->slug) }}"><i class="fab fa-whatsapp-square"></i> Whatsapp</a>
            </div>
        </div>
    </div>
    <!-- Ratings-->
    <div class="product-ratings">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="ratings">
            <p><i class="fas fa-eye"></i> {{number_format($product->visitor)}} dilihat</p>
        </div>
        <div class="total-result-of-ratings">
            <i class="fas fa-map-marker-alt"></i> {{$product->tag}} 
        </div>
    </div>
    </div>
</div>

<!-- Flash Sale Panel-->
<div class="flash-sale-panel bg-white mb-3 py-3">
    <div class="container">
    <!-- Sales Offer Content-->
    <div class="sales-offer-content d-flex align-items-end justify-content-between">
        <!-- Sales End-->
        <div class="sales-end">
        <p class="mb-1 font-weight-bold"><i class="fas fa-phone-volume"></i> Hubungi Kami</p>
        <!-- Please use event time this format: YYYY/MM/DD hh:mm:ss-->
        <ul class="sales-end-timer pl-0 d-flex align-items-center" >
            <li>
                <?php 
                    $data = substr($product->member->phone_number, 1);
                    $phone_number = '62'. $data;
                ?> 
                <a href="https://api.whatsapp.com/send?phone={{ $phone_number }}&text=Saya%20tertarik%20untuk%20menjadi%20reseller%20produk%20ini%0A%0A Via%20%20{{ url('/product/show/' . $product->slug) }}">
                    <h6 class="mt-2 text-black" style="margin-left:-5px;"> 
                         {{$phone_number}}
                    </h6>
                </a>
            </li> 
        </ul>
        </div>
        <!-- Sales Volume-->
        <div class="sales-volume text-right">
        <!-- <p class="mb-1 font-weight-bold">82% Sold Out</p>
        <div class="progress" style="height: 6px;">
            <div class="progress-bar bg-warning" role="progressbar" style="width: 82%;" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100"></div> -->
        </div>
        </div>
    </div>
    </div>
</div>

<!-- Product Specification-->
<div class="p-specification bg-white mb-3 py-3">
    <div class="container">
        <h6>Detail Postingan</h6>
        <p>{{ $product->description }} </p>
    </div>
</div>

<!-- Selection Panel-->
<div class="selection-panel bg-white mb-3 py-3">
    <div class="container d-flex align-items-center justify-content-between">
    <!-- Choose Color-->
    <div class="choose-color-wrapper">
        <p class="mb-1 font-weight-bold">Profil</p>
        <div class="choose-color-radio d-flex align-items-center">
            <ul class="pl-0">
                <li class="single-user-review d-flex">
                    <div class="user-thumbnail">
                        <img src="{{ asset('storage/member/'.$product->member->logo) }}" alt="{{ $product->member->name }}" style="border:2px solid #ccc;">
                    </div>
                    <div class="rating-comment">
                    <div class="rating">
                        @if($product->member->type_member == 3)
                        <img src="{{ asset('asset/gold_star.png') }}" alt="joinjob" width="20">
                        @elseif($product->member->type_member == 2)
                        <img src="{{ asset('asset/silver_star.png') }}" alt="joinjob" width="20">
                        @else
                        <img src="{{ asset('asset/brown_star.png') }}" alt="joinjob" width="20">
                        @endif
                    </div>
                    <p class="comment mb-0">{{$product->member->name}}</p>
                    <span class="name-date">{{$product->member->city->name}} | {{$product->member->province->name}}</span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- Choose Size-->
    <div class="choose-size-wrapper text-right">
         
        <div class="choose-size-radio d-flex align-items-center">
            <!-- Single Radio Input-->
            <div class="form-check mb-0 mr-2">
                <a href="{{route('shop_detail', $product->member->shop_name)}}">
                    <button class="btn btn-success">
                        Detail Profil
                    </button> 
                </a>
            </div> 
        </div>
    </div>
    </div>
</div>


<!-- Rating & Review Wrapper-->
<div class="rating-and-review-wrapper bg-white py-3 mb-3">
    <div class="container">
    <h6>Komentar</h6>
    <div class="rating-review-content">
        <ul class="pl-0">
            @foreach($reviews as $review)
            <li class="single-user-review d-flex">
                <div class="user-thumbnail"><img src="{{ asset('storage/member/'.$review->member->logo) }}" alt=""></div>
                <div class="rating-comment">
                    <h6 class="comment mb-0">{{ $review->member->name }}</h6>
                    <div class="rating">
                        @if($review->member->type_member == 3)
                        <img src="{{ asset('asset/gold_star.png') }}" alt="joinjob" width="20">
                        @elseif($review->member->type_member == 2)
                        <img src="{{ asset('asset/silver_star.png') }}" alt="joinjob" width="20">
                        @else
                        <img src="{{ asset('asset/brown_star.png') }}" alt="joinjob" width="20">
                        @endif
                    </div>
                    <p class="comment mb-0">{{ $review->review }}</p>
                    <span class="name-date">{{ $review->created_at }}</span>
                </div>
            </li> 
            @endforeach
        </ul>
    </div>
    </div>
</div>

@guest
@else
<!-- Ratings Submit Form-->
<div class="ratings-submit-form bg-white py-3 mb-5">
    <div class="container">
    <h6>Berikan Komentar</h6>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('member.review') }}" method="POST">
        @csrf
        <input type="hidden" name="product" value="{{ $product->id }}">
        <!-- <div class="stars mb-3">
        <input class="star-1" type="radio" name="star" id="star1">
        <label class="star-1" for="star1"></label>
        <input class="star-2" type="radio" name="star" id="star2">
        <label class="star-2" for="star2"></label>
        <input class="star-3" type="radio" name="star" id="star3">
        <label class="star-3" for="star3"></label>
        <input class="star-4" type="radio" name="star" id="star4">
        <label class="star-4" for="star4"></label>
        <input class="star-5" type="radio" name="star" id="star5">
        <label class="star-5" for="star5"></label><span></span>
        </div> -->
        <textarea class="form-control mb-3" id="comments" name="comment" cols="30" rows="10" data-max-length="200" placeholder="Tulis komentar disini" required></textarea>
        <p class="text-danger">{{ $errors->first('comment') }}</p>
        
        <button class="btn btn-sm btn-primary" type="submit">Kirim Komentar</button>
    </form>
    </div>
</div>
</div>
@endguest
@endsection
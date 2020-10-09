@extends('layouts.app')
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
<style> 
</style>
@endsection

@section('content')
    <div class="container"> 
        <!--slider-->
        <div class="row"> 
            <div  class="carousel slide" data-ride="carousel" style="margin-top: 85px;"> 
                <!--Slides-->
                <div class="carousel-inner" role="listbox">
                    <!--First slide--> 
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ asset('asset/1.jpeg') }}"
                        alt="image Joinjob" style="max-height:500px;">
                    </div>
                    <!--/First slide--> 
                    <!--First slide--> 
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('asset/2.jpeg') }}"
                        alt="image Joinjob" style="max-height:500px;">
                    </div>
                    <!--/First slide--> 
                    <!--First slide--> 
                    <div class="carousel-item  ">
                        <img class="d-block w-100" src="{{ asset('asset/3.jpeg') }}"
                        alt="image Joinjob" style="max-height:500px;">
                    </div>
                    <!--/First slide--> 
                    <!--First slide--> 
                    <div class="carousel-item  ">
                        <img class="d-block w-100" src="{{ asset('asset/4.jpeg') }}"
                        alt="image Joinjob" style="max-height:500px;">
                    </div>
                    <!--/First slide--> 
                    <!--First slide--> 
                    <div class="carousel-item  ">
                        <img class="d-block w-100" src="{{ asset('asset/5.jpeg') }}"
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
                        <h4 class="mt-2" style="color:#3fc7af;">
                            Semua Penawaran
                        </h4>
                        <hr>
                    </div>
                </div>

                
                <div class="row">
                @foreach($products as $row)  
                    <div class="col-6 col-md-6" style="margin-bottom:15px;">
                        <div class="box-product">
                            <h3 class="mt-2 text-black text-center p-14"> 
                                {{$row->category->name}} 
                            </h3>
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
                                <div class="col-md-12 text-center">
                                    <a href="{{ url('/product/show/' . $row->slug) }}" >
                                        <h3 class="product-name p-14">{{ $row->product_name }} </h3>
                                    </a>
                                </div>
                                <div class="col-md-12 dekstop">
                                    <div class="row">
                                        <div class="col-4 text-center">
                                            <h2 class="text-black" style="margin-top:10px;">
                                            <i class="fa fa-tags"></i>
                                            </h2>
                                            <h4 class="mt-1 text-black">Biaya | Modal</h4>
                                        </div>
                                        <div class="col-8">
                                            <h2 class="biaya-modal">Rp. {{number_format($row->modal)}}</h2>
                                        </div>
                                    </div>   
                                </div>

                                <div class="col-md-12 mobile">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <h2 class="text-black p-14" style="margin-top:10px;">
                                            <i class="fa fa-tags"></i>
                                            </h2>
                                            <h4 class="mt-1 text-black p-14">Biaya | Modal</h4>
                                        </div>
                                        <div class="col-12 text-center">
                                            <h2 class="biaya-modal p-18">Rp. {{number_format($row->modal)}}</h2>
                                        </div>
                                    </div>   
                                </div>
                                
                                <div class="col-md-12 text-center">
                                    <h4 class="mt-2 text-black product-shop"> 
                                        {{$row->shop_name}} - {{$row->member->city->name}} | {{$row->member->province->name}}
                                    </h4>
                                </div>
                            </div>
                        </div> 
                    </div> 
                @endforeach
                </div>
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')
@section('header')
<title> Produk Kategori {{ $category->name }}  | joinjob.id</title>
@endsection
@section('content')
    <div class="container" style="margin-top:100px;"> 
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h3 style="color:#212529;">Kategori {{ $category->name }} <span style="font-size:12px;">[ {{ $products->total() }} Item ]</span></h3>
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
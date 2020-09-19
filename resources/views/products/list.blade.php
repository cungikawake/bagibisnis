@extends('layouts.app')
@section('header')
<title>List Produk, media pilihan bisnis  | dibisnis.id</title>
@endsection
@section('content')
    <div class="container"> 
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
                    <div class="col-6 col-md-6" style="padding:2px;">
                        <h4 class="mt-2 text-black">
                            <i class="fas fa-map-marker-alt"></i>
                             {{$row->member->city->name}} - {{$row->member->province->name}}
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
                                    <h4 style="background: #aaaaaa2e;margin-top:5px;padding: 10px;">{{ $row->name }} </h4>
                                </a>
                            </div>
                            <div class="col-md-12">
                                <h4 style="padding: 10px; color:#3fc7af;">Modal Rp. {{number_format($row->modal)}}</h4>
                                <h4 style="padding: 10px; color:#3fc7af;margin-top:-20px;">Provit Rp. {{ number_format($row->provit) }}/{{$row->satuan}}</h4>
                                    
                            </div>
                            <div class="col-md-12">
                                <h4 class="mt-2 text-black" style="background: #aaaaaa2e;margin-top:5px;padding: 10px;">
                                    <i class="fas fa-home"></i>
                                    {{$row->member->name}} - {{$row->member->address}}
                                </h4>
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
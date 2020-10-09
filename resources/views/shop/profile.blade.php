@extends('layouts.app')
@section('header')
<title>Profil {{$member->shop_name}} | dibisnis.id</title>
@endsection
@section('content')
    <div class="container" style="margin-top:100px;"> 
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 text-center">
                        <h3 style="color:#212529;">Detail Profil - {{$member->member_name}}</h3> 
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 text-center">
                        @if($member->logo !='')
                        <p class="text-center">
                            <img class="img-fluid" src="{{ asset('storage/member/'.$member->logo) }}"  style="max-height:150px; border-radius:20%; border:2px solid #3EC7AF;">
                        </p>
                        @else
                        <p class="text-center">
                            <img class="img-fluid" src="https://www.stma.org/wp-content/uploads/2017/10/no-image-icon.png"  style="max-height:150px; border-radius:20%; border:2px solid #3EC7AF;">
                        </p>
                        @endif 
                    </div>
                    <div class="col-8">  
                        <h4 class="mt-2 text-black">
                            <i class="fas fa-user"></i>
                            {{$member->member_name}}
                        </h4>
                         
                        <h4 class="mt-2 text-black">
                            <i class="fas fa-map-marker-alt"></i>
                            {{$member->city_name}} | {{$member->province_name}}
                        </h4>

                        <h4 class="mt-2 text-black">
                            <i class="fab fa-whatsapp"></i>
                            {{$member->phone_number}}
                        </h4>
                        <h4 class="mt-2 text-black">
                            <i class="fas fa-envelope-open"></i>
                            {{$member->email}}
                        </h4>
                    </div>
                </div> 
            </div>
        </div>

          
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @foreach($products as $row)  
                        <div class="col-6 col-md-6" style="padding:2px;">
                            <div class="box" style="border:2px #aaa solid; padding:5px;">
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
                                    <div class="col-md-12 text-center">
                                        <a href="{{ url('/product/show/' . $row->slug) }}" >
                                            <h4 style="margin-top:5px;padding: 10px;">{{ $row->name }} </h4>
                                        </a>
                                    </div> 
                                </div>
                            </div>
                        </div> 
                    @endforeach
                    {{$products->links()}}
                </div>
            </div>
        </div>  
    </div>
@endsection
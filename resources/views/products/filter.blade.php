@extends('layouts.app')
@section('header')
<title>Sortir Modal terendah | joinjob.id</title>


<meta name="keywords" content="Joinjob website yang menyediakan fasilitas pemasaran digital">
<meta name="title" content="Sortir Modal terendah | joinjob.id ">
 
<meta name="description" content="Modal terendah Joinjob.id merupakan website yang menyediakan fasilitas pemasaran digital bagi produsen dan distributor">

<link rel="canonical" href="https://joinjob.id/" /> 

<!-- Search Engine -->
<meta name="description" content="Modal terendah Joinjob.id merupakan website yang menyediakan fasilitas pemasaran digital bagi produsen dan distributor">
<meta name="image" content="https://joinjob.id/asset/logo.png">

<!-- Schema.org for Google -->
<meta itemprop="name" content="Modal terendah, joinjob.id">
<meta itemprop="description" content="Modal terendah Joinjob.id merupakan website yang menyediakan fasilitas pemasaran digital bagi produsen dan distributor">
<meta itemprop="image" content="https://joinjob.id/asset/logo.png">

<!-- Open Graph general (Facebook, Pinterest & Google+) -->
<meta name="og:title" content="Sortir Modal terendah | joinjob.id">
<meta name="og:description" content="Modal terendah, Joinjob.id merupakan website yang menyediakan fasilitas pemasaran digital bagi produsen dan distributor">
<meta name="og:type" content="article">

<meta property="og:title" content="Sortir Modal terendah | joinjob.id" />
<meta property="og:url" content="{{ url('product/filter') }}" />
<meta property="og:image" content="https://joinjob.id/asset/logo.png">
<meta property="og:type" content="article" />

@endsection

@section('content')
    <div class="container"> 
        <!--slider-->
        <div class="row"> 
            <div  class="carousel slide" data-ride="carousel" style="padding-left:15px; padding-right:15px;">
                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                </ul>       
                <!--Slides-->
                <div class="carousel-inner" role="listbox">
                    <!--First slide--> 
                    <div class="carousel-item active  ">
                        <img class="d-block w-100" src="{{ asset('asset/3.jpeg') }}"
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
                        <form action="{{ route('product.filter') }}" id="form_filter">
                            <div class="form-group">
                                <h3><i class="fas fa-filter"></i> Urutkan Modal</h3>
                                <select class="form-control" id="filter_modal" name="modal">
                                    <option value="0">Rp. - 0</option>
                                    <option value="100000">Rp. - 100.000</option>
                                    <option value="500000">Rp. - 500.000</option>
                                    <option value="5000000">Rp. - 5.000.000</option>
                                    <option value="10000000">Rp. - 10.000.000</option>
                                    <option value="10000001">Rp. + 10.000.000</option>
                                </select>
                            </div>
                        </form>
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
@stop
 
@section('script')
<script>
$(document).on('change','#filter_modal',function(){
    $('#form_filter').submit();
});

</script>
@endsection
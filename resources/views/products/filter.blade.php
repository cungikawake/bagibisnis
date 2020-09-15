@extends('layouts.app')
@section('header')
<title>Modal terendah, media pilihan bisnis | joinjob.id</title>


<meta name="keywords" content="Joinjob website yang menyediakan fasilitas pemasaran digital">
<meta name="title" content="Modal terendah Joinjob.id merupakan website yang menyediakan fasilitas pemasaran digital bagi produsen dan distributor">
 
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
<meta name="og:title" content="Modal terendah, joinjob.id">
<meta name="og:description" content="Modal terendah, Joinjob.id merupakan website yang menyediakan fasilitas pemasaran digital bagi produsen dan distributor">
<meta name="og:type" content="article">

<meta property="og:title" content="Modal terendah, joinjob.id" />
<meta property="og:url" content="{{ url('product/filter') }}" />
<meta property="og:image" content="https://joinjob.id/asset/logo.png">
<meta property="og:type" content="article" />

@endsection

@section('content')
    <div class="container"> 
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
                                    <option value="10000001">Rp. 10.000.000 +</option>
                                </select>
                            </div>
                        </form>
                        <hr>
                    </div>
                </div>
                @foreach($products as $row)  
                    <div class="row">
                        <div class="col-md-12 mobile">
                            <p>
                            <a href="{{ url('/product/show/' . $row->slug) }}">
                                <h3 style="margin-top:5px;">{{ $row->product_name }} </h3>
                            </a>
                            </p>
                            <div class="f_p_item">
                                <div class="f_p_img"> 
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
                                                <img class="d-block w-100" src="{{ asset('storage/products/'.$image) }}"
                                                alt="image joinjob" style="max-height:350px;">
                                            </div>
                                            <!--/First slide--> 
                                            @endforeach
                                        </div>
                                        <!--/.Slides--> 
                                    </div> 
                                </div>
                            </div>
                        </div> 
                        <div class="col-md-4"> 
                            <p class="text-center">
                                <img class="img-fluid" src="{{ asset('storage/member/'.$row->logo) }}" alt="{{ $row->name }}" style="max-height:150px; border-radius:20%; border:2px solid #3EC7AF;">
                            </p>
                            
                            <h4 class="mt-2 text-black">
                                <i class="fas fa-home"></i>
                                {{$row->shop_name}}
                            </h4>
                            <h4 class="mt-2 text-black">
                                <i class="fas fa-map-marker-alt"></i>
                                {{$row->address}}
                            </h4>
                            <h4 class="mt-2 text-black">
                                <i class="fa fa-bookmark"></i>
                                {{$row->category->name}}
                            </h4>
                            <h4 class="mt-2 text-black">
                                <?php 
                                    $data = substr($row->phone_number, 1);
                                    $phone_number = '62'. $data;
                                ?>
                                <a href="https://api.whatsapp.com/send?phone={{ $phone_number }}&text=Saya%20tertarik%20untuk%20menjadi%20reseller%20produk%20ini%0A%0A Via%20%20{{ url('/product/show/' . $row->slug) }}" class="btn btn-primary">
                                <i class="fab fa-whatsapp"></i> Pesan Sekarang
                                </a>
                            </h4>
                            <br>
                            <div class="card">
                                <div class="card-body" style="background:#3fc7af;border-radius:10px 10px 0 0;">
                                    <div class="row">
                                        <div class="col-6">
                                            <h5 class="text-black">Modal Bisnis</h5>
                                        </div>
                                        <div class="col-6"> 
                                            <p class="text-black">Rp. {{number_format($row->modal)}}</p>
                                        </div> 
                                    </div>
                                </div>
                                <div class="card-body" style="background:#3fc7af47;">
                                    <div class="row">
                                        <div class="col-6">
                                            <h5 class="text-black">Provit Bisnis</h5>
                                        </div>
                                        <div class="col-6"> 
                                            <p class="text-black">Rp. {{ number_format($row->provit) }}/{{$row->satuan}}</p>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <p class="text-right">	
                                <ul id="share">
                                    <li>   
                                        <a href="{{ url('/product/show/' . $row->slug) }}">
                                            <i class="fas fa-eye"></i> Detail
                                        </a> 
                                    </li>
                                    <li> 
                                        <div class="dropdown">
                                            <p data-toggle="dropdown" id="menu2" class="text-black"><i class="fas fa-share-alt"></i> Bagikan</p>	 
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="https://www.facebook.com/sharer/sharer.php?u={{ url('/product/show/' . $row->slug) }}"><i class="fab fa-facebook"></i> Facebook</a>
                                                <a class="dropdown-item" href="https://api.whatsapp.com/send?text={{ $row->product_name  }} %20 {{ url('/product/show/' . $row->slug) }}"><i class="fab fa-whatsapp-square"></i> Whatsapp</a> 
                                            </div>
                                        </div> 
                                    </li>
                                </ul>
                            </p>
                        </div> 
                        
                        <div class="col-md-8 dekstop">
                            <p>
                                <a href="{{ url('/product/show/' . $row->slug) }}">
                                    <h3 style="margin-top:5px;">{{ $row->product_name }} </h3>
                                </a>
                            </p>
                            <div class="f_p_item">
                                <div class="f_p_img"> 
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
                                                <img class="d-block w-100" src="{{ asset('storage/products/'.$image) }}"
                                                alt="image joinjob" style="max-height:350px;">
                                            </div>
                                            <!--/First slide--> 
                                            @endforeach
                                        </div>
                                        <!--/.Slides--> 
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <div class="col-md-12">
                            <hr>
                        </div>  
                    </div> 
                @endforeach
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
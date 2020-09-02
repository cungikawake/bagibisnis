@extends('layouts.app')
@section('header')
<title>Profil bisnis, media pilihan bisnis | dibisnis.id</title>
@endsection
@section('content')
    <div class="container"> 
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h3 style="color:#212529;">Profil Bisnis Anda</h3>
                        <h4 class="alert alert-warning"><i class="fas fa-info-circle"></i> Masa aktif akun sampai {{ date('d M Y', strtotime(Session::get('user')->exp_date)) }}</h4>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 text-center">
                        @if($member->logo !='')
                        <p class="text-center">
                            <img class="img-fluid" src="{{ asset('storage/member/'.$member->logo) }}"  style="max-height:150px; border-radius:20%; border:2px solid #3EC7AF;">
                        </p>
                        @else
                        <p class="text-center">
                            <img class="img-fluid" src="https://www.stma.org/wp-content/uploads/2017/10/no-image-icon.png"  style="max-height:150px; border-radius:20%; border:2px solid #3EC7AF;">
                        </p>
                        @endif
                        <a href="{{ route('member.edit') }}">
                            <button class="btn btn-primary"> <i class="fas fa-edit"></i> Ubah profile</button>
                        </a>
                    </div>
                    <div class="col-md-8"> 
                        <h4 class="mt-2 text-black">
                            <i class="fas fa-home"></i>
                            {{$member->shop_name}}
                        </h4>
                        <h4 class="mt-2 text-black">
                            <i class="fas fa-user"></i>
                            {{$member->name}}
                        </h4>
                        <h4 class="mt-2 text-black">
                            <i class="fas fa-envelope-open"></i>
                            {{$member->email}}
                        </h4>
                        <h4 class="mt-2 text-black">
                            <i class="fas fa-phone"></i>
                            {{$member->phone_number}}
                        </h4> 
                        <h4 class="mt-2 text-black">
                            <i class="fas fa-map-marker-alt"></i>
                            {{$member->address}}
                        </h4>
                    </div>
                </div> 
            </div>
        </div>

        @if(Session::get('user')->exp_date > date('Y-m-d')) 
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <h3 style="color:#212529;">Postingan Anda</h3>
                        <hr>
                    </div>
                    <div class="col-8 text-right">
                        <a href="{{ route('member.product.create') }}">
                            <button class="btn btn-primary"> <i class="fas fa-plus"></i> Tambahkan produk </button>
                        </a>
                        <hr>
                    </div>
                </div>
                @forelse($products as $row)  
                <div class="row">
                    <div class="col-md-12 mobile">
                        <p>
                        <a href="{{ url('/product/show/' . $row->slug) }}">
                            <h3 style="margin-top:5px;">{{ $row->name }} </h3>
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
                                                alt="image dibisnis" style="max-height:350px;">
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
                        <h4 class="mt-2 text-black">
                            <i class="fa fa-bookmark"></i>
                            {{$row->category->name}}
                        </h4> 
                        <h4 class="mt-2 text-black">
                            <i class="fas fa-eye"></i>
                             {{number_format($row->visitor)}} dilihat
                        </h4>
                        <h4 class="mt-2 text-black">
                            <i class="fas fa-info-circle"></i>
                            Status : {{($row->status == 0)? 'Sedang ditinjau': 'Aktif'}}
                        </h4> 
                        <h4 class="mt-2 text-black">
                            <i class="fas fa-hashtag"></i>
                            {{$row->tag}}
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
                                        <i class="fas fa-edit"></i> Edit
                                    </a> 
                                </li>
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
                                                <a class="dropdown-item" href="https://api.whatsapp.com/send?text={{ $row->name  }} %20 {{ url('/product/show/' . $row->slug) }}"><i class="fab fa-whatsapp-square"></i> Whatsapp</a>
                                        </div>
                                    </div> 
                                </li>
                            </ul>
                        </p>
                    </div> 
                    
                    <div class="col-md-8 dekstop">
                        <p>
                        <a href="{{ url('/product/show/' . $row->slug) }}">
                            <h3 style="margin-top:5px;">{{ $row->name }} </h3>
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
                                                alt="image dibisnis" style="max-height:350px;">
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
                    <div class="clearfix"></div>
                </div>
                    @empty

                    <p>Produk belum tersedia !, Tawarkan bisnis anda</p> 
                </div>
                @endforelse
            </div>
        </div>
        @else
        <div class="alert alert-danger"> Maaf sementara bisnis anda dikunci, karena masa aktif sudah habis. Silahkan menghubungi kami </div>
        @endif
    </div>
@endsection
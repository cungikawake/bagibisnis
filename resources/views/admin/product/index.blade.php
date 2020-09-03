@extends('layouts.admin_app')

@section('content')
    <div class="container"> 
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h3 style="color:#212529;">Produk</span></h3> 
                    </div>
                    <div class="col-12">
                        <form method="get" action="{{ route('admin.product.search') }}">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Cari produk" aria-label="Cari produk" aria-describedby="basic-addon2" name="search" value="{{ (isset($keyword))? $keyword: ''}}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                    </div>
                </div> 
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-12">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

            @foreach($products as $row)  
                <div class="card">
                    <div class="card-body">
                        @if($row->status == 1)
                        <div class="alert alert-success">
                            <p>Produk sudah aktif </p>
                            <a href="{{ route('admin.product.nonactive', $row->id) }}" class="non_aktif">
                                <button class="btn btn-primary">Non Aktifkan</button>
                            </a>
                        </div>
                        @else
                        <div class="alert alert-danger">
                            <p>Produk belum aktif </p>
                            <a href="{{ route('admin.product.active', $row->id) }}" class="aktif">
                                <button class="btn btn-primary">Aktifkan</button>
                            </a>
                        </div>
                        @endif

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
                                <br>
                            </div> 
                            <div class="col-md-4"> 
                                <p class="text-center">
                                    <img class="img-fluid" src="{{ asset('storage/member/'.$row->member->logo) }}" alt="{{ $row->name }}" style="max-height:150px; border-radius:20%; border:2px solid #3EC7AF;">
                                </p>
                                
                                <h4 class="mt-2 text-black">
                                    <i class="fas fa-home"></i>
                                    {{$row->member->shop_name}}
                                </h4>
                                <h4 class="mt-2 text-black">
                                    <i class="fas fa-map-marker-alt"></i>
                                    {{$row->member->address}}
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
                        </div>  
                    </div>
                </div>
            @endforeach

            {{ $products->links() }}

            </div> 
        </div>

    </div>
@endsection

@section('script')
<script>
$(document).ready(function(){
    $('.non_aktif').click(function(){
        var r = confirm("Yakin untuk non aktifkan produk ini !");
        if (r == true) {
            return true;
        }else{
            return false;
        }
    });

    $('.aktif').click(function(){
        var r = confirm("Yakin aktifkan produk ini !");
        if (r == true) {
            return true;
        }else{
            return false;
        }
    });
});
</script>
@endsection
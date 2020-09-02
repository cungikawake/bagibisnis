@extends('layouts.app')

@section('content')
    <div class="container"> 
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h3 style="color:#212529;">Produk Terbaru <span style="font-size:12px;">[ 240 Item ]</span></h3>
                        <hr>
                    </div>
                </div>
                @forelse($products as $row)  
                <div class="row">
                    <div class="col-md-8 mobile">
                        <p>
                        <a href="{{ url('/product/' . $row->slug) }}">
                            <h3 style="margin-top:5px;">{{ $row->name }} </h3>
                        </a>
                        </p>
                        <div class="f_p_item">
                            <div class="f_p_img">
                                <a href="{{ url('/product/' . $row->slug) }}">
                                    <img class="img-fluid" src="https://i.postimg.cc/NM2fYm52/Desain-Baju-Kebaya-Modern.jpg" alt="{{ $row->name }}" style="max-height:300px;">
                                </a>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-4"> 
                        <p class="text-center">
                            <img class="img-fluid" src="https://upload.wikimedia.org/wikipedia/id/thumb/c/cd/Cropped-logo-standupindo.png/200px-Cropped-logo-standupindo.png" alt="{{ $row->name }}" style="max-height:100px; border-radius:10px;">
                        </p>
                        <h4 class="mt-2 text-black">
                            <i class="fas fa-home"></i>
                            PUTU BALI ORIFLAME
                        </h4>
                        <h4 class="mt-2 text-black">
                            <i class="fas fa-map-marker-alt"></i>
                            Jlan siliwangi, br.asd.asd , Denpasar - Bali
                        </h4>
                        <h4 class="mt-2 text-black">
                            <i class="fa fa-bookmark"></i>
                            Pashion Wanita
                        </h4>
                        <br>
                        <div class="card">
                            <div class="card-body" style="background:#3fc7af;">
                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="text-black">Modal Bisnis</h5>
                                    </div>
                                    <div class="col-6"> 
                                        <p class="text-black">Rp. 500.000</p>
                                    </div> 
                                </div>
                            </div>
                            <div class="card-body" style="background:#3fc7af47;">
                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="text-black">Provit Bisnis</h5>
                                    </div>
                                    <div class="col-6"> 
                                        <p class="text-black">Rp. 500.000 /Item</p>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <p class="text-right">	
                            <span class="text-left">
                                <a href="{{ url('/product/' . $row->slug) }}">
                                    Detail Produk
                                </a>
                            </span>
                            |
                            <span class="text-right">
                                <a href="{{ url('/product/' . $row->slug) }}">
                                    Share
                                </a>
                            </span>
                        </p>
                    </div> 
                    
                    <div class="col-md-8 dekstop">
                        <p>
                        <a href="{{ url('/product/' . $row->slug) }}">
                            <h3 style="margin-top:5px;">{{ $row->name }} </h3>
                        </a>
                        </p>
                        <div class="f_p_item">
                            <div class="f_p_img">
                                <a href="{{ url('/product/' . $row->slug) }}">
                                    <img class="img-fluid" src="https://i.postimg.cc/NM2fYm52/Desain-Baju-Kebaya-Modern.jpg" alt="{{ $row->name }}" style="max-height:350px;">
                                </a>
                            </div>
                        </div>
                    </div>  
                    <div class="col-md-12">
                        <hr>
                    </div> 
                    @empty

                    <p>Produk belum tersedia !</p> 
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
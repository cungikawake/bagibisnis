@extends('layouts.user-app')
@section('header')
<title>Profil Akun, Join bisnis antar provinsi | joinjob.id</title>
@endsection
@section('content')
<style>
.user-info-card .user-profile{
    width:100px;
    height:100px;
}
</style>
<div class="container">
    <!-- Profile Wrapper-->
    <div class="profile-wrapper-area py-3">
        <!-- User Information-->
        <div class="card user-info-card" style="background:#f8f8ff;">
            <div class="card-body p-4 d-flex align-items-center">
                <div class="user-profile mr-3">
                    @if(isset($member->logo) && $member->logo !='')
                        <img   src="{{ asset('storage/member/'.$member->logo) }}"  style="max-height:150px; border-radius:50%; border:2px solid #3EC7AF;">
                    @else
                        <img   src="https://www.stma.org/wp-content/uploads/2017/10/no-image-icon.png"  style="max-height:150px; border-radius:50%; border:2px solid #3EC7AF;">
                    @endif
                    <!-- <div class="change-user-thumb">
                        <form>
                            <input class="form-control-file" type="file">
                            <button>
                                @if(isset($member->type_member) && $member->type_member == 3)
                                <img src="{{ asset('asset/gold_star.png') }}" alt="joinjob" width="20">
                                @elseif(isset($member->type_member) && $member->type_member == 2)
                                <img src="{{ asset('asset/silver_star.png') }}" alt="joinjob" width="20"> 
                                @endif
                            </button>
                        </form>
                    </div> -->
                </div>
                <div class="user-info">
                    <h5 class="mb-0">{{$member->member_name}}</h5>
                    <p class="mb-0 text-black"> {{ $member->province_name }}</p> 
                    <p class="mb-0 text-black">{{ $member->phone_number }}</p> 
                    <p class="mb-0 text-black">{{ $member->email }}</p> 
                    <a href="{{ route('member.edit') }}">
                        <button class="btn btn-success">Edit Profil</button>
                    </a>
                    <a href="#">
                        <button class="btn btn-success">Transaksi</button>
                    </a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div> 
            </div>
        </div>  
    </div>
    <div class="alert alert-danger"> 
        <div class="section-heading d-flex align-items-center justify-content-between">
        <p class="ml-1 text-black"><i class="fas fa-warning"></i> NIKMATI GRATIS POSTING SAMPAI AKHIR TAHUN 2020</p>
        <!-- Layout Options-->
        <div class="layout-options">
            <!-- <a href="#" class="active">
                <i class="fas fa-plus"></i> Paket 
            </a> -->
        </div>
        </div>
    </div>
    <!-- Top Products-->
    <div class="top-products-area py-3">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="container">
             
            <div class="section-heading d-flex align-items-center justify-content-between">
                <h6 class="ml-1">All Products</h6>
                <!-- Layout Options-->
                    <div class="layout-options">
                        <a href="{{ route('member.product.create') }}" class="active">
                            <i class="fas fa-plus"></i> Posting 
                        </a>
                    </div>
            </div>

            <div class="row g-3"> 
          
          @foreach($products as $row) 
            <!-- Single Top Product Card-->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card top-product-card">
                <div class="card-body">
                    <span class="badge badge-success">{{$row->category->name}} </span>
                    <a class="wishlist-btn">
                         
                    </a>
                    <a class="product-thumbnail d-block" href="{{ url('/product/show/' . $row->slug) }}">
                        <?php 
                            $images = explode('|', $row->image);
                        ?>
                        @foreach($images as $key => $image)
                            @if($key == 0)
                                <img class="mb-2" src="{{ asset('storage/products/'.$image) }}" alt="joinjob">
                            @endif
                        @endforeach 
                    </a>
                    
                    <a style="min-height:30px;max-height:30px; font-size:12px;" class="product-title d-block" href="{{ url('/product/show/' . $row->slug) }}">{!! \Illuminate\Support\Str::limit($row->name, 30, $end='...') !!}</a> 
                    <p></p>
                    
                    <div class="product-rating"><i class="fas fa-eye"></i> {{number_format($row->visitor)}} dilihat</div> 
                    <div class="product-rating" style="text-transform: uppercase;min-height:30px;max-height:30px;">
                        <i class="fas fa-map-marker-alt"></i> {{$row->tag}}
                    </div>
                    <!-- <a class="btn btn-success btn-sm add2cart-notify" href="#"><i class="lni lni-plus"></i></a> -->
                </div>
                </div>
            </div>  
        @endforeach 

            <div class="col-12">
                <hr>
                {{ $products->links() }}
            </div> 
          </div>
        </div>
    </div>
</div>
@endsection
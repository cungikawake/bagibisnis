@extends('layouts.user-app')
@section('header')
<title>Profil Akun {{ $member->member_name }}, Join bisnis antar provinsi | dibisnis.id</title>
@endsection
@section('content')
<div class="container">
    <!-- Profile Wrapper-->
    <div class="profile-wrapper-area py-3">
        <!-- User Information-->
        <div class="card user-info-card">
            <div class="card-body p-4 d-flex align-items-center">
                <div class="user-profile mr-3">
                    @if($member->logo !='')
                        <img class="img-fluid" src="{{ asset('storage/member/'.$member->logo) }}"  style="max-height:150px; border-radius:50%; border:2px solid #3EC7AF;">
                    @else
                        <img class="img-fluid" src="https://www.stma.org/wp-content/uploads/2017/10/no-image-icon.png"  style="max-height:150px; border-radius:50%; border:2px solid #3EC7AF;">
                    @endif
                    <div class="change-user-thumb">
                        <form>
                            <input class="form-control-file" type="file">
                            <button>
                                @if($member->type_member == 3)
                                <img src="{{ asset('asset/gold_star.png') }}" alt="joinjob" width="20">
                                @elseif($member->type_member == 2)
                                <img src="{{ asset('asset/silver_star.png') }}" alt="joinjob" width="20">
                                @else
                                <img src="{{ asset('asset/brown_star.png') }}" alt="joinjob" width="20">
                                @endif
                            </button>
                        </form>
                    </div>
                </div>
                <div class="user-info">
                    <h5 class="mb-0">{{$member->member_name}}</h5>
                    <p class="mb-0 text-white">{{ $member->city_name }} | {{ $member->province_name }}</p> 
                    <p class="mb-0 text-white">{{ $member->phone_number }}</p> 
                    <p class="mb-0 text-white">{{ $member->email }}</p> 
                     
                </div> 
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
                    <a class="product-title d-block" href="{{ url('/product/show/' . $row->slug) }}">{!! \Illuminate\Support\Str::limit($row->name, 50, $end='...') !!}</a> 
                    <div class="product-rating"><i class="fas fa-eye"></i> {{number_format($row->visitor)}} dilihat</div> 
                    <div class="product-rating">
                        <i class="fas fa-map"></i> {{$row->member->province->name}}
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
@extends('layouts.newapp')
@section('header')
<title>Urutkan Biaya Modal terendah | joinjob.id</title>


<meta name="keywords" content="Joinjob website yang menyediakan fasilitas pemasaran digital">
<meta name="title" content="Urutkan Biaya Modal Terendah | joinjob.id ">
 
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
<!-- Top Products-->
<div class="top-products-area clearfix py-3">
    <div class="container">
        <div class="section-heading d-flex align-items-center justify-content-between"> 
            <form action="{{ route('product.filter') }}" id="form_filter">
                <div class="form-group">
                    <h6 class="ml-1"><i class="fas fa-filter"></i> Urutkan Biaya Terendah</h6>
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
            <!-- <a class="btn btn-danger btn-sm" href="shop-grid.html">View All</a> --> 
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
                                <img class="mb-2" src="{{ asset('storage/products/'.$image) }}" alt="">
                            @endif
                        @endforeach 
                    </a>
                    <a class="product-title d-block" href="{{ url('/product/show/' . $row->slug) }}">{!! \Illuminate\Support\Str::limit($row->product_name, 50, $end='...') !!}</a>
                    <p class="sale-price">Biaya | Modal Rp. {{number_format($row->modal) }}</p>
                    <div class="product-rating"><i class="fas fa-eye"></i> {{number_format($row->visitor)}} dilihat</div>
                    <hr>
                    <div class="product-rating">
                        {{$row->shop_name}} -  {{$row->tag}}
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
@stop
 
@section('script')
<script>
$(document).on('change','#filter_modal',function(){
    $('#form_filter').submit();
}); 
</script>
@endsection
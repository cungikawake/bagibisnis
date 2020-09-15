 
<!--================Hot Deals Area =================-->
<section id="main_menu" class="hot_deals_area section_gap" style="margin-top:30px; padding-bottom:20px;">
    <div class="container" style="background:#3fc7af;vertical-align: middle;  padding:10px;">
        <form action="/product/search" method="GET" id="Search">
            <div class="row"> 
                <div class="col-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-map-marker-alt"></i></span>
                        </div>
                        <select class="form-control" placeholder="Cari provinsi"   aria-describedby="basic-addon1" onChange="search()" name="province">
                            <option value="">Cari provinsi</option>
                            @foreach($provinces as $province)
                                <option value="{{ $province->name }}" @if(isset($province_search) && $province_search == $province->name) selected="selected" @endif>{{ $province->name }}</option>
                            @endforeach
                        </select> 
                    </div>
                </div>
                <div class="col-6"> 
                    <div class="input-group mb-3"> 
                        <input type="text" class="form-control" name="keyword" placeholder="Cari produk bisnis"   aria-describedby="basic-addon2" value="{{ (isset($keyword))? $keyword : '' }}">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2"><i class="fas fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>  
        </form>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-3 text-center main-fitur {{ (Request::segment(1) == null)? 'active': '' }}"  style="padding:10px;">
                <a href="{{route('home')}}">
                    <h2 class="text-black"><i class="fas fa-boxes"></i></h2>
                    <h4 class="mt-1 text-black">Semua Bisnis</h4>
                </a>
            </div>
            <div class="col-3 text-center main-fitur {{ (Request::segment(1) == 'product' && Request::segment(2) == 'filter')? 'active': '' }}"  style="padding:10px;">
                <a href="{{ route('category') }}">
                <a href="{{route('product.filter')}}">
                    <h2 class="text-black"><i class="fa fa-calendar-check-o"></i></h2>
                    <h4 class="mt-1 text-black">Modal Terendah</h4>
                </a>
            </div>
            <div class="col-3 text-center main-fitur {{ (Request::segment(1) == 'category')? 'active': '' }}" style="padding:10px;">
                <a href="{{ route('category') }}">
                    <h2 class="text-black"><i class="fas fa-tasks"></i></h2>
                    <h4 class="mt-1 text-black">Kategori Bisnis</h4>
                </a>
            </div>
            <div class="col-3 text-center main-fitur {{ (Request::segment(2) == 'product' && Request::segment(3) == 'create')? 'active': ''}}"  style="padding:10px;">
                <a href="{{route('member.product.create')}}">
                    <h2 class="text-black"><i class="fas fa-folder-plus"></i></h2>
                    <h4 class="mt-1 text-black">Tawarkan Bisnis</h4>
                </a>
            </div>
        </div>
    </div>
</section>
<!--================End Hot Deals Area =================-->
 
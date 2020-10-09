 
<!--================Hot Deals Area =================-->
<div class="row">
    <div class="col-4 text-center main-fitur {{ (Request::segment(1) == 'category')? 'active': '' }}" style="padding:10px;">
        <a href="{{ route('category') }}">
            <h2 class="text-black"><i class="fas fa-tasks"></i></h2>
            <h4 class="mt-1 text-black">Kategori Bisnis</h4>
        </a>
    </div> 
    <div class="col-4 text-center main-fitur {{ (Request::segment(1) == 'product' && Request::segment(2) == 'filter')? 'active': '' }}"  style="padding:10px;">
        <a href="{{ route('category') }}">
        <a href="{{route('product.filter')}}">
            <h2 class="text-black"><i class="fa fa-tags"></i></h2>
            <h4 class="mt-1 text-black">Biaya | Modal</h4>
        </a>
    </div>
    
    <div class="col-4 text-center main-fitur {{ (Request::segment(2) == 'product' && Request::segment(3) == 'create')? 'active': ''}}"  style="padding:10px;">
        <a href="{{route('member.product.create')}}">
            <h2 class="text-black"><i class="fa fa-pencil-square-o"></i></h2>
            <h4 class="mt-1 text-black">Posting</h4>
        </a>
    </div>
</div>
<!--================End Hot Deals Area =================-->
 
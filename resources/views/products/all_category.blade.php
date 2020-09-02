@extends('layouts.app')
@section('header')
<title>Semua kategori bisnis, media pilihan bisnis | dibisnis.id</title>
@endsection
@section('content')
<style>
.box{
    border:1px solid #aaa;
    padding:10px;
    margin-bottom:15px;
    text-align:center;
}
.box:hover{
    background:#3AAB9F;
    cursor:pointer;
}
</style>

    <div class="container"> 
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @foreach($categories as $category)
                        <div class="col-md-4 col-6">
                            <a href="{{ url('category/'.$category->id.'/'.$category->slug) }}">
                                <div class="box">
                                    <h3 style="color:#212529;">{{ $category->name }}</h3>
                                </div> 
                            </a>
                        </div>
                    @endforeach
                </div> 
            </div>
        </div>
    </div>
@endsection
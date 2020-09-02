@extends('layouts.admin_app')

@section('content')
    <div class="container"> 
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h3 style="color:#212529;">Dashboard</span></h3>
                        <hr>
                    </div>
                </div> 
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h3 style="color:#212529;">Member</span></h3>
                                <h3 style="color:#212529;">{{$member}}</span></h3> 
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h3 style="color:#212529;">Produk</span></h3>
                                <h3 style="color:#212529;">{{$product}}</span></h3> 
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h3 style="color:#212529;">Pendapatan</span></h3>
                                <h3 style="color:#212529;">{{ number_format($total_amount) }}</span></h3> 
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
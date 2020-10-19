@extends('layouts.user-app')
@section('header')
<title>Profil Akun, Join bisnis antar provinsi | joinjob.id</title>
@endsection
@section('content')
<div class="container">
    <!-- Profile Wrapper-->
    <div class="profile-wrapper-area py-3">
        <!-- User Information-->
        <div class="card user-info-card" style="background-color: #f8f8ff;">
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
                            <button>@if(isset($member->type_member) && $member->type_member == 3)
                                <img src="{{ asset('asset/gold_star.png') }}" alt="joinjob" width="20">
                                @elseif(isset($member->type_member) && $member->type_member == 2)
                                <img src="{{ asset('asset/silver_star.png') }}" alt="joinjob" width="20">
                                @else
                                <img src="{{ asset('asset/brown_star.png') }}" alt="joinjob" width="20">
                                @endif</button>
                        </form>
                    </div>
                </div>
                <div class="user-info">
                    <h5 class="mb-0">{{$member->name}}</h5>
                    <p class="mb-0 text-black">{{ (isset($member->city->name))? $member->city->name : '' }} | {{ $member->province->name }}</p> 
                    <p class="mb-0 text-black">{{ $member->phone_number }}</p> 
                    <p class="mb-0 text-black">{{ $member->email }}</p>  
                </div>
            </div>
        </div>  
    </div>

    <!-- Top Products-->
    <div class="top-products-area py-3">
        @if (session('error'))
            <div class="alert alert-success">{{ session('error') }}</div>
        @endif
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6 class="ml-1">Edit Profil</h6>
             
          </div>
            <div class="row g-3">
                <div class="col-12">
                    <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('member.update') }}" enctype="multipart/form-data">
                            @csrf
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            @if($member->logo !='')
                            <p class="text-center">
                                <img class="img-fluid" src="{{ asset('storage/member/'.$member->logo) }}"  style="max-height:150px; border-radius:20%; border:2px solid #3EC7AF;">
                            </p>
                            @else
                            <p class="text-center">
                                <img class="img-fluid" src="https://www.stma.org/wp-content/uploads/2017/10/no-image-icon.png"  style="max-height:150px; border-radius:20%; border:2px solid #3EC7AF;">
                            </p>
                            @endif
                            
                            

                            <div class="form-group row"> 
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Foto Profil') }}</label>

                                <div class="col-md-6">
                                    <input id="logo" type="file" class="form-control @error('logo') is-invalid @enderror" name="logo" value="{{ old('logo', $member->logo) }}"  autocomplete="logo" autofocus>
                                    <small>File gambar *.jpg,*.png</small>
                                    @error('logo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Pengguna') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $member->name) }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Nomor Hp / Whatsapp') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number',$member->phone_number) }}" required autocomplete="phone_number" autofocus>

                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                             
                            
                            <div class="form-group row">
                                <label for="shop_name" class="col-md-4 col-form-label text-md-right">{{ __('Provinsi') }}</label>

                                <div class="col-md-6">
                                    <select id="province" type="text" class="form-control select @error('province') is-invalid @enderror" name="province" required >
                                        <option value="">Pilih Provinsi</option>
                                        @foreach($provinces as $province )
                                            <option value="{{ $province->id }}" @if($province->id == $member->province_id) selected @endif>{{ $province->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('province')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                             
                            <hr>
                            
                            <div class="form-group row">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Selesai
                                </button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
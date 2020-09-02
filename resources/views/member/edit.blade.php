@extends('layouts.app')
@section('header')
<title>Ubah profil bisnis | dibisnis.id</title>
@endsection

@section('content')
<link rel="stylesheet" href="https://selectize.github.io/selectize.js/css/selectize.bootstrap3.css" data-theme="bootstrap3">
<style>

.selectize-dropdown-content{
			background:#aaa;
		}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ubah Profil Bisnis') }}</div>

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
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Logo Bisnis') }}</label>

                            <div class="col-md-6">
                                <input id="logo" type="file" class="form-control @error('logo') is-invalid @enderror" name="logo" value="{{ old('logo', $member->logo) }}"  autocomplete="logo" autofocus>

                                @error('logo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Pemilik') }}</label>

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
                            <label for="shop_name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Bisnis Usaha') }}</label>

                            <div class="col-md-6">
                                <input id="shop_name" type="text" class="form-control @error('shop_name') is-invalid @enderror" name="shop_name" value="{{ old('shop_name',$member->shop_name) }}" required autocomplete="shop_name" autofocus>

                                @error('shop_name')
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
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Alamat Usaha') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address',$member->address) }}" required autocomplete="address" autofocus>

                                @error('address')
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
                        <div class="form-group row">
                            <label for="shop_name" class="col-md-4 col-form-label text-md-right">{{ __('Kabupaten/Kota') }}</label>

                            <div class="col-md-6">
                                <select id="city" type="text" class="form-control select @error('city') is-invalid @enderror" name="city" required >
                                    <option value="">Pilih Kabupaten</option>
                                    @foreach($cities as $city )
                                        <option value="{{ $city->id }}" @if($city->id == $member->city_id) selected @endif >{{ $city->name }}</option>
                                    @endforeach
                                </select>

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <hr>
                         

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4"> 
                            <p><small>Saya  menyetujui seluruh <a href="#">syarat & ketentuan</a> sistem.</small></p>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Simpan') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



@section('script')
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script src="https://selectize.github.io/selectize.js/js/selectize.js"></script>
    <script>
        //CKEDITOR.replace('description');
        $(document).ready(function(){
            $('.select').selectize();
        });
    </script>
@endsection
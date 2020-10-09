@extends('layouts.app')
@section('header')
<title>Free Sign-Up| joinjob.id</title>
@endsection
@section('content')
<div class="container" style="margin-top:100px;"> 
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="text-center" style="width: 100%; color:#d97e3f;">
                        <h2>{{ __('Free Sign-Up') }}</h2>
                    </div>
                </div>

                <div class="card-body"> 
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        <div class="form-group row"> 
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="{{ __('Nama Pengguna') }}">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         
                        <div class="form-group row"> 
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('E-Mail') }}">
                                <small>Email akan digunakan untuk masuk ke bisnis anda</small>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row"> 
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{ __('Kata Sandi') }}">
                                <small>Minimal 8 digit</small>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row"> 
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Konfirmasi Sandi') }}">
                            </div>
                        </div>

                        <div class="form-group row" style="background:#61989b;">
                            <div class="col-md-12 text-white" style="padding-top:15px;">
                                <input type="checkbox" name="aggree" required>
                                <small>Dengan Membuat Akun JOINJOB, Saya Setuju</small>
                                <p><small>Dengan <a href="#">Syarat & Ketentuan</a> Dan <a href="#">Kebijakan Privacy</a>.</small></p>
                                
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Daftar') }}
                        </button>

                        <a href="/login">
                        <button type="button" class="btn btn-danger">
                            {{ __('Login') }}
                        </button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

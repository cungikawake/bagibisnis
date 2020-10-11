@extends('layouts.user-app')
@section('header')
<title>FAQ JOINJOB | joinjob.id</title>
@endsection
@section('content')
    <div class="container"> 
    <!-- Profile Wrapper-->
    <div class="profile-wrapper-area py-3">
        <div class="card">
             <div class="card-body">
                <h1 class="text-center" style="color:#3bb3c4;"><u>FAQ</u></h1>
                <h3 class="text-center" style="color:#3bb3c4;">JOINJOB</h3>
                <div class="user-profile mr-3">
                    <div class="dropdown">
                        <p class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Apa Itu Joinjob.id ?
                        </p>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="/about_us">Tentang Kami</a>
                            <a class="dropdown-item" href="/about_us#tujuan_kami">Tujuan Kami</a>
                            <a class="dropdown-item" href="/about_us#konsep_kami">Konsep Kami</a>
                            <a class="dropdown-item" href="/about_us#hubungi_kami">Hubungi Kami</a>
                        </div>
                    </div> 
                    <br>
                    <div class="dropdown">
                        <p class="dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Bagaimana Ketentuan & Privacy Di Joinjob.id ?
                        </p>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                            <a class="dropdown-item" href="{{ route('term_condition') }}">Syarat & Ketentuan</a>
                            <a class="dropdown-item" href="/term_condition#ketentuan">Kebijakan & Privacy</a> 
                        </div>
                    </div> 
                </div>
             </div>
        </div> 
    </div>
    </div>
@endsection
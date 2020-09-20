@extends('layouts.app')
@section('header')
<title>Tutorial | joinjob.id</title>
@endsection
@section('content')
    <div class="container"> 
        <div class="card">
             <div class="card-body">
                <h1 class="text-center"><u>FAQ</u></h1>
                <h3 class="text-center">JOINJOB</h3>

                <div class="dropdown">
                    <h4 class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Apa Itu Joinjob.id ?
                    </h4>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="/term_condition#about">Tentang Kami</a>
                        <a class="dropdown-item" href="/term_condition#about">Tujuan Kami</a>
                        <a class="dropdown-item" href="/term_condition#about">Konsep Kami</a>
                        <a class="dropdown-item" href="/term_condition#about">Hubungi Kami</a>
                    </div>
                </div> 
                <br>
                <div class="dropdown">
                    <h4 class="dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Bagaimana Ketentuan & Privacy Di Joinjob.id ?
                    </h4>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                        <a class="dropdown-item" href="{{ route('term_condition') }}">Syarat & Ketentuan</a>
                        <a class="dropdown-item" href="/term_condition#ketentuan">Kebijakan & Privacy</a> 
                    </div>
                </div> 
             </div>
        </div> 
    </div>
@endsection
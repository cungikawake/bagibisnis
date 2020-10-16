@extends('layouts.user-app')
@section('header')
<title>Paket Join Member, Join bisnis antar provinsi | joinjob.id</title>
@endsection
@section('content') 
 
<div class="container">
    <!-- Notifications Area-->
    <div class="notification-area pt-3 pb-2">
        <h6 class="pl-1">Paket Join Member</h6>
        <div class="list-group"> 
            <!-- Single Notification-->
            <a class="list-group-item d-flex align-items-center" href="{{ route('member.profile') }}"><span class="noti-icon"><i class="fas fa-key"></i></span>
            <div class="noti-info">
                <h6 class="mb-0">NIKMATI GRATIS POSTING SAMPAI AKHIR TAHUN 2020</h6>
            </div>
            </a> 
            <p>Selamat Datang Di Fitur Join Member.</p>
            <p style="margin-top:-10px;">Join Member Memudahkan Anda Melakukan Posting Penawaran Di Provinsi Lain. Sesuai Paket Yang Dipilih.</p>
            <p style="margin-top:-10px;">Lakukan Berbagai Penawaran Menarik Tanpa Batas.</p>
            
            <h3>Pilih Paket Join Member</h3>
            <!-- Single Notification-->
            <div class="list-group-item d-flex align-items-center">
                <span class="noti-icon">
                    <input type="radio" name="paket" value="2"> 
                </span>
                <div class="noti-info">
                    <h6>SILVER</h6>
                    <img src="{{ asset('asset/silver_star.png') }}" alt="start silver" width="30">
                </div>
                <div class="noti-info ml-5">
                    <h6>20 Posting</h6>
                    <p>Aktif 30.Hari</p>
                </div>
                <div class="noti-info ml-5">
                    <h6>Rp. 15.000</h6> 
                </div>
            </div> 
            <!-- Single Notification-->
            <div class="list-group-item d-flex align-items-center">
                <span class="noti-icon">
                    <input type="radio" name="paket" value="3"> 
                </span>
                <div class="noti-info">
                    <h6>GOLD</h6>
                    <img src="{{ asset('asset/gold_star.png') }}" alt="start gold" width="30">
                </div>
                <div class="noti-info ml-5">
                    <h6>Unlimited Posting</h6>
                    <p>Aktif 30.Hari</p>
                </div>
                <div class="noti-info ml-5">
                    <h6>Rp. 25.000</h6> 
                </div>
            </div>
            <h3>Pilih Metode Pembayaran</h3>
            <!-- Single Notification-->
            <div class="list-group-item d-flex align-items-center">
                <span class="noti-icon">
                    <input type="radio" name="method" value="atm"> 
                </span>
                <div class="noti-info"> 
                    <img src="{{ asset('asset/bank.png') }}" alt="start silver" width="30">
                </div>
                <div class="noti-info ml-5">
                    <h6>ATM | Bank Transfer</h6>
                    <p>Bayar di ATM Bersama Prima atau Alto </p>
                </div> 
            </div> 
            <!-- Single Notification-->
            <div class="list-group-item d-flex align-items-center">
                <span class="noti-icon">
                    <input type="radio" name="method" value="indomaret"> 
                </span>
                <div class="noti-info"> 
                    <img src="{{ asset('asset/indomaret.png') }}" alt="start silver" width="30">
                </div>
                <div class="noti-info ml-5">
                    <h6>Indomaret</h6>
                    <p>Gunakan kode pembayaran, dan Bayar Di Indomaret</p>
                </div> 
            </div>
            <!-- Single Notification-->
            <div class="list-group-item d-flex align-items-center">
                <span class="noti-icon">
                    <input type="radio" name="method" value="alfamart"> 
                </span>
                <div class="noti-info"> 
                    <img src="{{ asset('asset/alfamart.png') }}" alt="start silver" width="30">
                </div>
                <div class="noti-info ml-5">
                    <h6>Alfamart</h6>
                    <p>Lakukan Pembayaran Di Alfamart terdekat</p>
                </div> 
            </div> 
            <button class="form-control btn btn-success">Proses Pembayaran</button> 
        </div>
    </div>
    </div>
@endsection
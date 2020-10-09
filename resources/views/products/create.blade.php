@extends('layouts.app')
@section('header')
<title>Penawaran produk baru, media pilihan bisnis | dibisnis.id</title>
@endsection
@section('content')
<link rel="stylesheet" href="https://selectize.github.io/selectize.js/css/selectize.bootstrap3.css" data-theme="bootstrap3">


    <div class="container" style="margin-top:100px;"> 

        @include('layouts.main-menu')
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h3 style="color:#212529;">Tulis Penawaran</h3>
                        <h4 class="alert alert-warning"><i class="fas fa-info-circle"></i> Masa aktif akun sampai {{ date('d M Y', strtotime(Session::get('user')->exp_date)) }}</h4>
                        <hr>
                    </div>
                </div>
                <form action="{{ route('member.product.store') }}" method="post" enctype="multipart/form-data" >
                @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card"> 
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Judul Penawaran</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                        <small>Maximal 50 huruf</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Biaya | Modal</label>
                                        <input type="number" name="modal" class="form-control" value="{{ old('modal') }}" required placeholder="contoh : 50000">
                                        <p class="text-danger">{{ $errors->first('modal') }}</p>
                                         
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">Kategori</label>
                                        <select name="category_id" class="form-control">
                                            <option value="">Pilih</option>
                                            @foreach ($category as $row)
                                            <option value="{{ $row->id }}" {{ old('category_id') == $row->id ? 'selected':'' }}>{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                        <p class="text-danger">{{ $errors->first('category_id') }}</p>
                                    </div> 
                                    <div class="form-group">
                                        <label for="name">Provinsi Tujuan</label>
                                        <input type="text" id="tag" name="tag" class="form-control" value="{{ old('tag') }}" required placeHolder="contoh : Dki Jakarta, Yogyakarta, Medan, Sumatra Utara, Bali">
                                        <p class="text-danger">{{ $errors->first('tag') }}</p>
                                        <small>Pisahkan dengan tanda koma (,)</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Keterangan</label>
                                        <textarea name="description" id="description" class="form-control" style="height: 150px;">{{ old('description') }}</textarea>
                                        <p class="text-danger">{{ $errors->first('description') }}</p>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="image">Foto Produk</label>
                                        <input type="file" name="image[]" class="form-control" value="{{ old('image') }}" required>
                                        <input type="file" name="image[]" class="form-control" value="{{ old('image') }}" required>
                                        <input type="file" name="image[]" class="form-control" value="{{ old('image') }}" required>
                                         
                                        @foreach($errors->all() as $error)
                                            @if($error=="Sorry! Maximum allowed size for an image is 2MB")
                                                    <span class="help-block"><strong>{{$error}}</strong></span>
                                            @endif
                                        @endforeach
                                        <small>Ukuran gambar max 1Mb</small>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-sm">POSTING</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                         
                    </div>
                </form>
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
            $('#tag').selectize({
                delimiter: ',',
                persist: false,
                create: function(input) {
                    return {
                        value: input,
                        text: input
                    }
                }
            });
        });
    </script>
@endsection
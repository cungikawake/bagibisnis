@extends('layouts.user-app')
@section('header')
<title>Penawaran produk baru, media pilihan bisnis | joinjob.id</title>
@endsection
@section('content')
<link rel="stylesheet" href="https://selectize.github.io/selectize.js/css/selectize.bootstrap3.css" data-theme="bootstrap3">

<!-- Product Catagories-->
<div class="product-catagories-wrapper py-3">
    <div class="container">
        <div class="section-heading">
        <h6 class="ml-1">Tulis Penawaran</h6>
        </div>
        <div class="product-catagory-wrap">
            <div class="row g-3">
                <h6 class="alert alert-warning"><i class="fas fa-info-circle"></i>TULIS PENAWARAN KHUSUS BALI</h6> 
            </div> 
            <form action="{{ route('member.product.store') }}" method="post" enctype="multipart/form-data" >
            @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card"> 
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Judul Penawaran</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required placeholder="Saya ingin..."> 
                                    <small style="margin-top:-10px;">Maximal 50 huruf</small>
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="price">Budget</label>
                                    <input type="number" name="modal" class="form-control" value="{{ old('modal') }}" required placeholder="contoh : 50000">
                                    <small>Tulis angka tanpa spasi</small>
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
                                    <label for="name">Provinsi Khusus Bali</label>
                                    <select name="tag" class="form-control">
                                        <option value="Bali">BALI</option>
                                        <!-- @foreach ($provinces as $row)
                                        <option value="{{ $row->name }}" {{ old('tag') == $row->name ? 'selected':'' }}>{{ $row->name }}</option>
                                        @endforeach -->
                                    </select> 
                                    <small>Tawarkan di provinsi bali.</small>
                                    <p class="text-danger">{{ $errors->first('tag') }}</p>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="description">Keterangan</label>
                                    <textarea name="description" id="description" class="form-control" style="height: 150px;">{{ old('description') }}</textarea>
                                    <p class="text-danger">{{ $errors->first('description') }}</p>
                                </div>
                                
                                <div class="form-group">
                                    <label for="image">Foto Produk</label>
                                    <input type="file" name="image[]" class="form-control" value="{{ old('image') }}" required>
                                    <input type="file" name="image[]" class="form-control" value="{{ old('image') }}" >
                                    <input type="file" name="image[]" class="form-control" value="{{ old('image') }}" >
                                        
                                    @foreach($errors->all() as $error)
                                        @if($error=="Sorry! Maximum allowed size for an image is 2MB")
                                                <span class="help-block"><strong>{{$error}}</strong></span>
                                        @endif
                                    @endforeach
                                    <small>Ukuran gambar masing-masing max 2Mb</small>
                                </div>
                                <div class="form-group text-center">
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
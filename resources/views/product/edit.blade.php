@extends('layouts.template')

@section('title')
Edit Data Produk
@endsection

@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        @include('alert.error')       
                    </div>
                    <div class="box-body">
                             <form class="form-horizontal" method="post" action="{{ route('product.update',[$product->kd_produk]) }}" enctype="multipart/form-data">
                                <div class="box-body">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                    <div class="form-group">
                                        <label for="nama_produk" class="col-sm-2 control-label">Nama Produk</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{ $product->nama_produk }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="kd_kategori" class="col-sm-2 control-label">Kategori Barang</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="kd_kategori" name="kd_kategori">
                                                @foreach($category as $row) 
                                                    <option value="{{ $row->kd_kategori }}" @if($product->kd_kategori == $row->kd_kategori)  selected @endif>{{ $row->kategori}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="harga" class="col-sm-2 control-label">Harga Produk</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="harga" name="harga" value="{{ $product->harga }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="image" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-10">
                                        <img src="{{ asset('uploads/'.$product->img_produk) }}" class="img-thumbnail" width="100px" height="100px" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="img_produk" class="col-sm-2 control-label">Image Produk</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" id="img_produk" name="img_produk" value="{{ old('img_produk') }}">
                                        </div>
                                    </div>                           
                               
                                </div>
                             
                                <div class="box-footer">
                                    <button type="submit" name="tombol" class="btn btn-info pull-right">Save</button>
                                </div>
                                <!-- /.box-footer -->
                            </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
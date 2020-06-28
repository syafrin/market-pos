@extends('layouts.template')

@section('title')
Create Produk
@endsection

@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        @include('alert.error')       
                    </div>
                            <form class="form-horizontal" method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                                <div class="box-body">
                                {{ csrf_field() }}
                    
                                    <div class="form-group">
                                        <label for="nama_produk" class="col-sm-2 control-label">Nama Produk</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{ old('nama_produk') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="kd_kategori" class="col-sm-2 control-label">Kategori Barang</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="kd_kategori" name="kd_kategori">
                                                @foreach($category as $row) 
                                                    <option value="{{ $row->kd_kategori }}" >{{ $row->kategori}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="harga" class="col-sm-2 control-label">Harga Produk</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga') }}">
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
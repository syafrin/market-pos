@extends('layouts.template')

@section('title')
Create Transaski
@endsection

@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        @include('alert.error')       
                    </div>
                            <form class="form-horizontal" method="post" action="{{ route('transaction.store') }}" enctype="multipart/form-data">
                                <div class="box-body">
                                {{ csrf_field() }}
                    
                                    <div class="form-group">
                                        <label for="kd_produk" class="col-sm-2 control-label">Nama Produk</label>
                                        <div class="col-sm-10">
                                           <select class="form-control" id="kd_produk" name="kd_produk">
                                                @foreach($product as $row) 
                                                    <option value="{{ $row->kd_produk }}" >{{ $row->nama_produk}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="kd_supplier" class="col-sm-2 control-label">Suppier</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="kd_supplier" name="kd_supplier">
                                                @foreach($supplier as $row) 
                                                    <option value="{{ $row->kd_supplier }}" >{{ $row->nama_supplier}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_transaksi" class="col-sm-2 control-label">Tanggal Transaksi</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control datepicker" id="tgl_transaksi" name="tgl_transaksi" value="{{ old('tgl_transaksi') }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah" class="col-sm-2 control-label">Jumlah</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ old('jumlah') }}" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="harga" class="col-sm-2 control-label">Harga</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga') }}">
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
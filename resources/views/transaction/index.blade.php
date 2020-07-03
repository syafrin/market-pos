@extends('layouts.template')
@section('title')
    Data Transaksi Masuk
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
            @if(Request::get('keyword'))
                    <a href="{{ route('transaction.index') }}" class="btn btn-success">Back</a>
            @else
                    <a href="{{ route('transaction.create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Create</a>
            @endif 
 
           
            </div>
            <div class="box-body">
            @if(Request::get('keyword'))
                    <div class="alert alert-success alert-block">
                        Hasil Pencarian Produk : <b>{{ Request::get('keyword') }}</b>
                    </div>
            @endif
            <!-- @if(Request::get('kd_kategori'))
                    <div class="alert alert-success alert-block">
                        Hasil Pencarian Produk dengan Kategori : <b>{{ $nama_kateg }}</b>
                    </div>
            @endif -->
            @include('alert.success');
                    <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="5%"> no</th>
                            <th>produk</th>
                            <th>supplier</th>
                            <th>tanggal transaksi</th>
                            <th>jumlah</th>
                            <th>harga</th>
                            <th width="30%">action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($transaction as $row)
                        <tr>
                            <td>{{ $loop->iteration + ($transaction->perpage() * ($transaction->currentPage() - 1))}}</td>
                            <td>{{ $row->product->nama_produk }}</td>
                            <td>{{ $row->supplier->nama_supplier }}</td>
                            <td>{{ $row->tgl_transaksi}}</td>
                            <td>{{ $row->jumlah}}</td>
                            <td>@rupiah($row->harga)</td>
                            <td> 
                            <form method="post" action="{{ route('transaction.destroy', [$row->kd_transaksi])}}" onsubmit="return confirm('yakin akan mengubah data ini ?')">
                                @csrf
                                {{ method_field('DELETE') }}
                    
                                <button type="submit" class="btn btn-danger">
                                    Delete
                                </button>                           
                            </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                    {{ $transaction->appends(Request::all())->links() }}
            </div>
          </div>
        </div>
</div>
@endsection
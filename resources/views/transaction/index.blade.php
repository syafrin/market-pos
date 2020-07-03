@extends('layouts.template')
@section('title')
    Data Transaksi Masuk
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
            @if(Request::get('start_date') != '' && Request::get('end_date') != '')
            <a href="{{ route('transaction.index')}}" class="btn btn-success">back</a>
            @else
            <a href="{{ route('transaction.create')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Create</a>
            </div>
            @endif
            <br/><br/>
            <form method="get" action="{{ route('transaction.index') }}">
                <div class="form-group">
                    <label for="nama_produk" class="col-sm-2 control-label">Search By Date</label>
                    <div class="col-sm-4">
                        <input type="text" name="start_date" placeholder="Start Date" class="form-control datepicker" readonly />
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="end_date" placeholder="End Date" class="form-control datepicker" readonly />
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>
                    </div>
                </div>
            </form>
            </div>
            <div class="box-body">
            @if(Request::get('start_date') != '' && Request::get('end_date') != '')
                    <div class="alert alert-success alert-block">
                        Hasil Pencarian Transaksi Masuk DAri Tanggal : <b>{{ $start }} s/d {{ $end }}</b>
                    </div>
            @endif
           
            @include('alert.success')
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
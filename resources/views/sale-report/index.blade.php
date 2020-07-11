@extends('layouts.template')
@section('title')
Data Agent
@endsection

@section('content')

<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
                  <a href="{{ route('export-pdf') }}" class="btn btn-success" target="_blank">export pdf</a>        
                  <a href="{{ route('export-excel') }}" class="btn btn-warning" target="_blank">export excel</a>        
            </div>
            <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th widht="5%">No</th>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                 <th>total</th>
                                <th>Tanggal</th>
                                <th>Agen</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($penjualan as $row)
                                <tr>
                                    <td>{{ $loop->iteration + ($penjualan->perPage() * ($penjualan->currentPage()- 1 )) }}</td>
                                    <td>{{ $row->product->nama_produk }}</td>   
                                    <td>{{ $row->jumlah }}</td>   
                                    <td>@rupiah($row->harga)</td>   
                                     <td>@rupiah($row->transaction->total)</td>
                                    <td>{{ $row->transaction->tgl_penjualan }}</td>   
                                    <td>{{ $row->transaction->agent->nama_toko }}</td>   
                                       
                                </tr>
                            @endforeach
                                
                        </tbody>
                    </table>
                    {{ $penjualan->links() }}
                    <br/>
                    
            </div>
          </div>
        </div>
</div>
@endsection
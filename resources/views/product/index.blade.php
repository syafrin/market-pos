@extends('layouts.template')
@section('title')
    Data Produk
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
            @if(Request::get('keyword'))
                    <a href="{{ route('product.index') }}" class="btn btn-success">Back</a>
            @else
                    <a href="{{ route('product.create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Create</a>
            @endif

                   <form method="get" action="{{route('product.index')}}">
                        <div class="form-group">
                        <label for="keyword" class="col-sm-2 control-label">Search By Name</label>
                        <div class="col-sm-4">
                             <input type="text" class="form-control" id="keyword" name="keyword" value="{{Request::get('keyword')}}">
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>
                        </div>
                        </div>
                    </form><br/><br/>         
                   <form method="get" action="{{route('product.index')}}">
                        <div class="form-group">
                        <label for="kd_kategori" class="col-sm-2 control-label">Search By Kategori</label>
                        <div class="col-sm-4">
                           
                             <select name="kd_kategori" class="form-control" id="kd_kategori">
                                @foreach($category as $k)
                                    <option value="{{ $k->kd_kategori}}" >{{ $k->kategori }}</option>
                                @endforeach
                           </select>
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>
                        </div>
                        </div>
                    </form>         
            </div>
            <div class="box-body">
            @if(Request::get('keyword'))
                    <div class="alert alert-success alert-block">
                        Hasil Pencarian Produk : <b>{{ Request::get('keyword') }}</b>
                    </div>
            @endif
            @if(Request::get('kd_kategori'))
                    <div class="alert alert-success alert-block">
                        Hasil Pencarian Produk dengan Kategori : <b>{{ $nama_kateg }}</b>
                    </div>
            @endif
            @include('alert.success');
                    <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="5%"> no</th>
                            <th>nama produk</th>
                            <th>kategori</th>
                            <th>harga</th>
                            <th>image</th>
                            <th>stok</th>
                            <th width="30%">action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($product as $row)
                        <tr>
                            <td>{{ $loop->iteration + ($product->perpage() * ($product->currentPage() - 1))}}</td>
                            <td>{{ $row->nama_produk }}</td>
                            <td>{{ $row->category->kategori }}</td>
                            <td>@rupiah($row->harga)</td>
                            <td><img class="img-thumbnail" src="{{ asset('uploads/'.$row->img_produk)}}" width="100" height="100"/></td>
                            <td>{{ $row->stok }}</td>
                            <td> 
                            <form method="post" action="{{ route('product.destroy', [$row->kd_produk])}}" onsubmit="return confirm('yakin akan mengubah data ini ?')">
                                @csrf
                                {{ method_field('DELETE') }}
                                <a href="{{ route('product.edit', [$row->kd_produk])}}" class="btn btn-warning" >edit</a>
                                <button type="submit" class="btn btn-danger">
                                    Delete
                                </button>                           
                            </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                    {{ $product->appends(Request::all())->links() }}
            </div>
          </div>
        </div>
</div>
@endsection
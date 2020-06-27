@extends('layouts.template')
@section('title')
    Data Kategori
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
            @if(Request::get('keyword'))
                    <a href="{{ route('category.index') }}" class="btn btn-success">Back</a>
            @else
                    <a href="{{ route('category.create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Create</a>
            @endif
                   <form method="get" action="{{route('category.index')}}">
                        <div class="form-group">
                        <label for="keyword" class="col-sm-2 control-label">Search By Name</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="keyword" name="keyword" value="{{Request::get('keyword')}}">
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
                        Hasil Pencarian Kategori Barang : <b>{{ Request::get('keyword') }}</b>
                    </div>
            @endif
            @include('alert.success');
                    <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="5%"> no</th>
                            <th>kategori</th>
                            <th>image</th>
                            <th width="30%">action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($category as $row)
                        <tr>
                            <td>{{ $loop->iteration + ($category->perpage() * ($category->currentPage() - 1))}}</td>
                            <td>{{ $row->kategori }}</td>
                            <td><img class="img-thumbnail" src="{{ asset('uploads/'.$row->image)}}" width="100" height="100"/></td>
                            <td> 
                            <form method="post" action="{{ route('category.destroy', [$row->kd_kategori])}}" onsubmit="return confirm('yakin akan mengubah data ini ?')">
                                @csrf
                                {{ method_field('DELETE') }}
                                <a href="{{ route('category.edit', [$row->kd_kategori])}}" class="btn btn-warning" >edit</a>
                                <button type="submit" class="btn btn-danger">
                                    Delete
                                </button>                           
                            </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                    {{ $category->appends(Request::all())->links() }}
            </div>
          </div>
        </div>
</div>
@endsection
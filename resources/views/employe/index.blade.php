@extends('layouts.template')
@section('title')
    Data Pegawai
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
            @if(Request::get('keyword'))
                    <a href="{{ route('employe.index') }}" class="btn btn-success">Back</a>
            @else
                    <a href="{{ route('employe.create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Create</a>
            @endif
                   <form method="get" action="{{route('user.index')}}">
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
                        Hasil Pencarian Pegawai Dengan Keyword : <b>{{ Request::get('keyword') }}</b>
                    </div>
            @endif
            @include('alert.success');
                    <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="5%"> no</th>
                            <th>username</th>
                            <th>nama</th>
                            <th>alamat</th>
                            <th>gender</th>
                            <th>status</th>
                            <th width="30%">action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($employe as $row)
                        <tr>
                            <td>{{ $loop->iteration + ($employe->perpage() * ($employe->currentPage() - 1))}}</td>
                            <td>{{ $row->username }}</td>
                            <td>{{ $row->nama_pegawai }}</td>
                            <td>{{ $row->jk }}</td>
                            <td>{{ $row->alamat_pegawai }}</td>
                            <td>@if ($row->is_active == 1) Aktif @else Tidak Aktif @endif</td>
                            <td> 
                            <form method="post" action="{{ route('employe.destroy', [$row->username])}}" onsubmit="return confirm('yakin akan mengubah data ini ?')">
                                @csrf
                                {{ method_field('DELETE') }}
                                <a href="{{ route('employe.edit', [$row->username])}}" class="btn btn-warning" >edit</a>
                                <button type="submit" class="btn btn-danger">
                                    Delete
                                </button>                           
                            </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                    {{ $employe->appends(Request::all())->links() }}
            </div>
          </div>
        </div>
</div>
@endsection
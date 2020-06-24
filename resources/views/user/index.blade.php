@extends('layouts.template')
@section('title')
    Data User
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
            @if(Request::get('keyword'))
                    <a href="{{ route('user.index') }}" class="btn btn-success">Back</a>
            @else
                    <a href="{{ route('user.create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Create</a>
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
                        Hasil Pencarian User Dengan Keyword : <b>{{ Request::get('keyword') }}</b>
                    </div>
            @endif
            @include('alert.success');
                    <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="5%"> no</th>
                            <th>nama</th>
                            <th>username</th>
                            <th>email</th>
                            <th>level</th>
                            <th width="30%">action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($user as $row)
                        <tr>
                            <td>{{ $loop->iteration + ($user->perpage() * ($user->currentPage() - 1))}}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->username }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->level }}</td>
                            <td> - </td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                    {{ $user->appends(Request::all())->links() }}
            </div>
          </div>
        </div>
</div>
@endsection
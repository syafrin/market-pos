@extends('layouts.template')

@section('title')
Edit Data Pegawai
@endsection

@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        @include('alert.error')       
                    </div>
                    <div class="box-body">
                            <form class="form-horizontal" method="post" action="{{ route('employe.update', [$employe->username]) }}">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="username" class="col-sm-2 control-label">Username</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="username" value="{{ $employe->username }}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="col-sm-2 control-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="password" name="password" value="">
                                        </div>
                                        </div>
                                    <div class="form-group">
                                        <label for="nama_pegawai" class="col-sm-2 control-label">Nama Pegawai</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" value="{{ $employe->nama_pegawai }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="jk" class="col-sm-2 control-label">Jenis Kelamin</label>
                                        <div class="col-sm-10">
                                            <select name="jk" id="jk" class="form-control">
                                                <option value="pria"  @if ($employe->jk == 'pria') selected @endif>Pria</option>
                                                <option value="wanita" @if ($employe->jk == 'wanita') selected @endif>Wanita</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat" class="col-sm-2 control-label">Alamat Pegawai</label>
                                        <div class="col-sm-10">
                                        <textarea class="form-control" id="alamat" name="alamat"> {{ $employe->alamat }}</textarea>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="is_active" class="col-sm-2 control-label">Status</label>
                                        <div class="col-sm-10">
                                            <select name="is_active" id="is_active" class="form-control">
                                                <option value="1"   @if ($employe->is_active == 1) selected @endif>Aktif</option>
                                                <option value="0" @if ($employe->is_active == 0) selected @endif>Tidak Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" name="tombol" class="btn btn-info pull-right">Update</button>
                                </div>
                                <!-- /.box-footer -->
                            </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
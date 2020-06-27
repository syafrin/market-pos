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
                            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{ route('category.update', [$category->kd_kategori]) }}">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="box-body">
                                   <div class="form-group">
                                        <label for="kategori" class="col-sm-2 control-label">Kategori Barang</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="kategori" name="kategori" value="{{ $category->kategori }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="image" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-10">
                                        <img src="{{ asset('uploads/'.$category->image) }}" class="img-thumbnail" width="100px" height="100px" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="image" class="col-sm-2 control-label">Ganti Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" id="image" name="image">
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
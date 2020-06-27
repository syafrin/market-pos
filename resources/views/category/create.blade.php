@extends('layouts.template')

@section('title')
Create Kategori Barang
@endsection

@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        @include('alert.error')       
                    </div>
                            <form class="form-horizontal" method="post" action="{{ route('category.store') }}" enctype="multipart/form-data">
                                <div class="box-body">
                                {{ csrf_field() }}
                    
                                    <div class="form-group">
                                        <label for="kategori" class="col-sm-2 control-label">Kategori Barang</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="kategori" name="kategori" value="{{ old('kategori') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="image" class="col-sm-2 control-label">Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
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
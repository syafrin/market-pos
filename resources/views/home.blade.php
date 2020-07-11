@extends('layouts.template')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    //ini bagian header
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-person-outline"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Produk</span>
                            <span class="info-box-number">{{ $product }}</span>
                            </div>
                            <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                            <span class="info-box-icon bg-red"><i class="ion ion-ios-list-outline"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Agen</span>
                            <span class="info-box-number">{{ $agent }}</span>
                            </div>
                            <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix visible-sm-block"></div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Penjualan</span>
                            <span class="info-box-number">{{ $trans }}</span>
                            </div>
                            <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Pendapatan</span>
                            <span class="info-box-number">@rupiah($transcome)</span>
                            </div>
                            <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        
                        <!-- /.col -->
                        </div>            
                </div>
            </div>
        </div>
    </div>
@endsection


<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $primaryKey = 'kd_transaksi';
    protected $fillable = [
        'kd_produk',
        'kd_supplier',
        'tgl_transaksi',
        'jumlah',
        'harga'
    ];

    public function product(){
        return $this->belongsTo('App\Product','kd_produk');
    }
    public function supplier(){
        return $this->belongsTo('App\Supplier', 'kd_supplier');
    }
    public function getTglTransaksiAttribute(){
        return \Carbon\Carbon::parse($this->attributes['tgl_transaksi'])->format('d-F-Y');
    }
}


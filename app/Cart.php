<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $primaryKey = "kd_keranjang";
    protected $fillable = [
        'username',
        'kd_produk',
        'jumlah',
        'harga'
    ];

    public function product(){
        return $this->belongsTo('App\Product','kd_produk');
    }
}

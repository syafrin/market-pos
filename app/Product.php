<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'kd_produk';
    protected $fillable = ['kd_kategori','nama_produk','harga','img_produk','stok'];

    public function category(){
        return $this->belongsTo('App\Category','kd_kategori');
    }
}

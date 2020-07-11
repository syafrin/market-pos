<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionCartDetail extends Model
{
      protected $table = "saledetails";
     protected $primaryKey = 'kd_saledetail';
    protected $fillable = [
        'kd_saledetail',
        'no_faktur',
        'kd_produk',
        'jumlah',
        'harga'
    ];

    //relasi ke product
    public function product(){
        return $this->belongsto('App\Product', 'kd_produk');
    }

    //relasi ke transaksi
    public function transaction(){
        return $this->belongsto('App\TransactionCart', 'no_faktur','no_faktur');
    }
}

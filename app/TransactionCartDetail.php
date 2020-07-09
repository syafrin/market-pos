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

    public function product(){
        return $this->belongsto('App\Product', 'kd_produk');
    }
}

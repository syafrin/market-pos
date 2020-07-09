<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionCart extends Model
{
    protected $table = "saletransactions";
     protected $primaryKey = 'kd_tsale';
    protected $fillable = [
        'no_faktur',
        'tgl_penjualan',
        'kd_agen',
        'username',
        'total'
    ];

    public function agent(){
        return $this->belongsto('App\Agent','kd_agen');
    }

    public function getTglPenjualanAttribute(){
        return \Carbon\Carbon::parse($this->attributes['tgl_penjualan'])->format('d-F-Y'); 
    }
}

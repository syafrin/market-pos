<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $primaryKey = 'kd_agen';
    protected $fillable = ['nama_toko','nama_pemilik','alamat','latitude','longitude', 'img_toko'];
}

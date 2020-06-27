<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
     public $incrementing= false;
     protected $primaryKey = 'username';
     protected $fillable = ['username','password','nama_pegawai','jk','alamat','is_active'];
     protected $keyType = 'string';
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'kd_kategori';
    protected $fillable = ['kategori','image'];
}
